@extends('layout.layout')
@section('title', 'dashboard')
@section('content')

<div id="container-home" style="overflow-y: hidden">
    <div class="container d-flex" id="container-home-info">
        <div id="container-info" style="margin-top: 200px;">
            <div data-aos="fade-right" data-aos-duration="1000">
                <div class="user">
                    <i class="fa fa-user" style="font-size: 100px;"></i>
                </div>
            </div>
            <div id="info-user" data-aos="fade-right" data-aos-duration="1000">
                <div class="container-info-user d-flex">
                    <p>
                        @if(Auth::guard('student')->check())
                            Nome do aluno:
                        @elseif(Auth::guard('teacher')->check())
                            Nome do professor:
                        @else
                            Nome do admin:
                        @endif
                    </p>
                    <p>{{$user->name}}</p>
                </div>
                <div class="container-info-user d-flex">
                    <p>
                        @if(Auth::guard('student')->check())
                            Email do aluno:
                        @elseif(Auth::guard('teacher')->check())
                            Email do professor:
                        @else
                            Email do admin:
                        @endif
                    </p>
                    <p>{{$user->email}}</p>
                </div>
            </div>
            <div>
            @if(Auth::guard('admin')->guest()==true)
                <div class="d-flex" style="gap: 20px;">
                    @if(Auth::guard('student')->check())
                    <a href="{{route('listStudents')}}" id="button-show-users">Ver todos</a>

                    <a href="home/editar/{{$user->id}}" id="button-show-users" style="text-align: center; border-color: green;">Editar</a>
                    @else
                    <a href="{{route('listUsers')}}" id="button-show-users">Ver todos</a>
                    <a href="edit/{{$user->id}}" id="button-show-users" style="text-align: center; border-color: green;">Editar</a>
                    @endif
                </div>
                @endif
            </div>


        </div>
        <div id="container-dash-img" data-aos="fade-left" data-aos-duration="1000">
            <img src="/img/student.png" alt="HomeSchool">
        </div>
    </div>
</div>

@endsection
