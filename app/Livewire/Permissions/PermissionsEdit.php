<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionsEdit extends Component
{

    public  $permission, $PermissionName, $guardName, $permissionData;

    public function mount($permission)
    {
        $this->permission = $permission;
        $this->permissionData = Permission::find($permission);
        $this->PermissionName = $this->permissionData->name;
        $this->guardName = $this->permissionData->guard_name;
    }


    public function updatePermission()
    {

        $this->validate([
            'PermissionName' => ['required', 'string', 'max:255', 'unique:permissions,name,' . $this->permission],
            'guardName' => ['required', 'string', 'max:255'],
        ]);



        // تحديث البيانات
        $this->permissionData->update([
            'name' => $this->PermissionName,
            'guard_name' => $this->guardName,

        ]);

        //إذا تريد الإشعار يظهر بعد redirect
        notify(__('Permission Updated Successfully'), 'success', false);
    }

    public function render()
    {
        return view('livewire.permissions.permissions-edit');
    }
}
