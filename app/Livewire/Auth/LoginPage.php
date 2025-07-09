<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


#[Title('Iniciar sesión')]

class LoginPage extends Component {

    public $email;
    public $password;
    /* public $errorMessage = null; */

    public function save() {
        $this ->validate([
            'email' => 'required|email|max:255|exists:users,email',
            'password' => 'required|min:6|max:255',
        ]);

        // Si la autenticación no se valida, se mostrará un error
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            session()->flash('error', 'Credenciales inválidas');
            /* $this->errorMessage = 'Credenciales incorrectas'; */
            return;
        }
        
        // Redirección al home
        return redirect()->intended();
    }

    public function render() {
        return view('livewire.auth.login-page');
    }
}

