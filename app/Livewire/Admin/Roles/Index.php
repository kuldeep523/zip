<?php

namespace App\Livewire\Admin\Roles;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

#[Layout('layouts.admin')]
class Index extends Component
{
    public array $rolePermissions = [];

    public function mount(): void
    {
        foreach (Role::with('permissions')->get() as $role) {
            $this->rolePermissions[$role->id] = $role->permissions->pluck('name')->toArray();
        }
    }

    public function syncRole(int $roleId): void
    {
        $role = Role::findOrFail($roleId);
        $role->syncPermissions($this->rolePermissions[$roleId] ?? []);
        session()->flash('success', "Permissions updated for {$role->name}.");
    }

    public function render()
    {
        return view('livewire.admin.roles.index', [
            'roles' => Role::all(),
            'permissions' => Permission::all()->groupBy(fn ($p) => explode('.', $p->name)[0]),
        ])->title('Roles & Permissions');
    }
}
