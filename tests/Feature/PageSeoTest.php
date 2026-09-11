<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PageSeoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return array<string, array{0: string, 1: string}>
     */
    public static function canonicalPages(): array
    {
        return [
            'home' => ['/', 'home'],
            'about' => ['/tentang-kami', 'about'],
            'services' => ['/layanan', 'services'],
            'portfolio' => ['/portofolio', 'portfolio'],
        ];
    }

    #[DataProvider('canonicalPages')]
    public function test_canonical_page_returns_200(string $uri, string $seoKey): void
    {
        $this->get($uri)->assertOk();
    }

    #[DataProvider('canonicalPages')]
    public function test_canonical_page_has_exactly_one_h1(string $uri, string $seoKey): void
    {
        $html = $this->get($uri)->getContent();

        $this->assertSame(
            1,
            preg_match_all('/<h1[\s>]/i', $html),
            "Expected exactly one <h1> on {$uri}."
        );
    }

    #[DataProvider('canonicalPages')]
    public function test_canonical_page_title_matches_centralized_seo_config(string $uri, string $seoKey): void
    {
        $html = $this->get($uri)->getContent();
        $expectedTitle = config("seo.pages.{$seoKey}.title");

        $this->assertNotEmpty($expectedTitle, "Missing seo.pages.{$seoKey}.title in config.");
        $this->assertStringContainsString('<title>'.e($expectedTitle).'</title>', $html);
    }

    #[DataProvider('canonicalPages')]
    public function test_canonical_page_meta_description_matches_centralized_seo_config(string $uri, string $seoKey): void
    {
        $html = $this->get($uri)->getContent();
        $expectedDescription = config("seo.pages.{$seoKey}.description");

        $this->assertNotEmpty($expectedDescription, "Missing seo.pages.{$seoKey}.description in config.");
        $this->assertStringContainsString(
            'name="description" content="'.e($expectedDescription).'"',
            $html
        );
    }

    #[DataProvider('canonicalPages')]
    public function test_canonical_page_has_matching_canonical_link(string $uri, string $seoKey): void
    {
        $html = $this->get($uri)->getContent();

        $this->assertStringContainsString(
            'rel="canonical" href="'.url($uri === '/' ? '/' : $uri).'"',
            $html
        );
    }

    public function test_seo_metadata_is_distinct_across_canonical_pages(): void
    {
        $titles = collect(self::canonicalPages())
            ->map(fn (array $page) => config("seo.pages.{$page[1]}.title"))
            ->unique();

        $this->assertCount(4, $titles, 'Each canonical page must have a distinct <title> to avoid keyword cannibalization.');
    }

    public function test_homepage_does_not_expose_fabricated_testimonial_content(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertDontSee('Dimas Prasetyo')
            ->assertDontSee('Ratna Kusuma')
            ->assertDontSee('Andre Wijaya')
            ->assertDontSee('Siti Nurhaliza');

        $this->assertSame([], config('company.testimonials'));
    }
}
