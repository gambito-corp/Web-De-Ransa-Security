<nav class="navbar navbar-expand-lg navbar-light navbar-laravel tc-link-effect5 text-center" id="menu">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('inicio')}}">
            <img src="{{asset('img/logo.png')}}" alt="Logo de {{ config('app.name', 'Laravel') }}" class="logo-nav">
            <strong class="ransa">{{ config('app.name', 'Laravel') }}</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('inicio')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    @if(isset($ancla))
                    <a class="nav-link ancla"  data-ancla="nosotros">Nosotros</a>
                    @else
                    <a class="nav-link"   href="{{route('inicio')}}#Nosotros">Nosotros</a>
                    @endif
                </li>
                <li class="nav-item">
                    @if(isset($ancla))
                    <a class="nav-link ancla"  data-ancla="servicios">Servicios</a>
                    @else
                    <a class="nav-link"   href="{{route('inicio')}}#Servicios">Servicios</a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('galeria.index')}}">Galeria</a>
                </li>
                <li class="nav-item">
                    @if(isset($ancla))
                    <a class="nav-link ancla" data-ancla="contacto">Contactanos</a>
                    @else
                    <a class="nav-link"  href="{{route('inicio')}}#Contactanos">Contactanos</a>
                    @endif
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest

                @else
                @if(Auth::user() && (Auth::user()->role == 'Administrador' || Auth::user()->role == 'SuperAdmin'|| Auth::user()->role == 'Personal'))
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Incidencias <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if(Auth::user() && (Auth::user()->role == 'Administrador' || Auth::user()->role == 'SuperAdmin'))
                        <a class="dropdown-item" href="{{ route('incidencia.gestion') }}">
                            Gestionar Incidencias
                        </a>
                        @endif
                        @if(Auth::user() && (Auth::user()->role == 'Personal' || Auth::user()->role == 'SuperAdmin'))
                        <a class="dropdown-item" href="{{ route('incidencia.crear') }}">
                            Crear Nueva incidencia
                        </a>
                        @endif
                    </div>
                </li>
                @endif
                @if(Auth::user() && (Auth::user()->role == 'Administrador' || Auth::user()->role == 'SuperAdmin' || Auth::user()->role == 'Cliente'))
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Clientes <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if(Auth::user() && (Auth::user()->role == 'Administrador' || Auth::user()->role == 'SuperAdmin'))
                        <a class="dropdown-item" href="{{ route('cliente.gestion') }}">
                            Gestionar clientes
                        </a>

                        <a class="dropdown-item" href="{{ route('cliente.crear') }}">
                            Crear Nuevo Cliente
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('contacto.gestion') }}">
                            Gestionar contactos
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('testimonio.gestion') }}">
                            Gestionar Testimonios
                        </a>
                        @elseif(Auth::user() && (Auth::user()->role == 'Cliente' || Auth::user()->role == 'SuperAdmin'))
                        <a class="dropdown-item" href="{{ route('testimonio.crear') }}">
                            Escribir Testimonio
                        </a>
                        @endif
                    </div>
                </li>
                @endif
                @if(Auth::user() && (Auth::user()->role == 'Administrador' || Auth::user()->role == 'SuperAdmin'))
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Categorias <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('categoria.gestion') }}">
                            Gestionar Categorias
                        </a>

                        <a class="dropdown-item" href="{{ route('categoria.crear') }}">
                            Crear Nueva Categoria
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Imagenes <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('galeria.gestion') }}">
                            Gestionar Imagenes
                        </a>

                        <a class="dropdown-item" href="{{ route('galeria.crear') }}">
                            Crear Nueva Imagen
                        </a>
                    </div>
                </li>
                @endif
                @if(Auth::user()->imagen)
                <li class="nav-item">

                    <div class="circulo">
                        <img src="{{Route('user.imagen', ['filename'=>Auth::user()->imagen])}}" alt="" class="avatar-nav irounded-circle"/>
                    </div>

                </li>
                @endif
                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if(Auth::user() && (Auth::user()->role == 'Administrador' || Auth::user()->role == 'SuperAdmin'))
                        <a class="dropdown-item" href="{{ route('usuarios.gestion') }}">
                            Gestion de Usuarios
                        </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('usuarios.config') }}">
                            Editar mi perfil de usuario
                        </a>
                        <a class="dropdown-item" href="{{ route('usuarios.password') }}">
                            Cambiar Contraseña de Usuario
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>