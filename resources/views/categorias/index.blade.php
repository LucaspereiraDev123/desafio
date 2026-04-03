@extends('base')
@section('principal')
    <h2>Categorias Cadastradas</h2>

    @if (!isset($categorias))
        <h3>Nenhuma Categoria encontrada! :/<h3>
    @else
    <table>
        <tr>
            <th>id</th>
            <th>tipo</th>
            <th>nome</th>
            <th>Opcões</th>
        </tr>
        <tbody>
            @foreach ($categorias as $c)
            <tr>
                <th>{{ $c->id }}</th>
                <th>{{ $c->tipo }}</th>
                <th>{{ $c->nome }}</th>
                <th><a href=" {{ route('categorias.show', $c->id) }}">Mostrar</a></th>
                <th><a href=" {{ route('categorias.edit', $c->id) }}">Editar</a></th>
            <tr>
            @endforeach
        </tbody>
    </table>
    <a href=" {{ route('categorias.create') }}">Criar nova categoria</a>
    @endif
@endsection