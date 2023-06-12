<?php

namespace App\Http\Livewire\Site\User;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
     public User $user;
    public $phone, $password;
    public function mount()
    {
        $this->user = new User;
    }
    protected $rules = [
      'phone' => 'required|exists:users,phone|size:11',
    ];

    public function LoginForm()
    {
        $this->validate();
        $user = User::where('phone', $this->phone)->first();

        if(isset($user))
        {
            $phone = $user->phone;
            $code  = mt_rand(1111, 9999);    // Generate code
            User::where('phone', $phone)->update(['password' => Hash::make($code)]);   // Save code in database
            User::sendCode($phone, $code);  // Send SMS
            return to_route('verify', $user->id);
        }

    }

    public function render()
    {
        return view('livewire.site.user.login')->layout('layouts.auth');
    }

}
