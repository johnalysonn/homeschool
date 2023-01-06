@extends('layout.layout')
@section('title', 'Home')
@section('content')
<div id="container-home">
    <div class="container d-flex" id="container-home-info">
        <div class="circle"></div>
        <div id="container-info">
            <h1>Sistema de Atividades</h1>
            <label>
                <p>Sistema de auxílio para alunos</p>
                <p>com atividades semanais</p>
            </label>
        </div>
        <div id="container-info-img">
            <img src="/img/studentsKids.png" alt="HomeSchool">
        </div>
    </div>
</div>
<div class="container d-flex"  id="container-cards">
    <div class="container-card">
        <div class="d-flex cards" id="card-left" data-aos="fade-right" data-aos-duration="1000">
            <div>
                <p>Um sistema com foco educativo com objetivo em auxiliar estudando via web com exercícios semanais</p>
            </div>
        </div>
    </div>
    <div class="container-card">
        <div class="d-flex cards" id="card-right" data-aos="fade-left" data-aos-duration="1000">
            <div>
                <p>Importante se atentar as postagens semanais para não se atrasar e conseguir prencher a resposta corretamente</p>
            </div>
        </div>
    </div>
</div>

@endsection
