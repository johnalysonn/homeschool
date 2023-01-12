@extends('layout.layout')
@section('title', 'Editar Resposta')
@section('content')

<div class="container" id="form-activity-main">
    <div id="form-activity">
        <form action="/home/response/update/{{$response->id}}" method="POST" style="width: 80vw;" enctype="multipart/form-data">
            @method('put')
            @csrf

            <h2>Editar Resposta</h2>

            <div id="container-inputs-response">
                <div class="d-flex" style="flex-direction: column; gap: 10px;">
                    <div>
                        <label for="name">Nome: {{$activity->name}}</label>
                    </div>
                    <div>
                        <label for="discipline">Disciplina: {{($discipline = $discipline_model::findOrFail($activity->discipline_id))->name}}</label>

                    </div>
                    {{-- <div class="container-input-info">
                        <label id="label-response">Envie sua resposta:</label>
                        <input type="file"  name="file_response[]" multiple id="file_response" class="form-control-file">
                    </div> --}}
                </div>
                <div>
                    <div id="container-coment">
                        <label for="coment">Comentário:</label>
                        <textarea maxlength="150" rows="3" id="coment" name="coment" placeholder="Escreva um comentário:" style="padding: 20px; width: 100%; resize: none; font-size: 0.9em;">{{$response->description}}</textarea>
                    </div>
                </div>
            </div>
            <div id="container-button" class="d-flex" style="justify-content: center; align-items: center;">
                <input type="submit" value="Editar Resposta" style="width: 20%;">
            </div>
        </form>
    </div>
</div>
@endsection
