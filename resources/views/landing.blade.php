@extends('layouts.app')
@section('title', 'Consultaneo')
@section('content')
<div class="fre-background" id="background_banner">
    <div class="fre-bg-content">
        <div class="container">
            <h2 class="titulo1" id="title_banner">Asesórate y realiza tu proyecto con los mejores consultores</h2>
            @if( Auth::check() )
                @if( Auth::user()->type == 4 )
                    <a class="fre-btn primary-bg-color" href="{{ url('/projects') }}">Buscar Proyectos</a>
                    <a class="fre-btn primary-bg-color" href="{{ url('/edit-profile') }}">Actualizar Perfil</a>
                @elseif( Auth::user()->type == 3 )
                    <a class="fre-btn freo-btn primary-bg-color" href="{{ url('/consultants') }}">Busca un consultor</a>
                    <a class="fre-btn primary-bg-color" href="{{ url('/register/consultant') }}">Aplica como consultor</a>
                @endif
            @else
                <a class="fre-btn freo-btn primary-bg-color" href="{{ url('/consultants') }}">Busca un consultor</a>
                <a class="fre-btn primary-bg-color" href="{{ url('/register/consultant') }}">Aplica como consultor</a>
            @endif
        </div>
    </div>
</div>

<div class="fre-how-work">
    <div class="container">
        <h2 id="title_work">¿Cómo funciona Consultaneo?</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row mw-500">
                    <div class="col-lg-6 col-sm-6 borde1">
                        <div class="numero-1"><span>1</span>
                    </div>
                    <div class="fre-work-block">
                        <span>
                            <img src="{{ asset('/images/1.png') }}" id="img_work_1" alt="">
                        </span>
                        <p id="desc_work_1">Publica proyectos y cuentanos lo que necesitas hacer.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 borde2">
                    <div class="numero-2">
                        <span>2</span>
                    </div>
                    <div class="fre-work-block">
                        <span>
                            <img src="{{ asset('/images/2.png') }}" id="img_work_2" alt="">
                        </span>
                        <p id="desc_work_2">Busca perfiles, luego contrate a su consultor favorito para empezar su proyecto.</p>
                    </div>
                </div>
            </div>
            <div class="row mw-500 m-top-0">
                <div class="col-lg-6 col-sm-6 borde3">
                    <div class="numero-3">
                        <span>3</span>
                    </div>
                    <div class="fre-work-block">
                        <span>
                            <img src="{{ asset('/images/3.png') }}" id="img_work_3" alt="">
                        </span>
                        <p id="desc_work_3">Usa Consultaneo para chatear y compartir archivos </p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 borde4">
                    <div class="numero-4">
                        <span>4</span>
                    </div>
                    <div class="fre-work-block">
                        <span>
                            <img src="{{ asset('/images/4.png') }}" id="img_work_4" alt="">
                        </span>
                        <p id="desc_work_4">Con nuestra protección, el dinero solo se paga por el trabajo que usted autoriza.</p>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-6">
                <img class="max-w-img" src="{{ asset('/images/register_laptop.png') }}" id="img_work_1" alt="">
            </div>
        </div>
    </div>
</div>

<div class="fre-perfect-freelancer">
    <div class="container">
        <h2 id="title_freelance">Encuentra al consultor perfecto para tu proyecto</h2>
        <div class="">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($consuls as $chunk)
                        <div class="carousel-item">
                            <div class="row justify-content-center">
                                @foreach($chunk as $consultant)
                                    <div class="col-sm-12 col-md-4 col-lg-4 p-t-10">
                                        <div class="fre-freelancer-wrap-l text-center">
                                            <img alt="" src="{{ count($consultant->files) > 0 ? $consultant->files[0]->path : '' }}" class="avatar avatar-70 photo avatar-default card-profile-photo lazyload-loaded" height="70" width="70">
                                            <h2 class="text-center">
                                                <a href="#">{{ $consultant->name }}</a>
                                            </h2>
                                            <p class="secondary-color text-center">{{ $consultant->json_title ?? 'sin asignar' }}</p>
                                            <div class="free-rating rate-it text-center" data-score="" title="Not rated yet!">
                                                <i data-alt="1" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                                <i data-alt="2" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                                <i data-alt="3" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                                <i data-alt="4" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                                <i data-alt="5" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>
                                                <input name="score" type="hidden" readonly="">
                                            </div>
                                            <div class="free-experience-l">
                                                <span>{{ $consultant->years_experience ? $consultant->years_experience . ' Años de exp' : 'sin asignar' }}</span>
                                                <span>{{ $consultant->cant_projects ? $consultant->cant_projects . ' Proyectos' : 'sin asignar' }}</span>
                                            </div>
                                            <div class="free-hourly-rate-l text-center">
                                                <span>{{ $consultant->hourly_rate ? '$'.$consultant->hourly_rate . '/hr' : 'sin asignar' }}</span>
                                            </div>
                                            <div class="free-skill-l"></div>
                                            <a class="fre-btn primary-bg-color" href="{{ url('/consultants/'.$consultant->username) }}">Ver perfil</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="color: #2e2e2e"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="color: #2e2e2e"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="fre-perfect-freelancer-morex" style="margin-right: 0;">
            <a class="btn-pq" href="{{ url('/consultants') }}">Ver todos los consultores</a>
        </div>
    </div>
</div>

<div class="fre-categorias">
    <div class="container">
        <h1 id="title_work" align="center">Recibe consultoría en estas especialidades</h1>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 cons-categ">
                <div class="card borderless mb-3">
                    <div class="cuadro" id="dedito">
                        <img src="{{ asset('/images/specialities/dedito.png') }}" id="img_asset_estrategiadigital" alt="">
                        <h5 class="titulo_servicio">Estrategia &amp;<br> Gestión</h5>
                        <i class="fa fa-chevron-right pr-4 d-md-none d-lg-none"></i>
                    </div>
                    
                    <div class="howto-description mt-2 dedito">
                        <ul>
                            <li>Plan de negocios</li>
                            <li>Operaciones</li>
                            <li>Productividad</li>
                            <li>Procesos y otros</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 cons-categ">
                <div class="card borderless mb-3">
                    <div class="cuadro" id="marketing">
                        <img src="{{ asset('/images/specialities/marketing.png') }}" id="img_asset_marketing" alt="">
                        <h5 class="titulo_servicio">Marketing &amp;<br> Ventas</h5>
                        <i class="fa fa-chevron-right pr-4 d-md-none d-lg-none"></i>
                    </div>
                    
                    <div class="howto-description mt-2 marketing">
                        <ul>
                            <li>Branding</li>
                            <li>Investigación de mercado</li>
                            <li>Estrategia de marketing</li>
                            <li>UX y otros</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 cons-categ">
                <div class="card borderless mb-3">
                    <div class="cuadro" id="trans-digi">
                        <img src="{{ asset('/images/specialities/trans-digi.png') }}" id="img_asset_datascience" alt="">
                        <h5 class="titulo_servicio">Transformación<br> Digital e Innovación</h5>
                        <i class="fa fa-chevron-right pr-4 d-md-none d-lg-none"></i>
                    </div>
                    
                    <div class="howto-description mt-2 trans-digi">
                        <ul>
                            <li>Cambio organizacional</li>
                            <li>Cultura digital</li>
                            <li>Gestión de la innovación</li>
                            <li>Estratégia digital y otros</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 cons-categ">
                <div class="card borderless mb-3">
                    <div class="cuadro" id="webdata">
                        <img src="{{ asset('/images/specialities/webdata1.png') }}" id="img_asset_producto" alt="">
                        <h5 class="titulo_servicio">Web &amp;<br> Data Science</h5>
                        <i class="fa fa-chevron-right pr-4 d-md-none d-lg-none"></i>
                    </div>
                    
                    <div class="howto-description mt-2 webdata">
                        <ul>
                            <li>Big data</li>
                            <li>Plataformas digitales</li>
                            <li>E commerce</li>
                            <li>Cloud computing y otros</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 cons-categ">
                <div class="card borderless mb-3">
                    <div class="cuadro" id="robotica">
                        <img src="{{ asset('/images/specialities/robotica.png') }}" id="img_asset_cseguridad" alt="">
                        <h5 class="titulo_servicio">Automatización<br> &amp; Robótica</h5>
                        <i class="fa fa-chevron-right pr-4 d-md-none d-lg-none"></i>
                    </div>
                    
                    <div class="howto-description mt-2 robotica">
                        <ul>
                            <li>Ingeniería de procesos</li>
                            <li>Automatización y control industrial</li>
                            <li>Operaciones y otros</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 cons-categ">
                <div class="card borderless mb-3">
                    <div class="cuadro" id="cloud">
                        <img src="{{ asset('/images/specialities/cloud.png') }}" id="img_asset_automatizacion" alt="">
                        <h5 class="titulo_servicio">Contabilidad &amp;<br> Finanzas</h5>
                        <i class="fa fa-chevron-right pr-4 d-md-none d-lg-none"></i>
                    </div>
                    
                    <div class="howto-description mt-2 cloud">
                        <ul>
                            <li>Administración de empresas</li>
                            <li>Impuestos internos</li>
                            <li>Contabilidad y finanzas</li>
                            <li>Rentabilidad y otros</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 cons-categ">
                <div class="card borderless mb-3">
                    <div class="cuadro" id="rrhh">
                        <img src="{{ asset('/images/specialities/rrhh.png') }}" id="img_asset_finanzas" alt="">
                        <h5 class="titulo_servicio">Recursos<br> Humanos</h5>
                        <i class="fa fa-chevron-right pr-4 d-md-none d-lg-none"></i>
                    </div>
                    
                    <div class="howto-description mt-2 rrhh">
                        <ul>
                            <li>Estructura de empresas</li>
                            <li>Estructura organizacional</li>
                            <li>Cambio organizacional</li>
                            <li>Reclutamiento y otros</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 cons-categ">
                <div class="card borderless mb-3">
                    <div class="cuadro" id="legal">
                        <img src="{{ asset('/images/specialities/legal.png') }}" id="img_asset_gestion" alt="">
                        <h5 class="titulo_servicio">Seguridad &amp;<br> Legal</h5>
                        <i class="fa fa-chevron-right pr-4 d-md-none d-lg-none"></i>
                    </div>
                    
                    <div class="howto-description mt-2 legal">
                        <ul>
                            <li>Contrato</li>
                            <li>Derecho informático</li>
                            <li>Propiedad intelectual</li>
                            <li>Ciber seguridad y otros</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fre-jobs-online-more">
        <a class="fre-btn primary-bg-color" href="{{ url('/register/client') }}">Quiero recibir consultoría</a>
    </div>	
</div>

    <div class="fre-jobs-online">
        <div class="container">
            <h2 id="title_project">Estos son algunos de nuestros proyectos en línea</h2>
            <div class="row d-flex justify-content-center">
                <ul class="fre-jobs-list col-md-6">
                    <li>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="jobs-title">
                                    <p>NECESITO ASESORIA</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-12">
                                    <img src="{{ asset('/images/aseet.png') }}" id="img_work_1" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row p-t-0">
                            <div class="col-md-7 p-top-10px">
                                <div class="jobs-name">quazyxc</div>
                                <div class="jobs-date">
                                    <p>13 enero 2020</p>
                                </div>
                                <div class="jobs-price">
                                    <p>$10,000.00</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="project-detail-skill">
                                    <h4></h4>
                                    <a class="fre-label secondary-color " href="#">Automatización y control industrial</a>                
                                </div>
                            </div>
                        </div>
                        <div class="jobs-view">
                            <a class="btn-proy" href="#">Ver detalles</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="fre-jobs-online-more">
                <a class="fre-btn primary-bg-color" href="#">Ver todos los desafios</a>
            </div>	
        </div>
    </div>

    <div class="fre-our-clients">
        <div class="container">
            <h2 id="title-project" class="titulo-seccion-cliente"> Marcas que confiaron en nuestros consultores<hr></h2>
            <div class="row justify-content-center">
                <div class="col-md-2"><img src="{{ asset('/images/logo0.png') }}" id="img_work_1" alt=""></div>
                <div class="col-md-2"><img src="{{ asset('/images/logo1.png') }}" id="img_work_1" alt=""></div>
                <div class="col-md-2"><img src="{{ asset('/images/logo3.png') }}" id="img_work_1" alt=""></div>
                <div class="col-md-2"><img src="{{ asset('/images/logo4.png') }}" id="img_work_1" alt=""></div>
                <div class="col-md-2"><img src="{{ asset('/images/logo5.png') }}" id="img_work_1" alt=""></div>
                <div class="col-md-2"><img src="{{ asset('/images/logo6.png') }}" id="img_work_1" alt=""></div>
            </div>
        </div>
    </div>

    <div class="fre-service">
        <div class="container relative">
            <h2 id="title_service">Tenemos un plan a tu medida</h2>
            <div class="fre-service-content">
                <div class="row">
                    <div class="col-md-1 hidden-sm"></div>
                    <div class="col-md-10">
                        <div class="row fre-service-package-list">
                            <div class="col-sm-12 col-md-4 col-lg-4 col-sm-6">
                                <div class="fre-service-pricing">
                                    <div class="service-info">
                                        <h3>Básico</h3>
                                    </div>
                                    <div class="service-price">
                                        <p>por 15 días</p>
                                        <h2>GRATIS</h2>
                                        <p>Publica 3 Proyectos por mes 6 al año máx. Cada publicación se muestra por 15 días.</p>
                                    </div>
                                    <a class="fre-btn  primary-bg-color" href="#">Registrarse</a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-sm-6">
                                <div class="fre-service-pricing">
                                    <div class="service-info">
                                        <h3>Premium</h3>
                                    </div>
                                    <div class="service-price">
                                        <h2>$9<sup></sup></h2>
                                        <p>Publica 5 proyectos por mes / 30 al año máx.&nbsp;Publicación se muestra por 30 días.</p>
                                    </div>
                                    <a class="fre-btn  primary-bg-color" href="#">Registrarse</a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-sm-6">
                                <div class="fre-service-pricing">
                                    <div class="service-info">
                                        <h3>Ultra</h3>
                                    </div>
                                    <div class="service-price">
                                        <p> Por 60 días</p>
                                        <h2>$29<sup></sup></h2>
                                        <p>Publica proyectos&nbsp; sin límites.&nbsp;Cada publicación se muestra por 60 días.</p>
                                    </div>
                                    <p></p>
                                    <a class="fre-btn  primary-bg-color" href="#">Registrarse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 hidden-sm"></div>
                </div>
            </div>
            
            @if((auth()->check() && !auth()->user()->isConsultor()) || !auth()->check()) 
                <div class="publishing_bid_popup" id="closable-publishing_popup">
                    <div class="publishing_overlay">
                        <div class="fake_img">
                            <b>OFERTA</b>
                        </div>
                        
                        <div class="publishing-close_button">
                            <i class="fa fa-close"></i>
                        </div>

                        <span class="custom-publishing_text text-center">
                            Publica tu proyecto <br>
                            {{-- <b>gratis</b> por {{ $premium_offer }} días --}}
                        </span>

                        <button class="fre-btn mt-2 custom-publishing_button" style="border-radius: 12px;">Publicar ahora</button>

                    </div>
                    <div class="blured_container"></div>
                </div>
            @endif
        </div>
    </div>
   

    <div class="fre-categorias mb-2">
        <div class="container">
            <h2 align="center" id="title_work">Preguntas Frecuentes (FAQ)</h2>
            <br>
            <div class="accordion p-4" id="accordionExample">
                <div class="card">
                    <div class="card-header" style="padding: unset;" id="headingOne">
                        <h2 class="mb-0">
                            <button style="color: unset;" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ¿Cómo llegan a mi los clientes ?
                            </button>
                        </h2>
                    </div>
                
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            Consultaneo realiza un enorme esfuerzo de marketing, ventas y relaciones públicas para entrar en contactos con emprendedores y empresas que requieren servicios de asesoría y ejecución de proyectos de toda índole. Cuando alguna de esas necesidades coincide con tu especialidad y tus habilidades los ponemos en contacto contigo. 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" style="padding: unset;" id="headingTwo">
                        <h2 class="mb-0">
                            <button style="color: unset;" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ¿Cómo cobro y que tipo de comisión debo pagar?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            Consultaneo ofrece a los clientes  una gran variedad de opciones de pago. Estos depositan por anticipado el monto correspondiente al hito o fase del proyecto por desarrollar. Una vez que entregas tu trabajo el cliente libera el pago, el cual llega a tu cartera en nuestra plataforma.
                            De dicho pago Consultaneo retiene comisiones que van desde un 10% hasta un 20% según el plan que elijas.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" style="padding: unset;" id="headingThree">
                        <h2 class="mb-0">
                            <button style="color: unset;" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                ¿Cuánto tiempo debo dedicarle a esto?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            La consultoría en línea te brinda mucha flexibilidad de horarios y gran  movilidad.   Cómo todo en la vida.  mientras más tiempo y energía te dediques  a buscar proyectos en la plataforma para ofertar sus servicios mayor será la recompensa.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" style="padding: unset;" id="headingFour">
                        <h2 class="mb-0">
                            <button style="color: unset;" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                ¿Qué pasa si el cliente no desea pagar por mis servicios?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                            Cada contrato de consultoría se debe dividir en hitos o entregables, el cliente irá depositando por adelantado el monto convenido para cada uno de ellos. Una vez que has cumplido con un hito y el cliente está conforme nos autoriza a depositar el monto convenido lo cual hacemos descontando nuestra comisión.  En caso de no esta conforme, se abre un proceso de reclamo en el que Consultaneo  interviene como mediador a fin de lograr el mejor acuerdo posible para las partes involucradas. La compensación  normalmente no baja del 50% del monto original acordado.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" style="padding: unset;" id="headingFifht">
                        <h2 class="mb-0">
                            <button style="color: unset;" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFifht" aria-expanded="false" aria-controls="collapseFifht">
                                ¿Tienes más preguntas?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFifht" class="collapse" aria-labelledby="headingFifht" data-parent="#accordionExample">
                        <div class="card-body">
                            Contacta con nuestro equipo
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fre-get-started mt-2">
        <div class="container">
            <div class="get-started-content">
                <h2 id="title_start">Necesitas ayuda con tu proyecto? Te asesoramos y hasta lo hacemos por ti.</h2>
                <a class="fre-btn primary-bg-color" href="{{ url('/register/client') }}">Empezar ahora!</a>
            </div>
        </div>
    </div>
@endsection
