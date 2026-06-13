<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 mb-0">Storefront Content</h2>
        <button wire:click="clearCache" class="btn btn-outline-secondary btn-sm">Clear Frontend Cache</button>
    </div>
    <div class="row g-3">
        @foreach([
            ['Home Sliders', 'admin.banners.index'],
            ['Categories (Home)', 'admin.categories.index'],
            ['Gemstones / Products', 'admin.products.index'],
            ['FAQs', route('admin.cms.index')],
            ['CMS Pages', 'admin.cms.index'],
            ['Blog', 'admin.blogs.index'],
            ['SEO Global', 'admin.seo.global'],
            ['Banners', 'admin.banners.index'],
        ] as [$label, $route])
        <div class="col-md-3">
            <a href="{{ is_string($route) && str_starts_with($route, 'http') ? $route : route($route) }}" class="card border-0 shadow-sm text-decoration-none h-100">
                <div class="card-body text-center text-navy fw-bold">{{ $label }}</div>
            </a>
        </div>
        @endforeach
    </div>
    <p class="text-muted small mt-4">Menus, footer links, trust badges, and astro finder data are seeded via <code>StorefrontContentSeeder</code>. Extend admin CRUD modules as needed.</p>
</div>
