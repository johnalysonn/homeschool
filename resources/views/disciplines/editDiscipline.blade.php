@extends('layout.layout')
@section('title', 'Editar')
@section('content')
<div id="container-form" style="height: 80vh;">
    <form action="/home/disciplines/update/{{$discipline->id}}" method="POST">
        @csrf
        @method('PUT')

        <h2>Editar Disciplina</h2>

        <div>
            <div class="container-input-info">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="inputBorder" value="{{$discipline->name}}">
            </div>
            <div id="container-button">
                <input type="submit" value="Editar">
            </div>
        </div>
    </form>
</div>
@endsection