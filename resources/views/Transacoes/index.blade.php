@extends('base')
@section('principal')
    <h2>Transações Cadastradas</h2>

    @if (!isset($transacoes))
        <h3>Nenhuma Transação encontrada! :/<h3>
    @else
    <table>
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tbody>
            @foreach ($transacoes as $t)
            <tr>
                <th>{{ $t->tipo }}</th>
                <th>{{ $t->nome }}</th>
                <th><a href=" {{ route('transacoes.show', $t->id) }}">Mostrar</a></th>
                <th><a href=" {{ route('transacoes.edit', $t->id) }}">Editar</a></th>
            <tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection