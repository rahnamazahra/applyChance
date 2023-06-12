<?php

namespace App\Http\Livewire\Site\User;

use Livewire\Component;

class Register extends Component
{
    public function render()
    {
        return view('livewire.site.user.register')->layout('layouts.auth');
    }
}
 