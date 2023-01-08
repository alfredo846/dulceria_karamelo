<!--NAVBAR-->
        <header id="navbar" style="position:fixed">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <div class="navbar-header">
                    <a href="{{ route('bienvenido') }}" class="navbar-brand">
                       <img src="{{ asset('assets\img\logo2.png') }}" alt="Dulcería Karamelo" height="58" width="230">
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
                                    <img class="img-circle img-sm" src="{{ asset('assets\img\profile-photos\1.png') }}" alt="Profile Picture">
                                    <small>Alfredo Heraz Pérez</small>
                                    <i class="ion-arrow-down-b"></i>
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                <ul class="head-list">
                                    <li>
                                        <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i>Mí perfil</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="demo-pli-computer-secure icon-lg icon-fw"></i> Cambiar Foto</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="demo-pli-gear icon-lg icon-fw"></i> Cambiar contraseña</a>
                                    </li>
                                    <li>
                                        <a href="pages-login.html"><i class="demo-pli-unlock icon-lg icon-fw"></i> Cerrar sesión</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--End user dropdown-->
 
                    </ul>
                </div>
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--END NAVBAR-->