@extends('layout.layout')
@section('title', 'Cadastro')
@section('content')
<div id="container-form" style="height: 80vh;">
    <form action="{{route('registerDisciplines')}}" method="POST">
        @csrf

        <h2>Cadastro Disciplina</h2>

        <div>
            <div class="container-input-info">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="inputBorder">
            </div>
            <div id="container-button">
                <input type="submit" value="Cadastrar">
            </div>
        </div>
    </form>
</div>
@endsection