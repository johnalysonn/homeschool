@extends('layout.layout')
@section('title', 'Atividades')
@section('content')

@if (Auth::guard('teacher')->check()==true || Auth::guard('admin')->check()==true)
<div id="sidebar">
    <div id="sidebar-response" class="ocult">
        <div id="container-arrow">
            <div id="container-arrow-main">
                <i class="fa-solid fa-circle-arrow-right" id="arrow" ></i>
            </div>
        </div>
        <div id="container-responses">
            <div id="container-cards-responses">
                <div id="container-title-responses">
                    <p>Respostas</p>
                </div>
                <div class="card-main-response">
                    @if (count($responses)>0)
                    @foreach ($responses as $response)
                    <div class="card-response">
                        <div class="first-div-response">
                            <p class="div-number">
                                <b>{{$loop->index + 1}}</b>
                            </p>
                            <p>
                                @if ($response->check===0)
                                    <a href="/home/response/status/{{$response->id}}/{{1}}" id="check-link" style="text-decoration: none; color: white;">Check</a>
                                @else
                                    <a href="/home/response/status/{{$response->id}}/{{0}}" id="check-link" ><i class="fa-solid fa-check" style="color: green;"></i></a>
                                @endif

                            </p>
                        </div>
                        <div>
                            <p class="d-flex" style="justify-content: space-between;  text-align:center;">
                                <label><b>Aluno: </b> {{$response->student()->get()->first()->name}}</label>
                                <select name="note" id="input-note" style="transform: translateY(-10%)" onchange="noteChange()">
                                    <option value="note" selected disabled>Nota</option>
                                    <option value="0">0</option><option value="1">1</option>
                                    <option value="2">2</option><option value="3">3</option>
                                    <option value="4">4</option><option value="5">5</option>
                                    <option value="6">6</option><option value="7">7</option>
                                    <option value="8">8</option><option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </p>
                            <p><b>Observação: </b> {{$response->description}}</p>
                            <div class="div-download">
                                <p><b>Arquivos: </b>  {{$response->filepath}}</p>
                                <p class="p-down">
                                    <a href="/home/response/download/{{$response->id}}"><i class="fa-solid fa-arrow-down" style="color: red;"></i></a>
                                </p>
                            </div>
                            <div id="container-button-note">
                                <input type="submit" class="d-none" value="Salvar">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div id="message-error-response">
                        <p>Nenhum aluno respondeu!</p>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endif

<div class="container-center">
        <div>
                <div id="container-name-atv">
                        <p>
                        <p class="hiper-message-name" >{{$activity->name}}</p>

                        </p>
                </div>
                <div id="container-info-atv">
                        <div id="column-info" data-aos="fade-right" data-aos-duration="1000">
                                <div>
                                        <p class="inline">
                                        <p class="hiper-message">Feita pelo professor:</p>
                                        <p>{{$teacher->name}}</p>
                                        </p>
                                </div>
                                <div>
                                        <p class="inline">
                                        <p class="hiper-message">Disciplina: </p>
                                        <p>{{
                                        ($discipline = $discipline_model::findOrFail($activity->discipline_id))->name}}
                                        </p>
                                        </p>
                                </div>
                        </div>
                        <div data-aos="fade-left" data-aos-duration="1000">
                                <div>
                                        <p>
                                        <p class="hiper-message">Descrição:</p>
                                        <p data-aos="fade-left">{!!$activity->description!!}</p>
                                        </p>
                                </div>
                        </div>
                </div>
                <div id="container-button-atv">
                        @if (Auth::guard('student')->check()==true)
                        <a href="/home/activity/response/create/{{$activity->id}}">Responder Atividade</a>
                        @endif
                </div>

        </div>

</div>
<script>
    var arrow = document.querySelector("#arrow");
    var container = document.querySelector("#sidebar-response");


    arrow.onclick = e =>{
        if(!container.classList.contains('ocult')){
            container.classList.add('ocult');
        }else{
            container.classList.remove('ocult');
        }
    }
    function noteChange(){
        var note = document.querySelector('#input-note').value;
        var container_note = document.querySelector('#container-button-note');

        if(note !== '0'){
        if(!container_note.classList.contains('d-none')){
            container_note.classList.add('d-none');
        }else{
            container_note.classList.remove('d-none');
        }
    }
    }
</script>
@endsection

