<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class PermissionsCreate extends Component
{

    public $permissionName = '';
    public $guardName = '';

    public function createPermission()
    {
        $this->validate([
            'permissionName' => ['required', 'string', 'max:255', 'unique:roles,name'],
            'guardName' => ['required', 'string', 'max:255'],
        ]);
        // this is to remove any leading or trailing spaces from the permission name before saving
        $normailizedPermissionName = trim($this->permissionName);

        $role = Permission::create([
            'name' => $normailizedPermissionName,
            'guard_name' => $this->guardName
        ]);

        // $this->dispatch('created',  message: $role->name . '  ' . __('Role Created Successfully'), type: 'success');
        // LivewireAlert::title($this->permissionName . '  ' . __('Permission Created Successfully'))
        //     ->success()
        //     ->show();

        notify($role->name . '  ' . __('Permission Created Successfully'), 'success', false);

        $this->reset();
    }
    public function render()
    {
        return view('livewire.permissions.permissions-create');
    }
}
