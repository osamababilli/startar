<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;


class Create extends Component
{

    public $roleName = '';
    public $guardName = '';

    public function createRole()
    {
        $this->validate([
            'roleName' => ['required', 'string', 'max:255', 'unique:roles,name'],
            'guardName' => ['required', 'string', 'max:255'],
        ]);

        $role = Role::create([
            'name' => $this->roleName,
            'guard_name' => $this->guardName
        ]);

        // $this->dispatch('created',  message: $role->name . '  ' . __('Role Created Successfully'), type: 'success');
        LivewireAlert::title($role->name . '  ' . __('Role Created Successfully'))
            ->success()
            ->show();

        $this->reset();
    }

    public function render()
    {
        return view('livewire.roles.create');
    }
}
