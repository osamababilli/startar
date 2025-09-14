<?php

namespace App\Livewire\Users;

use Livewire\Component;

class UserCreate extends Component
{


    public function render()
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('livewire.users.user-create', compact('roles'));
    }
}
