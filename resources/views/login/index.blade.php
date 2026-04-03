@extends('base')
@section('principal')
<form class='formulario' method="POST" > 
    @csrf
        <label for="email" value="{{ old('email') }}">E-mail</label>
        <input type="email" name="email" id="email">

        <label for="password">Senha</label>
        <input type="password" name="password" id="password">

        <button>Entrar</button>
        <a href="{{ route('usuarios.create') }}">Registrar</a>
            
</form>
@endsection