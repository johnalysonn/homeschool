@extends('layout.layout')
@section('title', 'Login Professor')
@section('content')

<div id="container-typeLogin">
    <div id="typeLogin">
    <a href="{{route('formLoginAdmin')}}">Admin</a>
        <a href="{{route('formLoginTeacher')}}"
        class="{{(Route::current()->getName() ==='formLoginTeacher' ? 'activeColor' : '')}}" >Professor</a>
        <a href="{{route('formLoginStudent')}}">Aluno</a>
    </div>
</div>
<div id="container-form">
    <form action="{{route('loginTeacher')}}" method="POST" >
        @csrf

        <h2>Login Professor</h2>

        <div>
            <div class="container-input-info">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="inputBorder">
            </div>
            <div class="container-input-info">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password"class="inputBorder">
            </div>
            <div id="container-button">
                <input type="submit" value="Login">
            </div>
        </div>
    </form>
</div>
@endsection
