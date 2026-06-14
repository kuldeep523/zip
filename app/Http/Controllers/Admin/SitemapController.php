<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CmsPage;
use App\Models\Product;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = collect([
            ['loc' => url('/'), 'priority' => '1.0'],
            ['loc' => route('storefront.shop'), 'priority' => '0.9'],
        ]);

        Product::where('status', 'active')->each(fn ($p) => $urls->push([
            'loc' => url('/product/'.$p->slug),
            'priority' => '0.8',
        ]));

        Category::where('is_active', true)->each(fn ($c) => $urls->push([
            'loc' => url('/category/'.$c->slug),
            'priority' => '0.7',
        ]));

        Brand::where('is_active', true)->each(fn ($b) => $urls->push([
            'loc' => url('/brand/'.$b->slug),
            'priority' => '0.7',
        ]));

        Blog::where('status', 'published')->each(fn ($b) => $urls->push([
            'loc' => url('/blog/'.$b->slug),
            'priority' => '0.6',
        ]));

        CmsPage::where('is_published', true)->each(fn ($p) => $urls->push([
            'loc' => url('/page/'.$p->slug),
            'priority' => '0.5',
        ]));

        return response()->view('sitemap', compact('urls'))
            ->header('Content-Type', 'application/xml');
    }
}
