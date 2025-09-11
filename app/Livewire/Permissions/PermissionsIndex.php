<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\On;

class PermissionsIndex extends Component
{
    use WithPagination;


    public $search = '';
    public $perPage = 10;
    public $sortDirection = 'desc';


    public function getData()
    {

        $query = Permission::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        return $query->where('name', 'like', '%' . $this->search . '%')->orderBy('created_at', $this->sortDirection)->paginate($this->perPage);
    }

    #[On('delete-confirmted')]
    public function delete_confirm(string $id)
    {
        // dd($id);؛
        // $this->dispatch('delete-confirm');
        $permissions = permission::find($id);
        $permissions->delete();

        notify($permissions->name . '  ' . __('Permission Deleted Successfully'), 'success', false);

        // $this->dispatch('deleted',  message: $role->name . '  ' . __('Role Deleted Successfully'), type: 'success');
    }

    public function render()
    {
        $permissions = $this->getData();
        return view('livewire.permissions.permissions-index', compact('permissions'));
        //

    }
}
