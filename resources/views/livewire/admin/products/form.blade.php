<div>
    <h2 class="h4 mb-4">{{ isset($product) ? 'Edit' : 'Create' }} Product</h2>
    <form wire:submit="save">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Product Name</label>
                            <input type="text" wire:model="form.name" class="form-control @error('form.name') is-invalid @enderror">
                            @error('form.name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">SKU</label>
                            <input type="text" wire:model="form.sku" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Images (Multiple)</label>
                            <input type="file" wire:model="images" multiple class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select wire:model.live="selected_category" class="form-select">
                                <option value="">Select</option>
                                @foreach($categoryOptions as $id => $data)
                                    <option value="{{ $id }}">{{ $selected_category == $id ? $data['path'] : $data['tree'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($showMetalSection)
                        <div class="col-md-6">
                            <label class="form-label">Metal</label>
                            <select wire:model="form.metal_id" class="form-select">
                                <option value="">Select</option>
                                @foreach($metalOptions as $metal)
                                    <option value="{{ $metal->id }}">{{ $metal->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="col-md-6">
                            <label class="form-label">Brand</label>
                            <select wire:model="form.brand_id" class="form-select">
                                <option value="">Select</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Origin</label>
                            <input type="text" wire:model="form.origin" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Shape</label>
                            <input type="text" wire:model="form.shape" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Cut</label>
                            <input type="text" wire:model="form.cut" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <input type="text" wire:model="form.color" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Composition</label>
                            <select wire:model="form.composition" class="form-select">
                                <option value="">Select</option>
                                <option value="Natural">Natural</option>
                                <option value="Lab-Grown">Lab-Grown</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Treatment (Optional)</label>
                            <input type="text" wire:model="form.treatment" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Certification Type</label>
                            <input type="text" wire:model="form.certification_type" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Certification No.</label>
                            <input type="text" wire:model="form.certification_no" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Short Description</label>
                            <textarea wire:model="form.short_description" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Long Description</label>
                                <button type="button" wire:click="generateAiDescription" class="btn btn-sm btn-outline-info">AI Generate</button>
                            </div>
                            <textarea wire:model="form.long_description" class="form-control" rows="6"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-3">
                    <div class="card-header d-flex justify-content-between">
                        <span>SEO</span>
                        <button type="button" wire:click="generateAiSeo" class="btn btn-sm btn-outline-info">AI SEO Meta</button>
                    </div>
                    <div class="card-body row g-3">
                        <div class="col-12"><input type="text" wire:model="form.meta_title" class="form-control" placeholder="Meta Title"></div>
                        <div class="col-12"><textarea wire:model="form.meta_description" class="form-control" rows="2" placeholder="Meta Description"></textarea></div>
                        <div class="col-12"><input type="text" wire:model="form.meta_keywords" class="form-control" placeholder="Meta Keywords"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body row g-3">
                        @if($showPriceSection)
                        <div class="col-12">
                            <label class="form-label">Price (₹)</label>
                            <input type="number" step="0.01" wire:model="form.price" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Sale Price</label>
                            <input type="number" step="0.01" wire:model="form.sale_price" class="form-control">
                        </div>
                        @endif
                        <div class="col-12">
                            <label class="form-label">Stock</label>
                            <input type="number" wire:model="form.stock_quantity" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Weight & Unit</label>
                            <div class="input-group">
                                <input type="number" step="0.01" wire:model="form.weight" class="form-control" placeholder="Weight">
                                <select wire:model="form.weight_unit" class="form-select">
                                    <option value="">Unit</option>
                                    <option value="Carat">Carat</option>
                                    <option value="Ratti">Ratti</option>
                                    <option value="Grams">Grams</option>
                                    <option value="KG">KG</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Dimensions & Type</label>
                            <div class="input-group">
                                <input type="text" wire:model="form.dimensions" class="form-control" placeholder="L x W x H">
                                <select wire:model="form.dimension_type" class="form-select">
                                    <option value="">Type</option>
                                    <option value="mm">mm</option>
                                    <option value="cm">cm</option>
                                    <option value="inches">inches</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Status</label>
                            <select wire:model="form.status" class="form-select">
                                @foreach($statuses as $s)
                                    <option value="{{ $s->value }}">{{ $s->label() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-check"><input class="form-check-input" type="checkbox" wire:model="form.is_featured"><label class="form-check-label">Featured</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" wire:model="form.is_best_seller"><label class="form-check-label">Best Seller</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" wire:model="form.is_new_arrival"><label class="form-check-label">New Arrival</label></div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">Save Product</button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-link w-100">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
