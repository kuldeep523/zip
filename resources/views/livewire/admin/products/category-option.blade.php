<option value="{{ $category->id }}">
    {!! str_repeat('&nbsp;', $level * 4) !!}{{ $level > 0 ? '— ' : '' }}{{ $category->name }}
</option>
@foreach($category->children as $child)
    @include('livewire.admin.products.category-option', ['category' => $child, 'level' => $level + 1])
@endforeach
