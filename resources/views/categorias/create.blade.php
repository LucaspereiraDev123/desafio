<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/Logo 2.png') }}" type="image/png" sizes="64x64">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Categorias</title>
</head>
<body>
    <div class="fundo">
        <div class="fundo-caixa">     
                <form class='fundo-caixa-formulario' method="POST" action="{{ route('categorias.store') }}"> 
                   @csrf

                    <h2>Cadastrar Nova Categoria</h2>

                    <label for="nome">Nome:</label>
                    <input type="text" name="nome">

                    <label for="tipo">Tipo:</label>
                    <input type="text" name="tipo">

                    <button type="submit" value="Salvar">Salvar</button>
                    <button type="reset" value="Limpar">Limpar</button>
                    <a href="{{ route('categorias.index') }}">Voltar</a>
                </form> 
        <div>
    <div>
</body>
</html>
        
