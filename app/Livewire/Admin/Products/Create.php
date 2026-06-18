<?php

namespace App\Livewire\Admin\Products;

use App\Enums\ProductStatus;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\Ai\AiContentGeneratorService;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class Create extends Component
{
    use WithFileUploads;

    public array $form = [
        'name' => '', 'sku' => '', 'barcode' => '', 'category_id' => null,
        'sub_category_id' => null, 'sub_sub_category_id' => null, 'brand_id' => null, 'short_description' => '',
        'long_description' => '', 'video_url' => '', 'price' => 0, 'sale_price' => null,
        'tax_percent' => 0, 'stock_quantity' => 0, 'weight' => null, 'dimensions' => '',
        'origin' => '', 'weight_unit' => '', 'shape' => '', 'cut' => '', 'composition' => '',
        'certification_type' => '', 'certification_no' => '', 'treatment' => '', 'dimension_type' => '', 'color' => '',
        'metal_id' => null, 'status' => 'draft', 'is_featured' => false, 'is_best_seller' => false, 'is_new_arrival' => false,
        'meta_title' => '', 'meta_description' => '', 'meta_keywords' => '',
    ];

    public ?int $selected_category = null;
    
    public bool $showPriceSection = true;
    public bool $showMetalSection = false;
    
    // For handling multiple image uploads
    public $images = [];

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
        if (empty($this->form['name'])) {
            return;
        }
        $this->form['long_description'] = $ai->generateProductDescription($this->form['name'], $this->form['short_description']);
    }

    public function generateAiSeo(AiContentGeneratorService $ai): void
    {
        $meta = $ai->generateSeoMeta($this->form['name'], $this->form['long_description'] ?: $this->form['short_description']);
        $this->form['meta_title'] = $meta['meta_title'] ?? '';
        $this->form['meta_description'] = $meta['meta_description'] ?? '';
        $this->form['meta_keywords'] = $meta['meta_keywords'] ?? '';
    }

    public function save(): void
    {
        $this->authorize('products.create');
        $this->validate([
            'form.name' => 'required|string|max:255',
            'form.sku' => 'required|string|unique:products,sku',
            'form.price' => 'required|numeric|min:0',
            'form.stock_quantity' => 'required|integer|min:0',
            'form.status' => 'required|in:'.implode(',', array_column(ProductStatus::cases(), 'value')),
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

        $data['slug'] = Str::slug($data['name']).'-'.Str::random(4);

        $product = Product::create($data);

        if ($this->images) {
            foreach ($this->images as $image) {
                $path = $image->store('products', 'public');
                $product->images()->create([
                    'path' => $path,
                    'is_primary' => $product->images()->count() === 0,
                ]);
            }
        }

        session()->flash('success', 'Product created successfully.');
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
        ])->title('Create Product');
    }
}
