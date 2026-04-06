<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/Logo 2.png') }}" type="image/png" sizes="64x64">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Index</title>
</head>
<body>

            <h2>Categorias Cadastradas</h2>
        
         
        @if (!isset($categorias))
             <h3>Nenhuma Categoria encontrada! :/<h3>
        @else
        
            <table>
                <tr>
                    <th>tipo</th>
                    <th>nome</th>
                    <th>Opcões</th>
                </tr>
                <tbody>
                    @foreach ($categorias as $c)
                    <tr>
                        <th>{{ $c->tipo }}</th>
                        <th>{{ $c->nome }}</th>
                        <th><a href=" {{ route('categorias.show', $c->id) }}">Mostrar</a></th>
                        <th><a href=" {{ route('categorias.edit', $c->id) }}">Editar</a></th>
                    <tr>
                    @endforeach
                </tbody>
            </table>
        
        <a href=" {{ route('categorias.create') }}">Criar nova categoria</a>
        <a href=" {{ route('dashboard') }}">Voltar</a>
        @endif
</body>
</html>
