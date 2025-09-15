<?php

namespace App\Livewire\Users;

use Livewire\Component;

class UserCreate extends Component
{
    public $selectedRoles = [];
    public $name;
    public $email;

    public function createUser()
    {
        // // لو وصلت كسلسلة نصية "1,2,3"، حوّلها إلى array
        // $selected = is_string($this->selectedRoles)
        //     ? explode(',', $this->selectedRoles)
        //     : $this->selectedRoles;

        dd($this->name, $this->email, $this->selectedRoles);
    }

    public function toggleRoleSelection(string $roleName)
    {
        if (in_array($roleName, $this->selectedRoles)) {
            // إذا كان الدور موجودًا، قم بإزالته
            $this->selectedRoles = array_diff($this->selectedRoles, [$roleName]);
        } else {
            // إذا لم يكن موجودًا، قم بإضافته
            $this->selectedRoles[] = $roleName;
        }
    }


    public function render()
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('livewire.users.user-create', compact('roles'));
    }
}
