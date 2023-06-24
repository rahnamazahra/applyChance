<?php

namespace App\Http\Livewire\Site\User;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class VerifyLogin extends Component
{

    public $user;
    public $password;

     protected $rules = [
       'password' => 'required',
    ];

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
    }

    public function validatePhone()
    {
        $this->validate();

        if(Hash::check($this->password, $this->user->password))
        {
            Auth::loginUsingId($this->user->id);
            $this->emit('toast', 'success', 'باموفقیت انجام شد');
            to_route('admin.home');
        }
        else
        {
            $this->emit('toast', 'error', 'کد وارد شده صحیح نمی باشد');
        }
    }

    public function render()
    {   $user = $this->user;
        return view('livewire.site.user.verifylogin', compact('user'))->layout('layouts.auth');
    }
}
