<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

#[Title('Registrarse')]

class RegisterPage extends Component
{
    public $name;
    public $email;
    public $password;

    // Registro de usuarios
    public function save()
    {
        // Validación y requerimientos de los campos
        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|max:255',
        ]);

        // Guardar a la base de datos
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Logear usuario
        Auth::login($user);

        // Redireccionar a la pagina principal
        return redirect()->intended();
    }

    public function render()
    {
        return view('livewire.auth.register-page');
    }
}
