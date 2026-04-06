<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/Logo 2.png') }}" type="image/png" sizes="64x64">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Nova Transação</title>
</head>
<body>
    <div class="fundo">
        <div class="fundo-caixa">
    
            

            <form class="fundo-caixa-formulario" method="POST" action="{{ route('transacoes.store') }}">
                @csrf

                    <h1>Cadastrar nova Transação</h1>

                    <label for="tipo">Tipo:</label>
                    <input type="text" name="tipo">
            
                    <label for="descricao">Descrição:</label>
                    <input type="text" name="descricao">
            
                    <label for="valor">Valor:</label>
                    <input type="text" name="valor">

                    <div class="fundo-caixa-formulario-selecoes">
                        <select name="categoria_id">
                            @foreach ($categorias as $c)
                                <option value="{{ $c->id }}">{{ $c->nome }}</option>
                            @endforeach
                        </select>

                        <select name="usuario_id">
                            @foreach ($usuarios as $u)
                                <option value="{{ $u->id }}">{{ $u->nome }}</option>
                            @endforeach
                        </select>


                    </div>
            
                    <div class="fundo-caixa-formulario-botoes">
                        <button type="submit" value="Salvar">Salvar</button>
                        <button type="reset" value="Limpar">Limpar</button>
                    </div>
                    
                    <a href="{{ route('dashboard') }}">Voltar</a>
                    <a href="{{ route('categorias.index') }}">Especificações das Categorias</a>
            </form>
        </div>
    </div>
</body>
</html>
