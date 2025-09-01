<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionsIndex extends Component
{
    use WithPagination;


    public $search = '';
    public $perPage = 10;



    public function getData()
    {

        $query = Permission::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        return $query->where('name', 'like', '%' . $this->search . '%')->paginate($this->perPage);
    }

    #[On('delete-confirmted')]
    public function delete_confirm(string $id)
    {
        // dd($id);؛
        // $this->dispatch('delete-confirm');
        $role = Role::find($id);
        $role->delete();
        $this->dispatch('deleted',  message: $role->name . '  ' . __('Role Deleted Successfully'), type: 'success');
    }

    public function render()
    {
        $permissions = $this->getData();
        return view('livewire.permissions.permissions-index', compact('permissions'));
        //

    }
}
