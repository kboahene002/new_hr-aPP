<?php

namespace App\Http\Livewire\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $email;
    public $errorMessage = "" ;
    public $password;
    public $successMessage;

    protected $rules = [
        'email' => 'required|email|string',
        'password' => 'required|min:7',
    ];

    public function login(){
        $this->errorMessage = "";
        $this->validate($this->rules);
        if(Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password])){
            $this->successMessage = "Login successfull";
            
            sleep(5);
           
           return redirect()->route('dashboard');
        }else{
            $this->errorMessage = "Incorrect Email or password";
            sleep(3);
           
        }
    }

    public function updated($field){
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
