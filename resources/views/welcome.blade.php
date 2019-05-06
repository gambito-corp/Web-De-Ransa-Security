@extends('layouts.app')

@section('contenido')
<section class="row animated fadeInUpBig slower">
    <div class="col-md-12 hero-image">
        <div class="hero-text">
            <h2 class="ransa">Ransa Security</h2>
            <h3>Nuestra Seguridad Viene de Lejos</h3>
            <a data-ancla="contacto" class="tcb-basic-d tcb-primary ancla">Con&oacute;cenos</a>
        </div>
    </div>
</section>
<br>
<div class="row faders animated lightSpeedOut slow">
    <div class="col-md-12 tc-heading-style5 tc-heading-center">
        <h2 class="text-uppercase heading-inner">Nuestra Metodologia</h2>
        <br>
        <small class="text-muted h3"></small>
    </div>
</div>
<br>
<section class="sec-spacer animated">

    <div class="container">
        <div class="row tc-services-style4">
            <div class="col-md-3 col-sm-6 animated bouncers delay-1s">
                <div class="services-item">
                    <div class="services-icon">
                        <i class="fa fa-handshake-o"></i>
                    </div>
                    <div class="services-desc">
                        <h2 class="services-title">Conocenos</h2>
                        <p>Agendamos una Primera reunion donde presentamos al equipo de trabajo el cual recibira los lineamientos requeridos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 animated bouncers delay-2s">
                <div class="services-item">
                    <div class="services-icon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <div class="services-desc">
                        <h2 class="services-title">Recolectamos Informacion</h2>
                        <p>Se recolecta Informacion Sobre las vulnerabilidades de la institucion.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 animated bouncers delay-3s">
                <div class="services-item">
                    <div class="services-icon">
                        <i class="fa fa-check-square-o"></i>
                    </div>
                    <div class="services-desc">
                        <h2 class="services-title">Implementacion del plan</h2>
                        <p>se desarrolla un plan de seguridad personalizado a la medida del cliente. </p><br>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 animated bouncers delay-4s">
                <div class="services-item">
                    <div class="services-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="services-desc">
                        <h2 class="services-title">Inicio del trabajo</h2>
                        <p>disponemos a nuestro personal en los puntos criticos identificados asi como en puntos estrategicos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="blue animated faders2 slower">
    <br>
    <div class="container-fluid blue" id="nosotros">
        <div class="row">
            <div class="col-md-5">
                <h3 class="title">Nosotros</h3>
            </div>
            <div class="col-md-7">
                <div class="tc-tabs-style5">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" >
                            <a class="nav-link" data-toggle="tab" href="#tab1" role="tab" aria-controls="nosotros" aria-selected="true">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="mision" aria-selected="false">Mision</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-controls="vision" aria-selected="false">Vision</a>
                        </li>
                    </ul>
                    <div class="tab-content" >
                        <div id="tab1" class="tab-pane fade active show" role="tabpanel" aria-labelledby="nosotros-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{asset('img/nosotros.jpg')}}" alt="Imagen de Nosotros " width="225" height="129">
                                </div>
                                <div class="col-md-8">
                                    <h3 class="tc-tab-title color-negro">¿Quienes Somos?</h3>
                                    <p class="tc-tab-desc">Somos una Empresa de nueva generacion con personal comprometido y experto, capaz de desempe&ntilde;ar las funciones encomendadas para apoyo de nuestros clientes y de nuestra sociedad. Responsable, comprometida, puntual y honesta.</p>
                                </div>
                            </div>
                        </div>
                        <div id="tab2" class="tab-pane fade" role="tabpanel" aria-labelledby="mision-tab">
                            <div class="row">
                                <div class="col-md-8 text-right">
                                    <h3 class="tc-tab-title">Nuestro Objetivo</h3>
                                    <p class="tc-tab-desc">Brindar servicios inmediatos y eficientes en Seguridad garantizada a cabalidad la seguridad fisica y emocional de nuestros clientes.</p>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{asset('img/mision.jpg')}}" alt="Imagen de Nosotros " width="225" height="129">
                                </div>
                            </div>
                        </div>
                        <div id="tab3" class="tab-pane fade" role="tabpanel" aria-labelledby="vision-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{asset('img/vision.jpg')}}" alt="Imagen de Nosotros " width="225" height="129">
                                </div>
                                <div class="col-md-8">
                                    <h3 class="tc-tab-title">Nuestro Fin</h3>
                                    <p class="tc-tab-desc">Ser lideres en la presentacion de servicios de Seguridad Personal yCorporativa en el mercado peruano ofreciendo para ello tecnologia de punta, personal altamente calificado y procedimientos tecnicos reglamentados.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
<br>
<!-- Flipbox Services Style2 Effect Start -->
<section class="sec-spacer" id="servicios">
    <div class="container-fluid container-center">
        <div class="row">
            <div class="col-md-12 tc-heading-style5 tc-heading-center animated fadersServicio">
                <h2 class="text-uppercase heading-inner">Servicios</h2>
                <br>
                <small class="text-muted h3">Nuestras areas de trabajo</small>
            </div>
        </div>
        <br>
        <div class="row tc-services-style2">
            <div class="col-md-3 animated bouncers2 delay-1s">
                <div class="tc-flipbox-wrap">
                    <div class="horizontal-flip-left">
                        <div class="front-part">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fa fa-lightbulb-o"></i>
                                </div>
                                <div class="services-desc">
                                    <h2 class="services-title">Proteccion a instalaciones y patrimonio</h2>
                                    <p>vigilancia y zonificacion de areas restringidas por calificacion de riesgo. control de ingreso y salida de personas, objetos, mercaderia, correspondencia, vigilancia perimetral, prevencion y control de perdida, sistemas de supervision interna y externa, control permanente las 24 horas</p>

                                </div>
                            </div>
                        </div>
                        <div class="back-part">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fa fa-gear"></i>
                                </div>
                                <div class="services-desc">
                                    <h2 class="services-title">Proteccion a instalaciones y patrimonio</h2>
                                    <p>vigilancia y zonificacion de areas restringidas por calificacion de riesgo. control de ingreso y salida de personas, objetos, mercaderia, correspondencia, vigilancia perimetral, prevencion y control de perdida, sistemas de supervision interna y externa, control permanente las 24 horas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 animated bouncers2 delay-2s">
                <div class="tc-flipbox-wrap">
                    <div class="horizontal-flip-left">
                        <div class="front-part">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fa fa-tablet"></i>
                                </div>
                                <div class="services-desc">
                                    <h2 class="services-title">Protreccion de Ejecutivos</h2>
                                    <br><br>
                                    <p>contamos con el servicio de proteccion a funcionarios y personalidades, llevado a cabo por personal altamente calificado y extrictamente seleccionado. Asi como servicios especiales de escoltas y equipos de reaccion rapida en caso se intento de secuestro o atentado contra la vida.</p>
                                </div>
                            </div>
                        </div>
                        <div class="back-part">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fa fa-support"></i>
                                </div>
                                <div class="services-desc">
                                    <h2 class="services-title">Protreccion de Ejecutivos</h2>
                                    <br><br>
                                    <p>contamos con el servicio de proteccion a funcionarios y personalidades, llevado a cabo por personal altamente calificado y extrictamente seleccionado. Asi como servicios especiales de escoltas y equipos de reaccion rapida en caso se intento de secuestro o atentado contra la vida.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 animated bouncers2 delay-3s">
                <div class="tc-flipbox-wrap">
                    <div class="horizontal-flip-left">
                        <div class="front-part">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fa fa-lightbulb-o"></i>
                                </div>
                                <div class="services-desc">
                                    <h2 class="services-title">Supervisores residentes</h2>
                                    <br>
                                    <br>
                                    <p>Profesionales especializados en seguridad y control, que permanecen en las instalaciones del cliente para conducir el servicio y solucionar cualquier inconveniente que se presente.</p>
                                    <br><br><br>
                                </div>
                            </div>
                        </div>
                        <div class="back-part">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fa fa-gear"></i>
                                </div>
                                <div class="services-desc">
                                    <h2 class="services-title">Supervisores residentes</h2>
                                    <br>
                                    <br>
                                    <p>Profesionales especializados en seguridad y control, que permanecen en las instalaciones del cliente para conducir el servicio y solucionar cualquier inconveniente que se presente.</p>
                                    <br><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 animated bouncers2 delay-4s">
                <div class="tc-flipbox-wrap">
                    <div class="horizontal-flip-left">
                        <div class="front-part">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fa fa-tablet"></i>
                                </div>
                                <div class="services-desc">
                                    <h2 class="services-title">Supervisores de ronda</h2>
                                    <br><br>
                                    <p>Expertos profesionales en el seguimiento y optimizacion de los servicios. <br>
                                        Instruye, capacita, corrige y controla en forma permanente al personal que presta servicio dentro de la zona de su responsabilidad.</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="back-part">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fa fa-support"></i>
                                </div>
                                <div class="services-desc">
                                    <h2 class="services-title">Supervisores de ronda</h2>
                                    <br><br>
                                    <p>Expertos profesionales en el seguimiento y optimizacion de los servicios. <br>
                                        Instruye, capacita, corrige y controla en forma permanente al personal que presta servicio dentro de la zona de su responsabilidad.</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Flipbox Services Style2 Effect End -->

<div class="blue container-fluid animated opinionFade">

    <div class="row">
        <div class="col-md-12 tc-heading-style5 tc-heading-center">
            <h2 class="text-uppercase heading-inner">Opiniones</h2>
            <br>
            <small class="text-muted h3">Nuestros Clientes Opinan</small>
        </div>
    </div>
    <!-- Testimonial Style5 Start -->

    <div class="row color-blanco">
        @forelse($testimonios as $tes)
        <div class="col-md-6 col-sm-6">
            <div class="tc-testimonial-style5">
                <div class="testi-desc">
                    <p>
                        {{$tes->descripcion}}
                    </p>
                </div>
                <div class="testi-photo">
                    <img src="{{Route('testimonio.imagen', ['filename'=>$tes->imagen])}}" alt="Jhon Smith" width="80" height="80">
                </div>
                <div class="testi-info">
                    <span class="name">{{$tes->nombre}}</span>
                    <div class="position">
                        <span class="meta">{{$tes->cargo}}</span> - <a href="{{$tes->url_empresa}}" target="blank">{{$tes->empresa}}</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-6 col-sm-6">
            <div class="tc-testimonial-style5">
                <div class="testi-desc">
                    <p>
                        "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco."
                    </p>
                </div>
                <div            class="testi-photo">
                    <img                src="{{asset('img/1.jpg')}}" alt="Jhon Smith">
                </div>
                <div class="testi-info">
                    <span class="name">Tarek Hasan</span>
                    <div class="position">
                        <span class="meta">CEO</span> - <a href="#">developerzone.net</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="tc-testimonial-style5">
                <div class="testi-desc">
                    <p>
                        "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco."
                    </p>
                </div>
                <div class="testi-photo">
                    <img src="{{asset('img/2.jpg')}}" alt="Jhon Smith">
                </div>
                <div class="testi-info">
                    <span class="name">Atik Hasan</span>
                    <div class="position">
                        <span class="meta">CEO</span> - <a href="#">developerzone.com</a>
                    </div>
                </div>
            </div>
        </div>
        @endforelse

    </div>
    <!-- Testimonial Style5 End -->
    <br>
</div>

<br>
<section class="sec-spacer sec-color" id="contacto">
    <div class="container container-center tc-heading-style5 tc-heading-center">
        <h2 class="text-uppercase heading-inner">Contactanos</h2>
        <br>
        <small class="text-muted h3">Ya nos Conoces ahora Trabajemos!!</small>
        <br>
        <br>
        @if(session('message'))
        <div class="alert alert-{{session('status')}}">
            {{session('message')}}
        </div>
        @endif
        <br>
        <form class="tc-form-style3" method="POST" action="{{route('contacto.guardar')}}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-field">
                        <input name="nombre" type="text" placeholder="Tu Nombre" required>
                    </div>
                    <div class="form-field">
                        <input name="email" type="email" placeholder="Email" required>
                    </div>
                    <div class="form-field">
                        <input name="asunto" type="text" placeholder="Asunto">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-field">
                        <textarea name="mensaje" placeholder="Dejanos un mensaje" rows="7"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-button">
                <button type="submit" class="enviosi">Enviar</button>
            </div>
        </form>
    </div>
</section>


@endsection
