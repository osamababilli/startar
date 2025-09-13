<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;



    public $search = '';
    public $perPage = 10;
    public $sortDirection = 'desc';

    public function getData()
    {

        $query = User::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        return $query->where('name', 'like', '%' . $this->search . '%')->orderBy('created_at', $this->sortDirection)->paginate($this->perPage);
    }


    public function render()
    {
        $users = $this->getData();
        return view('livewire.users.users-index', compact('users'));
    }
}
