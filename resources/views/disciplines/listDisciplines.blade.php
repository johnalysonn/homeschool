@extends('layout.layout')
@section('title', 'Listagem de Disciplinas')
@section('content')

<div class="container" id="container-table-main">
@if(count($disciplines)>0)
    <div id="container-table" class="container">
        
            <table class="table">

                <thead>
                    <tr>
                        @if(Auth::guard('admin')->check() == true)
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ações</th>
                        @elseif(Auth::guard('admin')->guest()==true)
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($disciplines as $discipline)
                        <tr>
                            @if(Auth::guard('student')->check())
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$discipline->name}}</td>
                            @elseif(Auth::guard('teacher')->check())
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$discipline->name}}</td>
                            @else
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$discipline->name}}</td>
                                <td class="d-flex" style="gap: 20px;">
                                    <a href="/home/disciplines/editar/{{$discipline->id}}" class="btn btn-info edit-btn" id="edit-btn-show"><i class="fa-solid fa-pen-to-square" style="color: blue;"></i></a>
                                    <form action="/home/disciplines/delete/{{$discipline->id}}" method="post" style="margin-left: 10px;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"class="btn btn-danger delete-btn" id="delete-btn-show"><i class="fa-solid fa-trash-can" style="color: red;"></i></button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div id="errorCad">
                <p>Não há nenhuma disciplina cadastrado!</p>
            </div>
        @endif
        @if(Auth::guard('admin')->check()==true)
        <div id="container-user-add">
            <a href="{{route('formRegisterDisciplines')}}"class="btn btn-info edit-btn">Adicionar Disciplina</a>
        </div>
        @endif
    </div>
    
@endsection