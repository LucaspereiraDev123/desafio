<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Economiza Aí</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="cabecalho">
        
        <header>
            <h1>Economiza Aí</h1>  
        </header>
        <main>
            <nav>
                <ul>
                    <li><a href="/dashboard">Inicio</a></li>
                </ul>
            </nav>
            <div class="principal">
                @yield('principal')
            </div>
        </main>
        <footer>
            <p>Feito por:</p>
            <p>Lucas Peira Rocha</p>
            <p>Instagram</p>
            Contatos
        <footer>

    </div>
</body>
</html>