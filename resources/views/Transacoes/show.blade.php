@extends('base')
@section('principal')
    @if (isset($msg))
        <h3>Categoria não encontrada</h3>
    @else
        <h2>Transações</h2>
        <p>Id: {{ $transacao->id }}</p>
        <p>Nome: {{ $transacao->nome }}
        <p>Descrição: {{ $transacao->descricao }}</p>
        <p>valor: {{ $transacao->valor }}</p>
        <p>Criado em: {{ $transacao->created_at }}</p>
        <p>Atualizado em: {{ $transacao->updated_at }}</p>
        <a href="{{ route('dashboard') }}">Voltar</a>
    @endif
@endsection