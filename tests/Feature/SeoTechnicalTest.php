<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SeoTechnicalTest extends TestCase
{
    use RefreshDatabase;

    public function test_sitemap_returns_200_with_xml_content_type(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml');
    }

    public function test_sitemap_is_valid_xml(): void
    {
        $xml = $this->get('/sitemap.xml')->getContent();

        libxml_use_internal_errors(true);
        $parsed = simplexml_load_string($xml);

        $this->assertNotFalse($parsed, 'sitemap.xml is not valid XML.');
    }

    public function test_sitemap_contains_only_the_four_canonical_absolute_urls(): void
    {
        $xml = $this->get('/sitemap.xml')->getContent();
        $parsed = simplexml_load_string($xml);
        $parsed->registerXPathNamespace('s', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        $locs = array_map('strval', $parsed->xpath('//s:url/s:loc'));

        $this->assertCount(4, $locs);

        foreach (['/', '/tentang-kami', '/layanan', '/portofolio'] as $path) {
            $this->assertContains(url($path === '/' ? '/' : $path), $locs);
        }

        foreach (['/login', '/admin', '/produk', '/portfolio', '/manufacturing', '/kontak'] as $legacyOrPrivate) {
            foreach ($locs as $loc) {
                $this->assertStringNotContainsString($legacyOrPrivate, parse_url($loc, PHP_URL_PATH) ?? '');
            }
        }
    }

    public function test_sitemap_does_not_fabricate_lastmod_priority_or_changefreq(): void
    {
        $xml = $this->get('/sitemap.xml')->getContent();

        $this->assertStringNotContainsString('<lastmod>', $xml);
        $this->assertStringNotContainsString('<priority>', $xml);
        $this->assertStringNotContainsString('<changefreq>', $xml);
    }

    public function test_robots_txt_exists_and_is_readable(): void
    {
        $this->assertFileExists(public_path('robots.txt'));
    }

    public function test_robots_txt_disallows_admin_and_login(): void
    {
        $body = file_get_contents(public_path('robots.txt'));

        $this->assertStringContainsString('Disallow: /admin/', $body);
        $this->assertStringContainsString('Disallow: /login', $body);
        $this->assertStringNotContainsString('Disallow: /' . "\n", $body);
    }

    public function test_robots_txt_declares_the_production_sitemap(): void
    {
        $body = file_get_contents(public_path('robots.txt'));

        $this->assertStringContainsString('Sitemap: https://multiandriaindonesia.com/sitemap.xml', $body);
    }

    /**
     * @return array<string, array{0: string, 1: string}>
     */
    public static function legacyRedirects(): array
    {
        return [
            'produk' => ['/produk', '/portofolio#produk'],
            'portfolio' => ['/portfolio', '/portofolio'],
            'manufacturing' => ['/manufacturing', '/layanan#proses-produksi'],
            'kontak' => ['/kontak', '/tentang-kami#lokasi'],
        ];
    }

    #[DataProvider('legacyRedirects')]
    public function test_legacy_route_redirects_permanently_to_expected_target(string $legacyPath, string $expectedTarget): void
    {
        $response = $this->get($legacyPath);

        $response->assertStatus(301);
        $this->assertStringContainsString($expectedTarget, $response->headers->get('Location'));
    }

    #[DataProvider('legacyRedirects')]
    public function test_legacy_redirect_target_does_not_chain_into_another_redirect(string $legacyPath, string $expectedTarget): void
    {
        $targetPath = parse_url($expectedTarget, PHP_URL_PATH);

        $response = $this->get($targetPath);

        $response->assertOk();
    }

    public function test_produk_redirect_preserves_type_query_parameter(): void
    {
        $response = $this->get('/produk?type=seragam');

        $response->assertStatus(301);
        $location = $response->headers->get('Location');

        $this->assertStringContainsString('type=seragam', $location);
        $this->assertStringContainsString('#produk', $location);
    }

    public function test_portfolio_query_variants_share_the_same_canonical_url(): void
    {
        $plain = $this->get('/portofolio')->getContent();
        $filtered = $this->get('/portofolio?type=seragam')->getContent();

        preg_match('#rel="canonical" href="([^"]+)"#', $plain, $plainMatch);
        preg_match('#rel="canonical" href="([^"]+)"#', $filtered, $filteredMatch);

        $this->assertSame($plainMatch[1], $filteredMatch[1]);
        $this->assertStringNotContainsString('?', $plainMatch[1]);
    }

    public function test_invalid_url_returns_404(): void
    {
        $this->get('/this-page-does-not-exist-'.uniqid())->assertStatus(404);
    }

    public function test_login_page_is_marked_noindex(): void
    {
        $html = $this->get('/login')->getContent();

        $this->assertStringContainsString('name="robots" content="noindex, nofollow"', $html);
    }
}
