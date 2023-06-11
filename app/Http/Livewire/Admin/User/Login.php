<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.admin.user.login')->layout('layouts.auth');
    }
}
