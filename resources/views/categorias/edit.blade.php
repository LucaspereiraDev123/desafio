@extends('base')
@section('principal')
<h2>Atualizar Categoria<h2>
        <!-- estou usando o verbo put porque estou pegando os dados -->
        <form class='formulario' id="formularioId" method="POST" 
                action="{{ route('categorias.update', $categoria->id) }}"> 
                @csrf
                @method('PUT')
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="{{ $categoria->nome }}">

                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" value="{{ $categoria->tipo }}">
        </form>

        <!-- quando eu colocar um button fora do form tenho que me atentar se estou chamando o id do formulario com a ação correta -->
        <button form="formularioId" type="submit">Salvar</button>
        <button form="deletarFormulario" type="submit" value="Excluir">Excluir</button>
        <a href="{{ route('categorias.index') }}">Voltar</a>

        <form class="formulario" id="deletarFormulario" method="POST"
                action=" {{ route('categorias.destroy', $categoria->id) }}">
                @csrf
                <!-- se eu entrar nesse form ele vai atribuir o metodo delete -->
                @method('DELETE')
        </form>
@endsection