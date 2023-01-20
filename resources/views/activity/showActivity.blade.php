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
                                <b>{{$response->id}}</b>
                            </p>
                            <p>
                                @if ($response->check===0)
                                    <a href="/home/response/status/{{$response->id}}/{{1}}" id="check-link" style="text-decoration: none; color: white;">Visto</a>
                                @else
                                    <a href="/home/response/status/{{$response->id}}/{{0}}" id="check-link" ><i class="fa-solid fa-check" style="color: green;"></i></a>
                                @endif

                            </p>
                        </div>

                        <div>
                            <form action="/home/response/note/{{$response->id}}" method="post">
                                <p class="d-flex" style="justify-content: space-between;  text-align:center;">
                                    <label><b>Aluno: </b> {{$response->student()->get()->first()->name}}</label>
                                    @if ($response->note)
                                    <select name="note" id="input-note" style="transform: translateY(-10%)">
                                        <option value="note" disabled>Nota</option>
                                        <option value="0" {{($response->note === 0 ? 'selected' : '')}}>0</option><option value="1" {{($response->note === 1 ? 'selected' : '')}}>1</option>
                                        <option value="2" {{($response->note === 2 ? 'selected' : '')}}>2</option><option value="3" {{($response->note === 3 ? 'selected' : '')}}>3</option>
                                        <option value="4" {{($response->note === 4 ? 'selected' : '')}}>4</option><option value="5" {{($response->note === 5 ? 'selected' : '')}}>5</option>
                                        <option value="6" {{($response->note === 6 ? 'selected' : '')}}>6</option><option value="7" {{($response->note === 7 ? 'selected' : '')}}>7</option>
                                        <option value="8" {{($response->note === 8 ? 'selected' : '')}}>8</option><option value="9" {{($response->note === 9 ? 'selected' : '')}}>9</option>
                                        <option value="10" {{($response->note === 10 ? 'selected' : '')}}>10</option>
                                    </select>
                                    @else
                                    <select name="note" id="input-note" style="transform: translateY(-10%)">
                                        <option value="note" selected disabled>Nota</option>
                                        <option value="0">0</option><option value="1">1</option>
                                        <option value="2">2</option><option value="3">3</option>
                                        <option value="4">4</option><option value="5">5</option>
                                        <option value="6">6</option><option value="7">7</option>
                                        <option value="8">8</option><option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    @endif
                                </p>
                                <p><b>Observação: </b> {{$response->description}}</p>
                                <div class="div-download">
                                    <p><b>Arquivos: </b> 1 arquivo</p>
                                    <p class="p-down">
                                        <a href="/home/response/download/{{$response->id}}"><i class="fa-solid fa-arrow-down" style="color: red;"></i></a>
                                    </p>
                                </div>
                                <div id="container-button-note">

                                        @csrf
                                        <input type="submit" value="Aderir nota">

                                </div>
                            </form>
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
@elseif (Auth::guard('student')->check()==true)
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
                    <p>Minhas respostas</p>
                </div>
                <div class="card-main-response">
                    @if (count($student_responses)>0)
                    @foreach ($student_responses as $student_response)
                    <div class="card-response">
                        <div class="first-div-response">
                            <p class="div-number">
                                <b>{{$student_response->id}}</b>
                            </p>
                            <p>
                                @if ($student_response->check===0)
                                    Não corrigido
                                @else
                                    <i class="fa-solid fa-check" style="color: green;"></i>
                                @endif

                            </p>
                        </div>

                        <div>
                            <form action="/home/response/note/{{$student_response->id}}" method="post">
                                <p class="d-flex" style="justify-content: space-between;  text-align:center;">
                                    <label><b>Aluno: </b> {{$student_response->student()->get()->first()->name}}</label>
                                    @if ($student_response->note)
                                    <select name="note" id="input-note" style="transform: translateY(-10%)">
                                        <option value="note" disabled>Nota</option>
                                        <option value="0" {{($student_response->note === 0 ? 'selected' : '')}}>0</option><option value="1" {{($student_response->note === 1 ? 'selected' : '')}}>1</option>
                                        <option value="2" {{($student_response->note === 2 ? 'selected' : '')}}>2</option><option value="3" {{($student_response->note === 3 ? 'selected' : '')}}>3</option>
                                        <option value="4" {{($student_response->note === 4 ? 'selected' : '')}}>4</option><option value="5" {{($student_response->note === 5 ? 'selected' : '')}}>5</option>
                                        <option value="6" {{($student_response->note === 6 ? 'selected' : '')}}>6</option><option value="7" {{($student_response->note === 7 ? 'selected' : '')}}>7</option>
                                        <option value="8" {{($student_response->note === 8 ? 'selected' : '')}}>8</option><option value="9" {{($student_response->note === 9 ? 'selected' : '')}}>9</option>
                                        <option value="10" {{($student_response->note === 10 ? 'selected' : '')}}>10</option>
                                    </select>
                                    @else
                                    <select name="note" id="input-note" style="transform: translateY(-10%); min-width: 90px;" >
                                        <option value="note" selected disabled>Sem nota</option>
                                    </select>
                                    @endif
                                </p>
                                <p><b>Observação: </b> {{$student_response->description}}</p>
                                <div class="div-download">
                                    <p><b>Arquivos: </b> 1 arquivo</p>
                                    <p class="p-down">
                                        <a href="/home/response/download/{{$student_response->id}}"><i class="fa-solid fa-arrow-down" style="color: red;"></i></a>
                                    </p>
                                </div>
                            </form>
                            <div id="container-button-note-editdelete">
                                <a href="/home/response/edit/{{$student_response->id}}"><i class="fa-solid fa-pen-to-square" style="color: blue;"></i></a>
                                <form action="/home/response/delete/{{$student_response->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="fa-solid fa-trash-can" style="color: red;"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div id="message-error-response">
                        <p>Você ainda não respondeu!</p>
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
        <div id="container-dados">
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

</div>
<script>
    let arrow = document.querySelector("#arrow");
    let container = document.querySelector("#sidebar-response");
    arrow.onclick = e =>{
        if(!container.classList.contains('ocult')){
            container.classList.add('ocult');
        }else{
            container.classList.remove('ocult');
        }
    }
</script>
@endsection

