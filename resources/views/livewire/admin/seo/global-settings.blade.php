<div>
    <h2 class="h4 mb-4">Global SEO Settings</h2>
    <form wire:submit="save">
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header">Site Meta</div>
            <div class="card-body row g-3">
                <div class="col-md-6"><label class="form-label">Site Title</label><input wire:model="form.site_title" class="form-control"></div>
                <div class="col-md-6"><label class="form-label">Keywords</label><input wire:model="form.site_keywords" class="form-control"></div>
                <div class="col-12"><label class="form-label">Description</label><textarea wire:model="form.site_description" class="form-control" rows="2"></textarea></div>
            </div>
        </div>
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header">Analytics & Pixels</div>
            <div class="card-body row g-3">
                <div class="col-md-4"><label class="form-label">Google Analytics</label><input wire:model="form.google_analytics_id" class="form-control" placeholder="G-XXXXXXXX"></div>
                <div class="col-md-4"><label class="form-label">GTM</label><input wire:model="form.google_tag_manager_id" class="form-control"></div>
                <div class="col-md-4"><label class="form-label">Facebook Pixel</label><input wire:model="form.facebook_pixel_id" class="form-control"></div>
            </div>
        </div>
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header">Robots.txt</div>
            <div class="card-body"><textarea wire:model="form.robots_txt" class="form-control font-monospace" rows="6"></textarea></div>
        </div>
        <button class="btn btn-primary">Save SEO Settings</button>
        <a href="{{ route('admin.sitemap') }}" class="btn btn-outline-secondary ms-2" target="_blank">View XML Sitemap</a>
    </form>
</div>
