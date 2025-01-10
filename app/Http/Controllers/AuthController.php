<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;  // Importa o modelo User para criação de novos usuários

class AuthController extends Controller
{
    // Mostra o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Processa o login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('stock.index')->with('success', 'Bem-vindo!');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ])->onlyInput('email');
    }

    // Faz logout do usuário
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // Exibe o formulário de registro
    public function showRegistrationForm()
    {
        return view('auth.register');  // Renderiza a view do formulário de registro
    }

    // Processa o registro de um novo usuário
    public function register(Request $request)
    {
        // Validação dos dados de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Criação do novo usuário
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Realiza o login do usuário após o registro
        Auth::login($user);

        // Redireciona para a página desejada após o registro
        return redirect()->route('stock.index')->with('success', 'Cadastro realizado com sucesso!');
    }
}