<?php

namespace App\Livewire\Admin\Products;

use App\Enums\ProductStatus;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\Ai\AiContentGeneratorService;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class Edit extends Component
{
    use WithFileUploads;

    public Product $product;

    public array $form = [];
    public ?int $selected_category = null;
    public bool $showPriceSection = true;
    public bool $showMetalSection = false;
    public $images = [];

    public function mount(Product $product): void
    {
        $this->product = $product;
        $this->form = $product->only([
            'name', 'sku', 'barcode', 'category_id', 'sub_category_id', 'sub_sub_category_id', 'brand_id',
            'short_description', 'long_description', 'video_url', 'price', 'sale_price',
            'tax_percent', 'stock_quantity', 'weight', 'dimensions', 'status',
            'origin', 'weight_unit', 'shape', 'cut', 'composition', 'certification_type',
            'certification_no', 'treatment', 'dimension_type', 'color', 'metal_id',
            'is_featured', 'is_best_seller', 'is_new_arrival',
            'meta_title', 'meta_description', 'meta_keywords',
        ]);
        $this->form['status'] = $product->status->value;
        $this->selected_category = $product->sub_sub_category_id ?? $product->sub_category_id ?? $product->category_id;
        $this->updatedSelectedCategory($this->selected_category);
    }

    public function updatedSelectedCategory($value)
    {
        $this->showPriceSection = false;
        $this->showMetalSection = false;
        if ($value) {
            $node = Category::find($value);
            while ($node && $node->parent_id) {
                $node = Category::find($node->parent_id);
            }
            if ($node) {
                if (str_contains(strtolower($node->name), 'gem')) {
                    $this->showPriceSection = true;
                }
                if (str_contains(strtolower($node->name), 'jewel')) {
                    $this->showMetalSection = true;
                }
            }
        }
    }

    public function generateAiDescription(AiContentGeneratorService $ai): void
    {
        $this->form['long_description'] = $ai->generateProductDescription($this->form['name'], $this->form['short_description']);
    }

    public function generateAiSeo(AiContentGeneratorService $ai): void
    {
        $meta = $ai->generateSeoMeta($this->form['name'], $this->form['long_description'] ?: $this->form['short_description']);
        $this->form = array_merge($this->form, array_intersect_key($meta, array_flip(['meta_title', 'meta_description', 'meta_keywords'])));
    }

    public function save(): void
    {
        $this->authorize('products.edit');
        $this->validate([
            'form.name' => 'required|string|max:255',
            'form.sku' => 'required|string|unique:products,sku,'.$this->product->id,
            'form.price' => 'required|numeric|min:0',
        ]);

        $data = $this->form;
        
        // Ensure empty strings for numeric/nullable fields are converted to null
        foreach (['sale_price', 'weight', 'metal_id', 'brand_id'] as $nullableField) {
            if (isset($data[$nullableField]) && $data[$nullableField] === '') {
                $data[$nullableField] = null;
            }
        }
        
        $data['category_id'] = null;
        $data['sub_category_id'] = null;
        $data['sub_sub_category_id'] = null;

        if ($this->selected_category) {
            $node = Category::find($this->selected_category);
            if ($node) {
                if ($node->parent_id) {
                    $parent = Category::find($node->parent_id);
                    if ($parent && $parent->parent_id) {
                        $data['category_id'] = $parent->parent_id;
                        $data['sub_category_id'] = $parent->id;
                        $data['sub_sub_category_id'] = $node->id;
                    } else {
                        $data['category_id'] = $parent ? $parent->id : $node->parent_id;
                        $data['sub_category_id'] = $node->id;
                    }
                } else {
                    $data['category_id'] = $node->id;
                }
            }
        }

        $this->product->update($data);

        if ($this->images) {
            foreach ($this->images as $image) {
                $path = $image->store('products', 'public');
                $this->product->images()->create([
                    'path' => $path,
                    'is_primary' => $this->product->images()->count() === 0,
                ]);
            }
        }

        session()->flash('success', 'Product updated.');
        $this->redirect(route('admin.products.index'), navigate: true);
    }

    protected function generateCategoryTreeOptions($categories, $parentId = null, $prefix = '', $pathPrefix = '')
    {
        $options = [];
        $items = $parentId === null 
            ? $categories->whereNull('parent_id')->filter(fn($c) => str_contains(strtolower($c->name), 'gem') || str_contains(strtolower($c->name), 'jewel'))
            : $categories->where('parent_id', $parentId);
            
        foreach ($items as $category) {
            $currentPath = $pathPrefix ? $pathPrefix . ' -> ' . $category->name : $category->name;
            $options[$category->id] = [
                'tree' => $prefix . $category->name,
                'path' => $currentPath,
            ];
            $options += $this->generateCategoryTreeOptions($categories, $category->id, $prefix . '— ', $currentPath);
        }
        return $options;
    }

    public function render()
    {
        $allCategories = Category::orderBy('sort_order')->orderBy('name')->get();
        $metalCategory = Category::where('name', 'like', '%Metal%')->orWhere('name', 'like', '%Matel%')->first();
        $metalOptions = $metalCategory ? $metalCategory->children()->get() : collect();

        return view('livewire.admin.products.form', [
            'categoryOptions' => $this->generateCategoryTreeOptions($allCategories),
            'metalOptions' => $metalOptions,
            'brands' => Brand::where('is_active', true)->get(),
            'statuses' => ProductStatus::cases(),
        ])->title('Edit Product');
    }
}
