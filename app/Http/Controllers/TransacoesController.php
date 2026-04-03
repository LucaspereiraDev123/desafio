<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transacao;
use App\Models\Categoria;
use App\Models\Usuario;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Auth\AuthencationExcption;

class TransacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (!Auth::check()) {
        //     throw new AuthenticationException();
        // }

        $transacoes = Transacao::all();
        return view('/transacoes.index')->with('transacoes', $transacoes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categorias = Categoria::all();
        $usuarios = Usuario::all();
        return view('transacoes.create')
            ->with('categorias', $categorias)
                ->with('usuarios', $usuarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transacao = new Transacao();

        $transacao->nome = $request->input('nome');
        $transacao->descricao = $request->input('descricao');
        $transacao->valor = $request->input('valor');
        $transacao->categoria_id = $request->input('categoria_id');
        $transacao->usuario_id = $request->input('usuario_id');

        $transacao->save();

        $transacoes = Transacao::all();
        $categorias = Categoria::all();

        return view('dashboard.index')->with('transacoes', $transacoes)
            ->with('categorias', $categorias)
                ->with('msg', 'Transação cadastrada com sucesso');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transacao = Transacao::find($id);

        if ($transacao) {
            return view('transacoes.show')->with('transacao', $transacao);
        } else {
            return view('transacoes.show')->with('msg', 'Transação não encontrada!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transacao = Transacao::find($id);

        if ($transacao) {
            $categorias = Categoria::all();
            $usuarios = Usuario::all();
            return view('transacoes.edit')->with('transacao', $transacao)
                ->with('categorias', $categorias)->with('usuarios', $usuarios);
        } else {
            $transacoes = Transacao::all();
            return view('transacoes.edit')->with('transacoes', $transacoes)
                ->with('msg', 'Transação não econtrada!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transacao = Transacao::find($id);

        $transacao->nome = $request->input('nome');
        $transacao->descricao = $request->input('descricao');
        $transacao->valor = $request->input('valor');
        $transacao->categoria_id = $request->input('categoria_id');
        $transacao->usuario_id = $request->input('usuario_id');

        $transacao->save();

        $transacoes = Transacao::all();
        $categorias = Categoria::all();

        return view('dashboard.index')->with('transacoes', $transacoes)
            ->with('categorias', $categorias);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transacao = Transacao::find($id);

        $transacao->delete();

        $transacoes = Transacao::all();
        $categorias = Categoria::all();
        return view('dashboard.index')->with('transacoes', $transacoes)
            ->with('categorias', $categorias);
    }
}
