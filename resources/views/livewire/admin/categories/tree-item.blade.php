<div class="list-group-item border-0 border-bottom py-2 pe-0">
    <div class="d-flex justify-content-between align-items-center">
        <div style="padding-left: {{ $level * 20 }}px;">
            @if($level > 0)
                <span class="text-muted me-2">↳</span>
            @endif
            <strong class="{{ $level === 0 ? 'text-primary' : '' }}">{{ $category->name }}</strong>
        </div>
        <span>
            <button wire:click="edit({{ $category->id }})" class="btn btn-sm btn-link py-0 text-decoration-none">Edit</button>
            <button wire:click="delete({{ $category->id }})" wire:confirm="Delete?" class="btn btn-sm btn-link py-0 text-danger text-decoration-none">Delete</button>
        </span>
    </div>
</div>
@if($category->children->isNotEmpty())
    <div class="w-100">
        @foreach($category->children as $child)
            @include('livewire.admin.categories.tree-item', ['category' => $child, 'level' => $level + 1])
        @endforeach
    </div>
@endif
