<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;


class Index extends Component
{
    use WithPagination;


    public $search = '';
    public $perPage = 10;



    public function getData()
    {

        $query = Role::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        return $query->where('name', 'like', '%' . $this->search . '%')->paginate($this->perPage);
    }
    public function render()
    {
        $roles = $this->getData();
        return view('livewire.roles.index', compact('roles'));
    }
}
