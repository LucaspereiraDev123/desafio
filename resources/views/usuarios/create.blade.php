@extends('base')
@section('principal')
<form class='formulario' method="POST" > 
    @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email">

        <label for="password">Senha</label>
        <input type="password" name="password" id="password">

        <button>Registrar</button> 
</form>
@endsection