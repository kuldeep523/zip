<div>
    <h2 class="h4 mb-4">Category Management</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header">{{ $editingId ? 'Edit' : 'Add' }} Category</div>
                <div class="card-body">
                    <form wire:submit="save" class="row g-2">
                        <div class="col-12"><input wire:model="form.name" class="form-control" placeholder="Name"></div>
                        <div class="col-12">
                            <select wire:model.live="form.parent_id" class="form-select">
                                <option value="">Main Category</option>
                                @foreach($categoryOptions as $id => $data)
                                    <option value="{{ $id }}">{{ $form['parent_id'] == $id ? $data['path'] : $data['tree'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12"><textarea wire:model="form.description" class="form-control" rows="3" placeholder="Description"></textarea></div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                            @if($editingId)<button type="button" wire:click="resetForm" class="btn btn-link w-100">Cancel</button>@endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="list-group list-group-flush p-0">
                    @foreach($categories as $category)
                        @include('livewire.admin.categories.tree-item', ['category' => $category, 'level' => 0])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
