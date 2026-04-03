<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index')->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        
        $categoria->nome = $request->input('nome');
        $categoria->tipo = $request->input('tipo');

        $categoria->save();

        $categorias = Categoria::all();

        return view('categorias.index')->with('categorias', $categorias)
            ->with('msg', 'Categorias cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id);

        if ($categoria) {
            return view('categorias.show')->with('categoria', $categoria);
        } else {
            return view('categorias.show')->with('msg', 'Categoria não encontrada!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::find($id);

        if ($categoria) {
            return view('categorias.edit')->with('categoria', $categoria);
        } else {
            $categorias = Categoria::all();
            return view('categorias.edit')->with('categorias', $categorias)
                ->with('msg', 'Categoria não encontrada!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);

        $categoria->nome = $request->input('nome');
        $categoria->tipo = $request->input('tipo');

        $categoria->save();

        $categorias = Categoria::all();

        return view('categorias.index')->with('categorias', $categorias)
            ->with('msg', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);

        $categoria->delete();

        $categorias = Categoria::all();
        return view('categorias.index')->with('categorias', $categorias)
            ->with('msg', 'Categoria excluida com sucesso!');
    }
}
