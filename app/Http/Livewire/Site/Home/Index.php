<?php

namespace App\Http\Livewire\Site\Home;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.site.home.index')->layout('layouts.site');
    }
}
