<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StructuredDataTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_emits_organization_website_and_webpage_schema_without_breadcrumbs(): void
    {
        $schemas = $this->jsonLdGraph($this->get('/'));

        $organization = $this->findSchema($schemas, 'Organization');
        $website = $this->findSchema($schemas, 'WebSite');
        $webPage = $this->findSchema($schemas, 'WebPage');

        $this->assertNotNull($organization);
        $this->assertNotNull($website);
        $this->assertNotNull($webPage);
        $this->assertNull($this->findSchema($schemas, 'BreadcrumbList'));
        $this->assertNull($this->findSchema($schemas, 'FAQPage'));

        $this->assertSame($organization['@id'], $website['publisher']['@id']);
        $this->assertSame($website['@id'], $webPage['isPartOf']['@id']);
        $this->assertSame($organization['@id'], $webPage['about']['@id']);
        $this->assertArrayNotHasKey('breadcrumb', $webPage);
    }

    public function test_about_page_emits_breadcrumb_list_linked_to_its_webpage_schema(): void
    {
        $schemas = $this->jsonLdGraph($this->get('/tentang-kami'));

        $webPage = $this->findSchema($schemas, 'WebPage');
        $breadcrumbList = $this->findSchema($schemas, 'BreadcrumbList');

        $this->assertNotNull($webPage);
        $this->assertNotNull($breadcrumbList);
        $this->assertSame($breadcrumbList['@id'], $webPage['breadcrumb']['@id']);

        $this->assertSame('Home', $breadcrumbList['itemListElement'][0]['name']);
        $this->assertSame('Tentang Kami', $breadcrumbList['itemListElement'][1]['name']);
        $this->assertSame(url('/tentang-kami'), $webPage['url']);
    }

    public function test_all_canonical_pages_share_the_same_organization_and_website_id(): void
    {
        $organizationIds = [];
        $websiteIds = [];

        foreach (['/', '/tentang-kami', '/layanan', '/portofolio'] as $uri) {
            $schemas = $this->jsonLdGraph($this->get($uri));
            $organizationIds[] = $this->findSchema($schemas, 'Organization')['@id'];
            $websiteIds[] = $this->findSchema($schemas, 'WebSite')['@id'];
        }

        $this->assertCount(1, array_unique($organizationIds));
        $this->assertCount(1, array_unique($websiteIds));
    }

    private function jsonLdGraph($response): array
    {
        $response->assertOk();

        preg_match_all(
            '#<script type="application/ld\+json">(.*?)</script>#s',
            $response->getContent(),
            $matches
        );

        $this->assertNotEmpty($matches[1], 'Expected at least one JSON-LD block.');

        $payload = json_decode($matches[1][0], true, flags: JSON_THROW_ON_ERROR);

        return $payload['@graph'] ?? [$payload];
    }

    private function findSchema(array $schemas, string $type): ?array
    {
        foreach ($schemas as $schema) {
            if (($schema['@type'] ?? null) === $type) {
                return $schema;
            }
        }

        return null;
    }
}
