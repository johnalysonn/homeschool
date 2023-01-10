<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- Fonts Awesome --}}
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css')}}">
    {{-- Data table --}}
    <link rel="stylesheet" href="cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/layout/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/forms/form.css')}}">
    <link rel="stylesheet" href="{{asset('css/forms/activity.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/logo.png" alt="Home School">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link before
                            {{(Route::current()->getName() ==='home' ? 'active' : '')}}">Home</a>
                        </li>

                    @if(Auth::guard('teacher')->guest()==true && Auth::guard('student')->guest()==true && Auth::guard('admin')->guest()==true)
                        <li class="nav-item">
                            <a href="{{route('formLoginTeacher')}}" class="nav-link before
                            {{(Route::current()->getName() ==='formLoginTeacher' ? 'active' : '')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('formRegisterTeacher')}}" class="nav-link before
                            {{(Route::current()->getName() ==='formRegisterTeacher' ? 'active' : '')}}">Register</a>
                        </li>
                    @elseif(Auth::guard('admin')->check() == true)
                            <li class="nav-item">
                                <a href="/home/listActivities" class="nav-link before
                                {{(Route::current()->getName() ==='listActivities' ? 'active' : '')}}">Atividades</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('listDisciplines')}}" class="nav-link before
                                {{(Route::current()->getName() ==='listDisciplines' ? 'active' : '')}}">Disciplinas</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('listUsers')}}" class="nav-link before
                                {{(Route::current()->getName() ==='listUsers' ? 'active' : '')}}">Professores</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('listStudents')}}" class="nav-link before
                                {{(Route::current()->getName() ==='listStudents' ? 'active' : '')}}">Alunos</a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="GET">
                                    @csrf
                                    <a href="/logout" class="nav-link before" onclick="event.preventDefault();
                                    this.closest('form').submit();">Sair</a>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link a-awesome
                                {{(Route::current()->getName() ==='dashboard' ? 'activeColor' : '')}}"><i class="fa-regular fa-circle-user"></i></i></a>
                            </li>
                    @elseif(Auth::guard('teacher')->check() == true)
                        <li class="nav-item">
                                <a href="/home/listActivities" class="nav-link before
                                {{(Route::current()->getName() ==='listActivities' ? 'active' : '')}}">Atividades</a>
                        </li>
                        <li class="nav-item">
                                <a href="{{route('createActivity')}}" class="nav-link before
                                {{(Route::current()->getName() ==='createActivity' ? 'active' : '')}}">Criar atividade</a>
                        </li>
                        <li class="nav-item">
                                <a href="{{route('listDisciplines')}}" class="nav-link before
                                {{(Route::current()->getName() ==='listDisciplines' ? 'active' : '')}}">Disciplinas</a>
                        </li>
                        <li class="nav-item">
                                <a href="{{route('listUsers')}}" class="nav-link before
                                {{(Route::current()->getName() ==='listUsers' ? 'active' : '')}}">Professores</a>
                        </li>
                        <li class="nav-item">
                                <a href="{{route('listStudents')}}" class="nav-link before
                                {{(Route::current()->getName() ==='listStudents' ? 'active' : '')}}">Alunos</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="GET">
                                @csrf
                                <a href="/logout" class="nav-link before" onclick="event.preventDefault();
                                this.closest('form').submit();">Sair</a>
                            </form>
                        </li>
                        <li class="nav-item">
                                <a href="/dashboard" class="nav-link a-awesome
                                {{(Route::current()->getName() ==='dashboard' ? 'activeColor' : '')}}"><i class="fa-regular fa-circle-user"></i></a>
                        </li>
                    @elseif(Auth::guard('student')->check() == true)
                        <li class="nav-item">
                            <a href="/home/listActivities" class="nav-link before
                            {{(Route::current()->getName() ==='listActivities' ? 'active' : '')}}">Atividades</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('listDisciplines')}}" class="nav-link before
                            {{(Route::current()->getName() ==='listDisciplines' ? 'active' : '')}}">Disciplinas</a>
                        </li>
                        <li class="nav-item">
                                <a href="{{route('listStudents')}}" class="nav-link before
                                {{(Route::current()->getName() ==='listStudents' ? 'active' : '')}}">Alunos</a>
                        </li>
                        <li class="nav-item">
                        <form action="/logout" method="GET">
                            @csrf
                            <a href="/logout" class="nav-link before" onclick="event.preventDefault();
                            this.closest('form').submit();">Sair</a>
                        </form>
                        </li>
                        <li class="nav-item">
                                <a href="/dashboard" class="nav-link a-awesome
                                {{(Route::current()->getName() ==='dashboard' ? 'activeColor' : '')}}"><i class="fa-regular fa-circle-user"></i></a>
                        </li>
                    @endif
                    </ul>
                </div>
            </nav>
        </header>
        <!-- (Route::current()->getName() ==='home' ? '' : 'container-main')  -->
        <div id="@if(Route::current()->getName() ==='home')

        @elseif(Route::current()->getName() ==='formCreateActivity')

        @else
        container-main
        @endif
        ">
            <div>
                @if(session('msg'))
                  <p class="msg">{{session('msg')}}</p>
                @endif
                @yield('content')
            </div>
        </div>

        <footer>
            <div class="container d-flex" id="container-footer">
                <div id="container-footer-img">
                    <img src="/img/logofooter.png" alt="HomeSchool">
                </div>
                <div id="container-footer-copy">
                    <p>&copy;2022 | Copyright - Todos os direitos reservados</p>
                </div>
            </div>
        </footer>

    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    AOS.init();
    </script>
    <script>
            CKEDITOR.replace( 'description', {
                removePlugins: 'image',
            });
    </script>
    <script>
        $(document).ready( function () {
            $('.table').DataTable({
                "dom": 'frtip'
            });
        });
    </script>
</body>
</html>
