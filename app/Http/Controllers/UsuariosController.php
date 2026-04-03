<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\DashBoard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/login.index');
    }

    public function store(Request $request): RedirectResponse
    {   

        $credenciais = $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required']
        ]);

        //vai verificar se tem algum usuario cadastrados
        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();

            return to_route('dashboard');
        }

        return back()->withErrors([
            'email'=>'E-mail ou senha inválidos!',
        ])->onlyInput('email');
    }

    //aba de registrar
    public function create()
    {
        return view('usuarios.create');
    }

    public function registerStore (Request $request)
    {
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);

        $usuario = Usuario::create($data);
        Auth::login($usuario);

        return to_route('dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('login');
    }
}
