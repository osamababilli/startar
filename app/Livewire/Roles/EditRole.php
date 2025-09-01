<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Filament\Notifications\Notification;
use Jantinnerezo\LivewireAlert\Enums\Position;

class EditRole extends Component
{


    public $role, $roleName, $guardName, $roleData;

    public function mount($role)
    {
        $this->role = $role;
        $roleData = Role::find($role);
        $this->roleData = $roleData;
        $this->roleName = $roleData->name;
        $this->guardName = $roleData->guard_name;
    }

    public function updateRole()
    {
        // تحديث البيانات
        $this->roleData->update([
            'name' => $this->roleName,
            'guard_name' => $this->guardName
        ]);


        // إذا تريد الإشعار يظهر بعد redirect
        // session()->flash('saved', [
        //     'title' =>  '' . $this->roleData->name . '  ' . __('Role Updated Successfully'),

        // ]);

        notify($this->roleName . '  ' . __('Role Created Successfully'), 'success');

        // redirect بعد الإشعار
        return redirect()->route('roles.index');
    }


    public function render()
    {
        return view('livewire.roles.edit-role');
    }
}
