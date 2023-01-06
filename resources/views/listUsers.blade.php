@extends('layout.layout')
@section('title', 'Listagem de usuários')
@section('content')
<div class="container" id="container-table-main">
    <div id="container-table" class="container d-flex" style="flex-direction:column; gap: 30px;">
        @if(count($teachers) > 0)
            <div class="title-type-user"><h1>Lista de professores</h1></div>
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            @if(Auth::guard('admin')->check())
                                <th scope="col">Ações</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $teacher)
                    <tr>
                        <th scope="row">{{$teacher->id}}</th>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->email}}</td>
                        @if(Auth::guard('admin')->check())
                        <td class="d-flex">
                            <a href="edit/{{$teacher->id}}" class="btn btn-info edit-btn" id="edit-btn-show"><i class="fa-solid fa-pen-to-square" style="color: blue;"></i></a>
                            
                            <form action="destroy/{{$teacher->id}}" method="post" style="margin-left: 10px;">
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
        @else
        <table>
            <div>
                <p>Não há nenhum professor cadastrado!!</p>
            </div>
        </table>
        @endif
        
    </div>
    @if(Auth::guard('admin')->check())
    <div id="container-user-add">
        <a href="{{route('formRegisterTeacher')}}"class="btn btn-info edit-btn">Adicionar Professor</a>
    </div>
    @endif
</div>
    
@endsection