<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    // Método para exibir o formulário de criação de usuário
    public function create()
    {
        return view('users.create');
    }

    // Método para salvar o usuário no banco
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criação do usuário com senha criptografada
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Criptografa a senha
        ]);

        // Redireciona de volta para a lista de usuários ou página inicial
        return redirect()->route('home')->with('success', 'Usuário criado com sucesso!');
    }
}