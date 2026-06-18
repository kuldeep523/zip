<nav id="admin-sidebar" class="admin-sidebar bg-dark text-white">
    <div class="p-3 border-bottom border-secondary">
        <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none d-flex align-items-center gap-2">
            <i class="bi bi-gem fs-4 text-warning"></i>
            <span class="fw-bold">RR Gems Admin</span>
        </a>
    </div>
    <ul class="nav flex-column p-2 gap-1">
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.dashboard') ? 'active bg-primary' : '' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.storefront.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.storefront.hub') }}"><i class="bi bi-window me-2"></i>Storefront CMS</a></li>
        @can('products.view')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.products.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.products.index') }}"><i class="bi bi-box-seam me-2"></i>Products</a></li>
        @endcan
        @can('categories.view')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.categories.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.categories.index') }}"><i class="bi bi-diagram-3 me-2"></i>Categories</a></li>
        @endcan
        @can('brands.view')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.brands.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.brands.index') }}"><i class="bi bi-award me-2"></i>Brands</a></li>
        @endcan
        @role('Super Admin|Admin')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.carts.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.carts.index') }}"><i class="bi bi-bag-x me-2"></i>Carts</a></li>
        @endrole
        @can('orders.view')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.orders.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.orders.index') }}"><i class="bi bi-cart-check me-2"></i>Orders</a></li>
        @endcan
        @can('customers.view')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.customers.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.customers.index') }}"><i class="bi bi-people me-2"></i>Customers</a></li>
        @endcan
        @can('inventory.view')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.inventory.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.inventory.index') }}"><i class="bi bi-boxes me-2"></i>Inventory</a></li>
        @endcan
        @can('coupons.view')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.coupons.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.coupons.index') }}"><i class="bi bi-ticket-perforated me-2"></i>Coupons</a></li>
        @endcan
        @can('shipping.view')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.shipping.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.shipping.index') }}"><i class="bi bi-truck me-2"></i>Shipping</a></li>
        @endcan
        @can('reviews.view')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.reviews.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.reviews.index') }}"><i class="bi bi-star me-2"></i>Reviews</a></li>
        @endcan
        @can('blogs.view')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.blogs.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.blogs.index') }}"><i class="bi bi-journal-text me-2"></i>Blog</a></li>
        @endcan
        @can('banners.view')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.banners.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.banners.index') }}"><i class="bi bi-images me-2"></i>Banners</a></li>
        @endcan
        @can('cms.view')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.cms.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.cms.index') }}"><i class="bi bi-file-earmark-text me-2"></i>CMS Pages</a></li>
        @endcan
        @can('seo.manage')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.seo.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.seo.global') }}"><i class="bi bi-search me-2"></i>SEO Panel</a></li>
        @endcan
        @role('Super Admin|Admin')
        <li><a class="nav-link text-white-50 {{ request()->routeIs('admin.roles.*') ? 'active bg-primary' : '' }}" href="{{ route('admin.roles.index') }}"><i class="bi bi-shield-lock me-2"></i>Roles</a></li>
        @endrole
    </ul>
    <div class="mt-auto p-3 border-top border-secondary">
        <a href="{{ route('storefront.home') }}" class="btn btn-outline-light btn-sm w-100" target="_blank"><i class="bi bi-shop me-1"></i> View Store</a>
    </div>
</nav>
