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
        
        // Calculando os tipo de totais
        
        $receitas = $transacoes->where('tipo', 'Receitas')->sum('valor');
        $despesas = $transacoes->where('tipo', 'Despesas')->sum('valor');
        $saldo = $receitas - $despesas;
        
        $categorias = Categoria::all();
        return view('/dashboard.index')->with('transacoes', $transacoes)
            ->with('categorias', $categorias)->with('saldo', $saldo)
                ->with('receitas', $receitas)->with('despesas', $despesas);
    }

    public function filtroDashboard(Request $request)
    {
        $sql = Transacao::query();

        //to filtrando pelo tipo
        if ($request->tipo) {
            $sql->where('tipo', $request->tipo);
        }

        //to filtrando pela categoria
        if ($request->categoria_id) {
            $sql->where('categoria_id', $request->categoria_id);
        }

        //to buscando atraves do que é digitado
        if ($request->busca) {
            $sql->where('descricao', 'like', '%' . $request->busca . '%');
        }

        // filtrando pela data
        if ($request->periodo) {
            $sql->whereMonth('created_at', substr($request->periodo, 5, 2))
                ->whereYear('created_at', substr($request->periodo, 0, 4));
        }

        $transacoes = $sql->get();

        // Calculando os tipo de totais
        $receitas = $transacoes->where('tipo', 'Receitas')->sum('valor');
        $despesas = $transacoes->where('tipo', 'Despesas')->sum('valor');
        $saldo = $receitas - $despesas;

        $categorias = Categoria::all();

        return view('dashboard.index', compact('transacoes', 'categorias', 'saldo', 'receitas', 'despesas'));
    }

}
