<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;


#[Title('Restaurar contraseña - DigiRest')]

class ForgotPasswordPage extends Component
{
    public $email;

    public function save(){
        $this->validate([
            'email'=>'required|email|exists:users,email|max:255'
        ]);

        $status = Password::sendResetLink(['email' => $this->email]);

        if($status === Password::RESET_LINK_SENT){
            session()->flash('success', 'Se ha enviado un enlace de restablecimiento de contraseña a su dirección de correo electrónico.');
            $this->email = '';
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password-page');
    }
}
