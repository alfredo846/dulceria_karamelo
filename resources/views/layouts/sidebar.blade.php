<!--Menu-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content"><br>

                                <ul id="mainnav-menu" class="list-group">

									<!--Menu list item-->
						            <li>
						                <a href="{{ route('bienvenido') }}">
						                    <i class="demo-pli-home"></i>
						                    <span class="menu-title text-bold text-semibold">
												Inicio
											</span>
						                </a>
						            </li>
						
									<li class="list-divider"></li>

						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="demo-pli-split-vertical-2"></i>
						                    <span class="menu-title text-bold text-semibold">Catálogos</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse text-semibold">
											<li><a href="{{ route('categorias.index') }}">Categorías</a></li>
						                    <li><a href="{{ route('marcas.index') }}">Marcas</a></li>
											<li><a href="{{ route('temporadas.index') }}">Temporadas</a></li>											
											<li><a href="{{ route('empaques.index') }}">Empaques</a></li>
						                </ul>
						            </li>

									<li class="list-divider"></li>
									
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="demo-pli-split-vertical-2"></i>
						                    <span class="menu-title text-bold">Productos</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse text-semibold">
						                    <li><a href="{{ route('productos.index') }}">Productos</a></li>	
						                </ul>
						            </li>
									<li class="list-divider"></li>

									  <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="demo-pli-split-vertical-2"></i>
						                    <span class="menu-title text-bold">Sucursales</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse text-semibold">
						                    <li><a href="{{ route('sucursales.index') }}">Sucursales</a></li>	
						                </ul>
						            </li>
									<li class="list-divider"></li>
                                </ul>
						          
                            </div>
                        </div>
                    </div>
                    <!--End menu-->