@extends('base')
@section('principal')
    <h2>Editar Transacão</h2>
    <form class="formulario" method="POST" action="{{ route('transacoes.update', $transacao->id) }}">
        @csrf
        @method('PUT')
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="{{ $transacao->nome }}">

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" value="{{ $transacao->descricao }}">

            <label for="valor">Valor:</label>
            <input type="text" name="valor" value="{{ $transacao->valor }}">

            <select name="categoria_id">
                @foreach ($categorias as $c)
                    <option 
                    value="{{ $c->id }}"
                     {{ $c->id == $transacao->categoria_id ? 'selected' : '' }}>
                     {{ $c->tipo }}</option>
                @endforeach
            </select>

            <select name="usuario_id">
                @foreach ($usuarios as $u)
                    <option value="{{ $u->id }}" {{ $u->id == $transacao->usuario_id ? 'selected' : '' }}>{{ $u->nome }}</option>
                @endforeach
            </select>

            <button type="submit" value="Salvar">Salvar</button>
        </form>

        <button form="deletar" type="submit" value="Excluir">Excluir</button>

        <form method="POST" id="deletar" action="{{ route('transacoes.destroy', $transacao->id) }}">
            @csrf
            @method('DELETE')
        </form>
        <a href="{{ route('dashboard') }}">Voltar</a>
@endsection