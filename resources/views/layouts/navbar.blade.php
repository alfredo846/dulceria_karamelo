<!--NAVBAR-->
<header id="navbar" style="position:fixed">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <div class="navbar-header">
            <a href="{{ route('bienvenido') }}" class="navbar-brand">
                {{-- <img src="{{ asset('assets\img\logo2.png') }}" alt="Dulcería Karamelo" height="58" width="230"> --}}
            </a>
        </div>
        <!--End brand logo & name-->

        <!--Navbar Dropdown-->
        <div class="navbar-content">
            <ul class="nav navbar-top-links">

                <!--Navigation toogle button-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="demo-pli-list-view"></i>
                    </a>
                </li>
                <!--End Navigation toogle button-->

            </ul>
            <ul class="nav navbar-top-links">

                <!--User dropdown-->
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="ic-user pull-right menu-title">
                            <img class="img-circle img-sm" src="{{ asset('imagenes/usuarios/' . Auth::user()->foto) }}"
                                alt="Profile Picture">

                            <small> {{ Auth::user()->username }}</small>
                            <i class="fa fa-caret-right"></i>
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                        <ul class="head-list">
                            <li>
                                <a href="{{ route('perfil') }}"><i class="demo-pli-male icon-lg icon-fw"></i>Mí perfil</a>
                            </li>
                            <li>
                                <button type="button" class="btn d-block btn-light w-100" data-toggle="modal" data-target="#editPhoto">
                                    <i class="demo-pli-computer-secure icon-lg icon-fw"></i> Cambiar foto
                                </button>
                                
                            </li>
                            <li>
                                <button type="button" class="btn d-block btn-light w-100" data-toggle="modal" data-target="#editPassword">
                                    <i class="demo-pli-gear icon-lg icon-fw"></i> Cambiar contraseña
                                </button>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="demo-pli-unlock icon-lg icon-fw"></i>
                                    Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--End user dropdown-->

            </ul>
        </div>
        <!--End Navbar Dropdown-->

    </div>
    @include('layouts.partials.change-password')
    @include('layouts.partials.change-image')
</header>
<!--END NAVBAR-->

