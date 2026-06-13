<div>
    <h2 class="h4 mb-4">CMS Management</h2>
    <div class="row g-4">
        <div class="col-md-5">
            <form wire:submit="save" class="card border-0 shadow-sm">
                <div class="card-body row g-2">
                    <input wire:model="form.title" class="form-control" placeholder="Page Title">
                    <select wire:model="form.page_type" class="form-select">
                        @foreach($pageTypes as $type)<option value="{{ $type }}">{{ ucfirst($type) }}</option>@endforeach
                    </select>
                    <textarea wire:model="form.content" class="form-control" rows="8" placeholder="HTML content"></textarea>
                    <button class="btn btn-primary">Save Page</button>
                </div>
            </form>
        </div>
        <div class="col-md-7">
            <div class="list-group">
                @foreach($pages as $page)
                    <div class="list-group-item d-flex justify-content-between">
                        <div><strong>{{ $page->title }}</strong><br><small class="text-muted">{{ $page->page_type }} / {{ $page->slug }}</small></div>
                        <button wire:click="edit({{ $page->id }})" class="btn btn-sm btn-outline-primary">Edit</button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
