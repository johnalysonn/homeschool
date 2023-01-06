@extends('layout.layout')
@section('title', 'Listagem de Atividades')
@section('content')

<main style="margin-top: 5%;">
    @if(Auth::guard('teacher')->check()==true)
    <div id="activity-container" class="col-md-12">
        <label><h1 class="before-style">Minhas atividades criadas</h1></label>
        <div id="cards-container" class="row">
            @foreach($activities as $activity)
            <div class="card col-md-3">
                <div id="container-card-name">
                    <h3>{{$activity->name}}</h3>
                </div>
                <div>
                    <div class="card-body">
                        <p class="card-date">Criado em: {{($activity->created_at)->format('d/m/Y')}}</p>
                        <p class="card-teacher">Professor: {{$activity->teacher()->get()->first()->name}}</p>
                        <p class="card-discipline">Disciplina: {{($discipline = $discipline_model::findOrFail($activity->discipline_id))->name}}</p>
                    </div>
                    @if (Auth::guard('teacher')->check()==true || Auth::guard('admin')->check()==true)
                        <div id="card-buttom-actions" class="d-flex" style="gap: 15px;">
                            <a href="/home/activity/{{$activity->id}}" class="btn btn-primary">Saber Mais</a>
                            <a href="/home/activity/edit/{{$activity->id}}" class="btn btn-primary" style="border-color: blue;"><i class="fa-solid fa-pen-to-square" style="color: blue;"></i></a>
                        </div>
                        <div>
                            <form action="/home/activity/delete/{{$activity->id}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-primary"
                                style="border-color: red; align-items: center; outline:none;"><i class="fa-solid fa-trash-can" style="color: red;"></i></button>
                            </form>
                        </div>
                    @else
                        <div id="card-buttom-actions" class="d-flex" style="gap: 15px;">
                            <a href="/home/activity/{{$activity->id}}" class="btn btn-primary">Saber Mais</a>
                        </div>
                    @endif

                </div>
            </div>
            @endforeach
            @if(count($activities)==0)
            <p class="msgActivity">Você não criou nenhuma atividade!</p>
            @endif
        </div>
    </div>
    @endif
    <div id="activity-container" class="col-md-12" style="margin: 30px 0px 30px 0px; min-height: 80vh;">
        <label><h1>Atividades</h1></label>
        <div id="cards-container" class="row">
            @foreach($all_activities as $activity)
            <div class="card col-md-3">
                <div id="container-card-name">
                    <h3>{{$activity->name}}</h3>
                </div>
                <div class="card-body">
                    <div>
                        <div class="card-body">
                            <p class="card-date">Criado em: {{($activity->created_at)->format('d/m/Y')}}</p>
                            <p class="card-teacher">Professor: {{$activity->teacher()->get()->first()->name}}</p>
                            <p class="card-discipline">Disciplina: {{($discipline = $discipline_model::findOrFail($activity->discipline_id))->name}}</p>
                        </div>
                        @if (Auth::guard('admin')->check()==true)
                            <div id="card-buttom-actions" class="d-flex" style="gap: 15px;">
                                <a href="/home/activity/{{$activity->id}}" class="btn btn-primary">Saber Mais</a>
                                <a href="/home/activity/edit/{{$activity->id}}" class="btn btn-primary" style="border-color: blue;"><i class="fa-solid fa-pen-to-square" style="color: blue;"></i></a>
                            </div>
                            <div>
                                <form action="/home/activity/delete/{{$activity->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-primary"
                                    style="border-color: red; align-items: center;"><i class="fa-solid fa-trash-can" style="color: red;"></i></button>
                                </form>
                            </div>
                        @elseif (Auth::guard('student')->check()==true)
                            <div id="card-buttom-actions" class="d-flex" style="gap: 15px;">
                                <a href="/home/activity/{{$activity->id}}" class="btn btn-primary">Saber Mais</a>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            @if(count($all_activities)==0)
            <p class="msgActivity">Não foi criada nenhuma atividade!</p>
            @endif
        </div>
    </div>
</main>
@endsection
