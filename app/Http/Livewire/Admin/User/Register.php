<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;

class Register extends Component
{
    public function render()
    {
        return view('livewire.admin.user.register')->layout('layouts.auth');
    }
}
