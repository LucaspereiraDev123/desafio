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
            <div class="fundo-caixa-exibicaoTransacao">
                @if (isset($msg))
                    <h1>Categoria não encontrada</h1>
                @else
                    <h1>Transações</h1>
                    <p>Id: {{ $transacao->id }}</p>
                    <p>Nome: {{ $transacao->tipo }}</p>
                    <p>Descrição: {{ $transacao->descricao }}</p>
                    <p>valor: {{ $transacao->valor }}</p>
                    <p>Criado em: {{ $transacao->created_at }}</p>
                    <p>Atualizado em: {{ $transacao->updated_at }}</p>
                    <a href="{{ route('dashboard') }}">Voltar</a>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
