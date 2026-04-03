<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Transacao;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $transacoes = Transacao::all();
        $categorias = Categoria::all();
        return view('/dashboard.index')->with('transacoes', $transacoes)
            ->with('categorias', $categorias);
    }

}
