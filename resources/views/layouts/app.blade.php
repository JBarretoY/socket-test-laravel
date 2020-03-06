<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="icon" href="http://betatest.consultaneo.com/file/2019/11/cropped-favicon-32x32.png" sizes="32x32"> --}}
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <title> @yield('title') | Plataform</title>
    @include('plugins.css')
</head>
<body class="home page-template page-template-page-home-new page-template-page-home-new-php page page-id-9 two-column right-sidebar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-light" style="min-height: 84px; background: #000e27 !important;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img alt="Consultaneo" src="{{ asset('images/logo-de.png') }}">
            </a>

            @if(auth()->check())
                <span class="d-md-none d-lg-none d-sm-block">
                    <a class="fre-notification dropdown-toggle d-md-none d-lg-none" data-toggle="dropdown" href="">
                        <i class="fa fa-bell-o" aria-hidden="true"></i>
                    </a>
                    <ul class="list_notify dropdown-menu dropdown-menu-notifi d-md-none d-lg-none dropdown-keep-open notification-list">
                        <li style="text-align: center;">
                            <a class="view-more-notify" href="http://betatest.consultaneo.com/list-notification/">Ver todas las notificaciones</a>
                        </li>
                    </ul>
                </span>
            @endif
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @if(auth()->check())
                        <li class="nav-item d-md-none d-lg-none">
                            <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-start" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ count(auth()->user()->files) > 0 ? auth()->user()->files[0]->path : 'http://0.gravatar.com/avatar/68667eb897f78a64d3fb5e0a093ef09e?s=125&amp;d=mm&amp;r=G' }}" alt="" style="background: red; height: 30px; width: 30px; border-radius: 50%; margin-right: 5px;">
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                        </li>
                        <li class="nav-link d-md-none d-lg-none">
                            <a class="nav-link" href="{{ url('edit-profile') }}">MI PERFIL</a>
                        </li>
                        <li class="nav-link d-md-none d-lg-none">
                            <a class="nav-link" href="http://betatest.consultaneo.com/my-credit/">MI CRÉDITO</a>
                        </li>
                        <li class="nav-link d-md-none d-lg-none">
                            <a class="nav-link" href="{{ url('/messages') }}">BANDEJA DE ENTRADA</a>
                        </li>
                    @endif
                    <li class="nav-item active">
                        <div class="fre-search-wrap">
                            <form class="fre-form-search" action="{{ url('/search') }}" method="get" style="padding: 0 10px;">
                                <div class="fre-search dropdown" style="padding: 0 10px;">
                                    <span class="fre-search-dropdown-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </span>
                                    <input class="fre-search-field" name="keyword" value="" type="text" placeholder="Buscar Consultores">
                                    <input type="hidden" value="consultant" id="name_variant" name="name">
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item data-search" href="#" data-search="consultant">Buscar Consultores</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item data-search" href="#" data-search="project">Buscar Proyectos</a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </li>
                    @if(auth()->check())
                        @if(auth()->user()->type === 4)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/my-projects') }}">MI PROYECTO</a>
                            </li>
                        @else
                            <li class="nav-item dropdown d-xs-none d-sm-none d-md-block d-lg-block">
                                <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-start" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    PROYECTOS &nbsp; <i class="fa fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/projects') }}">TODOS LOS PROYECTOS PUBLICADOS</a>
                                    <a class="dropdown-item" href="{{ url('/create-project') }}">PUBLICA UN PROYECTO</a>
                                </div>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/projects') }}">PROYECTOS</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-start" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                CONSULTORES &nbsp;<i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/projects') }}">BUSCAR PROYECTO</a>
                                <a class="dropdown-item" href="{{ url('/login') }}">CREAR PERFIL</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-start" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                CLIENTES &nbsp;<i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/login') }}">PUBLICAR UN PROYECTO</a>
                                <a class="dropdown-item" href="{{ url('/consultants') }}">BUSCAR CONSULTORES</a>
                            </div>
                        </li>
                    @endif
                </ul>
                
                {{-- Navbar user dropdown --}}
                <ul class="navbar-nav float-left">
                    @if(auth()->check())
                        <li class="nav-item d-sm-none d-md-flex align-items-center d-lg-flex align-items-center">
                            <a class="fre-notification dropdown-toggle" data-toggle="dropdown" href="">
                                <i class="fa fa-bell-o" aria-hidden="true"></i>
                            </a>
                            <ul class="list_notify dropdown-menu dropdown-menu-notifi dropdown-keep-open notification-list">
                                <li style="text-align: center;">
                                    <a class="view-more-notify" href="http://betatest.consultaneo.com/list-notification/">Ver todas las notificaciones</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown d-xs-none d-sm-none d-md-block d-lg-block">
                            <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-start" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ count(auth()->user()->files) > 0 ? auth()->user()->files[0]->path : 'http://0.gravatar.com/avatar/68667eb897f78a64d3fb5e0a093ef09e?s=125&amp;d=mm&amp;r=G' }}" alt="" style="background: red; height: 30px; width: 30px; border-radius: 50%; margin-right: 5px;">
                                <span>{{ Auth::user()->name }} <i class="fa fa-caret-down"></i></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('edit-profile') }}">Mi perfil</a>
                                <a class="dropdown-item" href="http://betatest.consultaneo.com/my-credit/">Mi Crédito</a>
                                <a class="dropdown-item" href="{{ url('/messages') }}">Bandeja de Entrada</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('auth/logout') }}">Salir</a>
                            </div>
                        </li>
                        <li class="nav-link d-md-none d-lg-none">
                            <a class="nav-link" href="{{ url('auth/logout') }}">SALIR</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">ENTRAR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/register') }}">REGISTRATE</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="copyright-wrapper footer-copyright-wrapper mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 mt-4">
                    <div class="row">
                        <div class="col-sm-12 col-md-9 col-lg-6">
                            <div class="fre-footer-logo">
                                <a href="{{ url('/') }}" class="logo-footer">
                                    <img alt="Consultaneo" src="{{ asset('images/logo-de.png') }}">
                                </a>
                            </div>
                            
                            <span class="mt-3">
                                Conectamos consultores, coaches y freelancers con clientes que necesitan soluciones &nbsp;
                                para el emprendimiento y la transformación digital
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-3 mt-4">
                    <span class="footer-title">Produ<u class="fancy-underline">cto</u></span> <br>
                    <div class="mt-3">
                        Consultoría
                    </div>
                    <div class="mt-3">
                        <a class="fre-btn primary-bg-color" style="border-radius: 10px; padding: 5px 10px; height: unset; line-height: unset;" href="{{ url('/register/client') }}">Recibe consultoría</a>
                    </div>

                        <div class="mt-3">
                        <ul>
                            <li>
                                <a>Encuentra un consultor</a>
                            </li>

                            <li>
                                <a>Recibe consultoría</a>
                            </li>

                            <li>
                                <a>Paquetes</a>
                            </li>

                            <li>
                                <a>Otros</a>
                            </li>
                        </ul>
                        </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-3 mt-4">
                    <span class="footer-title">Li<u class="fancy-underline">nks</u></span> <br>
                    <div class="footer-links mt-3">
                        <ul>
                            <li>
                                <a href="https://consultaneo.com/blog">BLOG</a>
                            </li>
                            <li>
                                <a href="#">Misión &amp; Visión</a>
                            </li>

                            <li>
                                <a href="https://consultaneo.com/blog">Regístrate</a>
                            </li>

                            <li>
                                <a href="https://consultaneo.com/blog">Consultores Certificados</a>
                            </li>

                            <li>
                                <a href="https://consultaneo.com/blog">Proyectos en línea</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-3 mt-4">
                    <span class="footer-title">Conta<u class="fancy-underline">cto</u></span>
                    <div class="mt-3">
                        2070 NW 79th
                        Ave. Miami, FL 33122
                        UNITED STATES
                        Correo: info@consultaneo.com
                    </div>
                </div>
            </div>
            <div class="row mt-5 d-flex justify-content-center">
                <div class="footer-newsletter align-self-start flex-grow-1" style="margin-left: 10px;">
                    <h4>SOCIAL</h4>
                    <div class="social-links">
                        <a href="https://twitter.com/consultaneo" class="twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://www.facebook.com/consultaneo/" class="facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/consultaneo" class="instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/consultaneo" class="linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 flex-grow-1">
                    Newsletter
                    <div class="input-wrapper">
                        <input type="text" placeholder="subscríbete a nuestro boletín">
                        <button class="suffix-button">
                            Subscríbete
                        </button>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 flex-grow-1">
                </div>
            </div>
        </div>
        <p class="text-copyright text-center mr-4">Consultaneo {{ date('yy') }} Todos los derechos reservados</p>
    </footer>

    @include('plugins.js')
    @yield('js')
    <script src="{{ asset('/js/trash.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>