<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Dashboard</title>
</head>
<body>
    <div class="conteudo">
        <div class="conteudo-cabecalho">
            <nav>
                <div class="conteudo-cabecalho-navegacao">
                    <ul>
                        {{-- Links para o cadastro --}}
                        <li>
                            <a href="{{ route('categorias.index') }}">Categorias</a>
                        </li>
                        <li>
                            <a href="{{ route('transacoes.create') }}">+Nova Transação</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">Sair</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="conteudo-principal">
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome(transação)</th>
                            <th scope="col">Descrição(transação)</th>
                            <th scope="col">Tipo(Categoria)</th>
                            <th scope="col">Valor R$(transação)</th>
                            <th scope="col">Nome da Categoria(Categoria)</th>
                            <th scope="col">Usuario(Usuario)</th>
                            <th scope="col">Data(Transação)</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transacoes as $t)
                            <tr>
                            <th scope="row">{{ $t->id }}</th>
                            <td>{{ $t->nome }}</td>
                            <td>{{ $t->descricao }}</td>
                            <td></td>
                            <td>{{ $t->valor }}</td>
                            <td></td>
                            <td></td>
                            <td>{{ $t->created_at }}</td>
                            </tr>
                            <td><a href="{{ route('transacoes.show', $t->id) }}">Exibir</a></td>
                            <td><a href="{{ route('transacoes.edit', $t->id) }}">Editar</a></td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="conteudo-rodape">
            <form method="GET" action="{{ route('dashboard') }}">
                <input type="text" name="nome" placeholder="Nome">

                <!-- Não deu pra fazer ;( -->
                <select name="categoria">
                    <option value="">Todas</option>
                    @foreach($categorias as $c)
                        <option value="{{ $c->id }}">{{ $c->nome }}</option>
                    @endforeach
                </select>

                <button type="submit">Filtrar</button>
            </form>
        </div>
    </div>
</body>
</html>