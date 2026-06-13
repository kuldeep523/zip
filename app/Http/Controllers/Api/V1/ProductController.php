<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category', 'brand', 'images'])
            ->where('status', 'active')
            ->when($request->search, fn ($q) => $q->where('name', 'like', '%'.$request->search.'%'))
            ->when($request->category, fn ($q) => $q->whereHas('category', fn ($c) => $c->where('slug', $request->category)))
            ->paginate($request->integer('per_page', 15));

        return response()->json($products);
    }

    public function show(Product $product)
    {
        $product->load(['category', 'brand', 'images', 'variants', 'reviews' => fn ($q) => $q->where('is_approved', true)]);

        return response()->json($product);
    }
}
