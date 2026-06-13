<div>
    <h2 class="h4 mb-4">Banner Management</h2>
    <form wire:submit="save" class="card border-0 shadow-sm mb-4">
        <div class="card-body row g-2">
            <div class="col-md-3"><input wire:model="form.title" class="form-control" placeholder="Title"></div>
            <div class="col-md-2">
                <select wire:model="form.type" class="form-select">
                    @foreach($types as $t)<option value="{{ $t->value }}">{{ $t->label() }}</option>@endforeach
                </select>
            </div>
            <div class="col-md-3"><input wire:model="form.link" class="form-control" placeholder="Link URL"></div>
            <div class="col-md-2"><input type="file" wire:model="image" class="form-control"></div>
            <div class="col-md-2"><button class="btn btn-primary w-100">Upload</button></div>
        </div>
    </form>
    <div class="row g-3">
        @foreach($banners as $banner)
            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <img src="{{ asset('storage/'.$banner->image) }}" class="card-img-top" alt="{{ $banner->title }}">
                    <div class="card-body p-2">
                        <small>{{ $banner->type?->label() }} — {{ $banner->title }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
