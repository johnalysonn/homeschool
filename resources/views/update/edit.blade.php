@extends('layout.layout')
@section('title', 'Editando')
@section('content')
<div id="container-form" style="height: 80vh;">
    <form action="update/{{$teacher->id}}" method="POST">
        @csrf
        @method('PUT')
        <h2>Editar</h2>
        <div>
            <div class="container-input-info">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="inputBorder" value="{{$teacher->name}}">
            </div>
            <div class="container-input-info">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="inputBorder" value="{{$teacher->email}}">
            </div>
            <div class="container-input-info">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password"class="inputBorder">
            </div>
            <div id="container-button">
                <input type="submit" value="Editar">
            </div>
        </div>
    </form>
</div>
@endsection