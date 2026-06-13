<?php

use App\Http\Controllers\RobotsController;
use App\Livewire\Storefront\About;
use App\Livewire\Storefront\Blog\Index as BlogIndex;
use App\Livewire\Storefront\Blog\Show as BlogShow;
use App\Livewire\Storefront\Brands\Index as BrandsIndex;
use App\Livewire\Storefront\Cart;
use App\Livewire\Storefront\Categories\Show as CategoryShow;
use App\Livewire\Storefront\Checkout;
use App\Livewire\Storefront\CompareProducts;
use App\Livewire\Storefront\Contactus;
use App\Livewire\Storefront\Gemrecommendation;
use App\Livewire\Storefront\Home;
use App\Livewire\Storefront\OrderTracking;
use App\Livewire\Storefront\PageShow;
use App\Livewire\Storefront\ProductDetail;
use App\Livewire\Storefront\Shop;
use App\Livewire\Storefront\WishlistPage;
use App\Livewire\Storefront\Gemsrecommendation;
use App\Livewire\Storefront\GemstonesDetailpage;
use Illuminate\Support\Facades\Route;

// Public storefront (Bootstrap 5 + Livewire)
Route::get('/', Home::class)->name('storefront.home');
Route::get('/shop', Shop::class)->name('storefront.shop');
Route::get('/gemstones', Shop::class)->name('storefront.gemstones');
Route::get('/gemstones/{slug}', CategoryShow::class)->name('storefront.gemstones.category');
Route::get('/product/{slug}', ProductDetail::class)->name('storefront.product');
Route::get('/gemstone/{slug}', ProductDetail::class)->name('storefront.detail');
Route::get('/category/{slug}', CategoryShow::class)->name('storefront.category');
Route::get('/brands', BrandsIndex::class)->name('storefront.brands');
Route::get('/brand/{slug}', BrandsIndex::class)->name('storefront.brand');
Route::get('/blog', BlogIndex::class)->name('storefront.blog');
Route::get('/blog/{slug}', BlogShow::class)->name('storefront.blog.show');
Route::get('/cart', Cart::class)->name('storefront.cart');
Route::get('/checkout', Checkout::class)->name('storefront.checkout');
Route::get('/order-tracking', OrderTracking::class)->name('storefront.order-tracking');
Route::get('/compare', CompareProducts::class)->name('storefront.compare');
Route::get('/page/{slug}', PageShow::class)->name('storefront.page');
Route::get('/robots.txt', [RobotsController::class, 'index'])->name('robots');


Route::get('/contact-us', Contactus::class)->name('storefront.contactus');
Route::get('/About-us', About::class)->name('storefront.About');
Route::get('/Gems-recommendation', Gemrecommendation::class)->name('storefront.Gemsrecommendation');
Route::get('/Gemstone-detailpage',  GemstonesDetailpage::class)->name('storefront.Gemstone-detailpage');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->isStaff()) {
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard');
    })->name('dashboard');

    Route::get('/wishlist', WishlistPage::class)->name('storefront.wishlist');
});
