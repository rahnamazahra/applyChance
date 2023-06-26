<?php

namespace App\Http\Livewire\Site\User;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Login extends Component
{
    public User $user;
    public $phone, $password;
    public function mount()
    {
        $this->user = new User;
    }

    public function LoginForm()
    {

        $this->validate(['phone' => 'required|size:11']);

        $user = User::where('phone', $this->phone)->first();

        if($user === null)
        {
            $this->emit('toast', 'error', 'شماره موبایل غیرفعال است', 'خطا');
        }
        else
        {
            $phone = $user->phone;
            //$code  = mt_rand(1111, 9999);    // Generate code
            $code = 1234;
            User::where('phone', $phone)->update(['password' => Hash::make($code)]);
            User::sendCode($phone, $code);
            $this->emit('toast', 'success', 'ما یک کد فعال سازی به تلفن همراه وارد شده ارسال کردیم', 'موفقیت آمیز');
            return to_route('verify', $user->id);
        }

    }

    public function render()
    {
        return view('livewire.site.user.login')->layout('layouts.auth');
    }

}
