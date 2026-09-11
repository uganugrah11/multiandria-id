<?php

namespace App\Support;

class SeoManager
{
    /**
     * Resolve final SEO values for the current request, falling back to
     * config('seo') defaults. This is the single source of truth consumed
     * by both <x-seo.meta> (HTML meta tags) and the JSON-LD schema builders
     * below, so structured data always matches what is actually rendered.
     */
    public function resolve(
        ?string $title = null,
        ?string $description = null,
        ?string $image = null,
        ?string $canonical = null,
        string $robots = 'index, follow',
    ): array {
        $config = config('seo');

        return [
            'title' => $title ?? $config['default_title'],
            'description' => $description ?? $config['default_description'],
            'image' => $image ?? asset($config['default_image']),
            'canonical' => $canonical ?? $this->canonicalUrl(),
            'robots' => $robots,
            'site_name' => $config['site_name'],
            'locale' => $config['locale'],
            'type' => $config['type'],
        ];
    }

    /**
     * The current request's path resolved against the configured
     * SEO_SITE_URL rather than the raw request host. This guarantees the
     * canonical link, Open Graph URL, and every JSON-LD @id/url share the
     * same domain, even if the app is reached through a different host
     * (an IP address, a proxy, or a dev server bound to a different
     * address than APP_URL/SEO_SITE_URL).
     */
    private function canonicalUrl(): string
    {
        $path = request()->getPathInfo();

        if ($path === '' || $path === '/') {
            return $this->siteUrl();
        }

        return $this->siteUrl().$path;
    }

    public function siteUrl(): string
    {
        return config('seo.site_url');
    }

    public function organizationId(): string
    {
        return $this->fragmentId($this->siteUrl(), 'organization');
    }

    public function websiteId(): string
    {
        return $this->fragmentId($this->siteUrl(), 'website');
    }

    public function webPageId(string $url): string
    {
        return $this->fragmentId($url, 'webpage');
    }

    public function breadcrumbId(string $url): string
    {
        return $this->fragmentId($url, 'breadcrumb');
    }

    private function fragmentId(string $url, string $fragment): string
    {
        return rtrim($url, '/').'/#'.$fragment;
    }

    /**
     * Build an absolute asset URL anchored to the configured SEO_SITE_URL
     * rather than Laravel's asset() helper, which resolves against the
     * current request's host. Used for URLs embedded in JSON-LD so they
     * always share the same domain as every other schema @id/url.
     */
    private function siteAsset(string $path): string
    {
        return rtrim($this->siteUrl(), '/').'/'.ltrim($path, '/');
    }

    /**
     * Organization schema for PT. Multi Andria Indonesia, sourced entirely
     * from config('company') and config('seo'). Properties are omitted
     * (never guessed or invented) when the underlying config value is empty.
     */
    public function organizationSchema(): array
    {
        $company = config('company');

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            '@id' => $this->organizationId(),
            'name' => 'PT. Multi Andria Indonesia',
            'alternateName' => config('seo.site_name'),
            'url' => $this->siteUrl(),
            'logo' => $this->siteAsset('images/logo-mai-transparent.png'),
            'foundingDate' => '2014',
        ];

        if (! empty($company['description'])) {
            $schema['description'] = $company['description'];
        }

        if (! empty($company['email'])) {
            $schema['email'] = $company['email'];
        }

        if (! empty($company['phone'])) {
            $schema['telephone'] = $company['phone'];
        }

        $hqAddress = $this->postalAddress($company['address']['hq'] ?? null);
        $factoryAddress = $this->postalAddress($company['address']['factory'] ?? null);

        if ($hqAddress) {
            $schema['address'] = $hqAddress;
        }

        $locations = [];

        if ($hqAddress) {
            $locations[] = [
                '@type' => 'Place',
                'name' => 'Kantor Pusat',
                'address' => $hqAddress,
            ];
        }

        if ($factoryAddress) {
            $locations[] = [
                '@type' => 'Place',
                'name' => 'Fasilitas Produksi Sukabumi',
                'address' => $factoryAddress,
            ];
        }

        if (! empty($locations)) {
            $schema['location'] = $locations;
        }

        $sameAs = array_values(array_filter($company['social'] ?? []));

        if (! empty($sameAs)) {
            $schema['sameAs'] = $sameAs;
        }

        return $schema;
    }

    public function websiteSchema(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            '@id' => $this->websiteId(),
            'url' => $this->siteUrl(),
            'name' => config('seo.site_name'),
            'description' => config('seo.default_description'),
            'inLanguage' => 'id-ID',
            'publisher' => ['@id' => $this->organizationId()],
        ];
    }

    /**
     * WebPage schema for a single canonical page. $resolved must come from
     * resolve() so the schema's name/description/url match the page's
     * actual rendered <title>, meta description, and canonical link.
     */
    public function webPageSchema(array $resolved, ?string $breadcrumbId = null): array
    {
        $url = $resolved['canonical'];

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            '@id' => $this->webPageId($url),
            'url' => $url,
            'name' => $resolved['title'],
            'description' => $resolved['description'],
            'inLanguage' => 'id-ID',
            'isPartOf' => ['@id' => $this->websiteId()],
            'about' => ['@id' => $this->organizationId()],
        ];

        if ($breadcrumbId) {
            $schema['breadcrumb'] = ['@id' => $breadcrumbId];
        }

        return $schema;
    }

    /**
     * BreadcrumbList schema. $items is an ordered list of
     * ['name' => string, 'url' => string] pairs, starting with Home.
     */
    public function breadcrumbListSchema(string $pageUrl, array $items): array
    {
        $itemListElement = [];

        foreach (array_values($items) as $index => $item) {
            $listItem = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
            ];

            if (! empty($item['url'])) {
                $listItem['item'] = $item['url'];
            }

            $itemListElement[] = $listItem;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            '@id' => $this->breadcrumbId($pageUrl),
            'itemListElement' => $itemListElement,
        ];
    }

    /**
     * Derive PostalAddress fields from a freeform Indonesian address string
     * such as "Jl. Panda V No. 197, Pd. Ranji, Kec. Ciputat Timur, Kota
     * Tangerang Selatan, Banten 15442".
     *
     * Convention used: the final comma-separated segment is expected to be
     * "<province> <5-digit postal code>", and the segment before that is
     * the city/regency (addressLocality). Everything before those two
     * segments becomes streetAddress. If the string doesn't match this
     * shape (no trailing 5-digit code), nothing is guessed — the full
     * string is kept as streetAddress only, and addressLocality/
     * addressRegion/postalCode are omitted rather than fabricated.
     */
    private function postalAddress(?string $address): ?array
    {
        $address = trim((string) $address);

        if ($address === '') {
            return null;
        }

        $postalAddress = [
            '@type' => 'PostalAddress',
            'addressCountry' => 'ID',
        ];

        if (! preg_match('/^(?<rest>.+),\s*(?<segment>[^,]+)$/u', $address, $match)) {
            $postalAddress['streetAddress'] = $address;

            return $postalAddress;
        }

        $lastSegment = trim($match['segment']);
        $remaining = trim($match['rest']);

        if (! preg_match('/^(?<region>.+?)\s+(?<postal>\d{5})$/u', $lastSegment, $regionMatch)) {
            $postalAddress['streetAddress'] = $address;

            return $postalAddress;
        }

        $postalAddress['addressRegion'] = trim($regionMatch['region']);
        $postalAddress['postalCode'] = $regionMatch['postal'];

        if (preg_match('/^(?<street>.+),\s*(?<locality>[^,]+)$/u', $remaining, $localityMatch)) {
            $postalAddress['addressLocality'] = trim($localityMatch['locality']);
            $postalAddress['streetAddress'] = trim($localityMatch['street']);
        } else {
            $postalAddress['addressLocality'] = $remaining;
        }

        return $postalAddress;
    }
}
