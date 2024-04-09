<?php

namespace App\Livewire\Backend\Auth;

use App\Models\Admin;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'email'     => 'required',
        'password'  => 'required',
    ];

    public function mount() {
        if(Auth::guard('admin')->check()){
            $this->redirect('/admin/dashboard', navigate: true);
        }
    }

    public function login() {
        $this->validate();

            $user = Admin::where(["email" => $this->email])->first();
            if($user){
                if(Hash::check($this->password, $user->password)){
                    Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password], !empty($this->remember) ? true : false);
                    request()->session()->flash('success','Login Successfully');
                    $this->redirect('/admin/dashboard', navigate: true);
                }else{
                    return $this->addError('password','Wrong Password');
                }
            }else{
                return $this->addError('email', trans('auth.failed'));
            }
    }

    public function render()
    {
        return view('livewire.backend.auth.login')->layout('components.backend.layouts.app');
    }
}
