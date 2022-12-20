@extends('layout.layout')
@section('title', 'Editando Atividade')
@section('content')

<div class="container" id="form-activity-main">
    <div id="form-activity">
        <form action="/home/activity/update/{{$activity->id}}" method="POST" style="width: 80vw;">
            @method('PUT')
            @csrf

            <h2>Editando Atividade {{$activity->id}}</h2>

            <div id="container-inputs">
                <div class="container-input-info">
                    <label for="theme">Nome</label>
                    <input type="text" name="name" id="name" class="inputBorder" style="width: 40%; font-size: 1.1em;" value="{{$activity->name}}">
                </div>
                <div class="container-input-info">
                    <label for="theme">Disciplina</label>
                    <select class="inputBorder" name="discipline" id="discipline"style="width: 40%; font-size: 1.1em;" >
                        <option selected disabled>Selecione uma disciplina</option>
                        @foreach($disciplines as $discipline)
                        <option name="{{$discipline->name}}" value="{{$discipline->id}}"
                            @if ($discipline->name == ($discipline_model::findOrFail($activity->discipline_id)->name))
                            selected
                            @endif>{{$discipline->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Descrição:</label>
                    <textarea id="description" name="description" placeholder="Objetivo da atividade: " style="padding: 20px;">{!!$activity->description!!}</textarea>
                </div>
                <div id="container-button" class="d-flex" style="justify-content: center; align-items: center;">
                    <input type="submit" value="Editar Atividade" style="width: 20%;">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
