<div>
    <h2 class="h4 mb-4">Roles & Permissions</h2>
    @foreach($roles as $role)
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header d-flex justify-content-between">
                <strong>{{ $role->name }}</strong>
                <button wire:click="syncRole({{ $role->id }})" class="btn btn-sm btn-primary">Save Permissions</button>
            </div>
            <div class="card-body">
                <div class="row g-2">
                    @foreach($permissions as $module => $perms)
                        <div class="col-md-3">
                            <h6 class="text-uppercase text-muted small">{{ $module }}</h6>
                            @foreach($perms as $perm)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        wire:model="rolePermissions.{{ $role->id }}"
                                        value="{{ $perm->name }}">
                                    <label class="form-check-label small">{{ $perm->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
