<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{

    // protected $listeners = ['notify' => 'show'];

    // public function mount()
    // {
    //     if (session()->has('notify')) {
    //         $notify = session('notify');
    //         $this->dispatch('notify', $notify['message'], $notify['type']);
    //     }
    // }

    // public function show($message, $type = 'success')
    // {
    //     $this->dispatchBrowserEvent('show-notify', [
    //         'message' => $message,
    //         'type' => $type,
    //     ]);
    // }


    public function render()
    {
        return view('livewire.notification');
    }
}
