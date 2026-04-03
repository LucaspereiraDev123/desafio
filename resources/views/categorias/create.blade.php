@extends('base')
@section('principal')
        <h2>Cadastrar Nova Categoria</h2>
        <form class='formulario' method="POST" action="{{ route('categorias.store') }}"> 
        @csrf
                <label for="nome">Nome:</label>
                <input type="text" name="nome">

                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo">

                <button type="submit" value="Salvar">Salvar</button>
                <button type="reset" value="Limpar">Limpar</button>
                <a href="{{ route('categorias.index') }}">Voltar</a>
        </form>
@endsection