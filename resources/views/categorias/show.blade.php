@extends('base')
@section('principal')
    @if (isset($msg))
        <h3>Categoria não encontrada</h3>
    @else
        <h2>Categorias</h2>
        <p>Nome: {{ $categoria->nome }}</p>
        <p>Tipo: {{ $categoria->tipo }}</p>
        <a href="{{ route('categorias.index') }}">Voltar</a>
    @endif
@endsection