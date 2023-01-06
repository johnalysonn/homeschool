@extends('layout.layout')
@section('title', 'Listagem de Alunos')
@section('content')
<div class="container" id="container-table-main">
@if(count($students)>0)
    <div id="container-table" class="container d-flex" style="flex-direction:column; gap: 30px;">
        <div class="title-type-user"><h1>Lista de estudantes</h1></div>
        <table class="table" id="tableStudent">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        @if(!Auth::guard('student')->check())
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                <tr>
                    @if(Auth::guard('student')->check())
                        <th scope="row">{{$student->id}}</th>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                    @else
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>
                        @if($student->active===1)
                            Ativado
                        @else
                            Desativado
                        @endif
                    </td>
                    <td class="d-flex" style="gap: 20px;">
                        <a href="home/editar/{{$student->id}}" class="btn btn-info edit-btn" id="edit-btn-show"><i class="fa-solid fa-pen-to-square" style="color: blue;"></i></a>
                        @if($student->active === 0)
                            <a href="home/status/{{$student->id}}/{{1}}" class="btn btn-info active-btn" id="edit-btn-show"
                            style="border-color: green;"><i class="fa-solid fa-check" style="color: green;"></i></a>
                        @else
                            <a href="home/status/{{$student->id}}/{{0}}" class="btn btn-info active-btn" id="edit-btn-show"
                            style="border-color: red;"><i class="fa-solid fa-ban" style="color: red;"></i></a>
                        @endif
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <div>
        {{$students->links()}}
    </div> --}}
    @else
        <div id="errorCad">
            <p>Não há nenhum aluno cadastrado!</p>
        </div>
    @endif
    @if(Auth::guard('teacher')->check())
    <div id="container-user-add">
        <a href="{{route('formRegisterStudent')}}"class="btn btn-info edit-btn">Adicionar Aluno</a>
    </div>
    @elseif(Auth::guard('admin')->check())
    <div id="container-user-add">
        <a href="{{route('formRegisterStudent')}}"class="btn btn-info edit-btn">Adicionar Aluno</a>
    </div>
    @endif
</div>
    
@endsection