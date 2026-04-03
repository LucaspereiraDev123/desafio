@extends('base')
@section('principal')
    <h2>Cadastrar nova Transacão</h2>
    <form class="formulario" method="POST" action="{{ route('transacoes.store') }}">
        @csrf
            <label for="nome">Nome:</label>
            <input type="text" name="nome">

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao">

            <label for="valor">Valor:</label>
            <input type="text" name="valor">

            <select name="categoria_id">
                @foreach ($categorias as $c)
                    <option value="{{ $c->id }}">{{ $c->tipo }}</option>
                @endforeach
            </select>

            <select name="usuario_id">
                @foreach ($usuarios as $u)
                    <option value="{{ $u->id }}">{{ $u->nome }}</option>
                @endforeach
            </select>

            <button type="submit" value="Salvar">Salvar</button>
            <button type="reset" value="Limpar">Limpar</button>
            <a href="{{ route('dashboard') }}">Voltar</a>
    </form>
@endsection