<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/Logo 2.png') }}" type="image/png" sizes="64x64">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Mostrar</title>
</head>
<body>
    <div class="fundo">
        <div class="fundo-caixa">
            <div class="fundo-caixa-exibicao">
                @if (isset($msg))
                    <h1>Categoria não encontrada</h1>
                @else
                    <h1>Categoria</h1>
                    <p>Nome: {{ $categoria->nome }}</p>
                    <p>Tipo: {{ $categoria->tipo }}</p>
                    <a href="{{ route('categorias.index') }}">Voltar</a>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
