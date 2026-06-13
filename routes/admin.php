<?php

use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\SitemapController;
use App\Livewire\Admin\Banners\Index as BannerIndex;
use App\Livewire\Admin\Blogs\Index as BlogIndex;
use App\Livewire\Admin\Brands\Index as BrandIndex;
use App\Livewire\Admin\Categories\Index as CategoryIndex;
use App\Livewire\Admin\Coupons\Index as CouponIndex;
use App\Livewire\Admin\Customers\Index as CustomerIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Inventory\Index as InventoryIndex;
use App\Livewire\Admin\Orders\Index as OrderIndex;
use App\Livewire\Admin\Orders\Show as OrderShow;
use App\Livewire\Admin\Products\Create as ProductCreate;
use App\Livewire\Admin\Products\Edit as ProductEdit;
use App\Livewire\Admin\Products\Index as ProductIndex;
use App\Livewire\Admin\Reviews\Index as ReviewIndex;
use App\Livewire\Admin\Roles\Index as RoleIndex;
use App\Livewire\Admin\Seo\GlobalSettings as SeoGlobalSettings;
use App\Livewire\Admin\Settings\CmsPages as CmsPagesIndex;
use App\Livewire\Admin\Shipping\Index as ShippingIndex;
use App\Livewire\Admin\Storefront\ContentHub as StorefrontContentHub;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/storefront', StorefrontContentHub::class)->name('storefront.hub');

Route::get('/products', ProductIndex::class)->name('products.index')->middleware('permission:products.view');
Route::get('/products/create', ProductCreate::class)->name('products.create')->middleware('permission:products.create');
Route::get('/products/{product}/edit', ProductEdit::class)->name('products.edit')->middleware('permission:products.edit');

Route::get('/categories', CategoryIndex::class)->name('categories.index')->middleware('permission:categories.view');
Route::get('/brands', BrandIndex::class)->name('brands.index')->middleware('permission:brands.view');
Route::get('/orders', OrderIndex::class)->name('orders.index')->middleware('permission:orders.view');
Route::get('/orders/{order}', OrderShow::class)->name('orders.show')->middleware('permission:orders.view');
Route::get('/orders/{order}/invoice', [InvoiceController::class, 'download'])->name('orders.invoice')->middleware('permission:orders.view');

Route::get('/customers', CustomerIndex::class)->name('customers.index')->middleware('permission:customers.view');
Route::get('/inventory', InventoryIndex::class)->name('inventory.index')->middleware('permission:inventory.view');
Route::get('/coupons', CouponIndex::class)->name('coupons.index')->middleware('permission:coupons.view');
Route::get('/shipping', ShippingIndex::class)->name('shipping.index')->middleware('permission:shipping.view');
Route::get('/reviews', ReviewIndex::class)->name('reviews.index')->middleware('permission:reviews.view');
Route::get('/blogs', BlogIndex::class)->name('blogs.index')->middleware('permission:blogs.view');
Route::get('/banners', BannerIndex::class)->name('banners.index')->middleware('permission:banners.view');
Route::get('/cms-pages', CmsPagesIndex::class)->name('cms.index')->middleware('permission:cms.view');
Route::get('/seo', SeoGlobalSettings::class)->name('seo.global')->middleware('permission:seo.manage');
Route::get('/roles', RoleIndex::class)->name('roles.index')->middleware('role:Super Admin|Admin');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
