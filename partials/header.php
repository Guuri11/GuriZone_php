<!--NAVBAR-->
<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                    <form action="index.php" method="get" class="site-block-top-search">
                        <input type="hidden" name="page" value="tienda">
                        <button type="submit" class="icon icon-search mr-5 bg-white"></button>
                        <input type="text" class="form-control border-0" name="search" placeholder="Search">
                    </form>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div >
                        <a href="<?php global $route; echo $route->generateURL('Producto','index')?>" class=""><img class="img-fluid gurilogo" src="<?php echo $rutaFotoLogo?>" width="45%"></a>
                    </div>
                </div>
                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>
                            <?php global $cookieValue;if($cookieValue === "anonimo"){ // SI EL USER ES ANONIMO: OPCION REGISTRARSE?>
                            <li><a href="#registrarse"><span class="icon icon-person_add "></span> REGISTRARSE</a>
                            <li><a href="<?php echo $route->generateURL('Usuario','login')?>"><span class="icon icon-sign-in"></span> INICIAR SESIÓN</a></li>
                            <?php }elseif($cookieValue === "usuario"){ // SI EL USUARIO ES NORMAL: OPCION PERFIL Y LOGOUT?>
                                <li><a href="<?php echo $route->generateURL('Usuario','logout')?>"><span class="icon icon-sign-out"></span> CERRAR SESIÓN</a></li>
                                <li><a href="<?php echo $route->generateURL('Usuario','perfil')?>"><span class="icon icon-home"></span> MI PERFIL</a></li>
                            <?php }elseif($cookieValue === "admin"){     // SI EL USUARIO ES ADMIN: OPCION DASHBOARD Y LOGOUT?>
                                <li><a href="<?php echo $route->generateURL('Usuario','logout')?>"><span class="icon icon-sign-out"></span> CERRAR SESIÓN</a></li>
                                <li><a href="<?php echo $route->generateURL('Usuario','dashboard')?>"><span class="icon icon-dashboard"></span> ADMIN</a></li>
                            <?php } ?>
                            <li>
                                <a href="#" class="site-cart">
                                    <span class="icon icon-shopping_cart"></span> CARRITO
                                </a>
                            </li>
                            <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
                <li><a href="<?php echo $route->generateURL('Producto','index')?>">Inicio</a></li>
                <li class="has-children">
                    <a href="<?php echo $route->generateURL('Producto','mostrarPorCategoria',['categoria'=>"todo",'page'=>1])?>">Tienda</a>
                    <ul class="dropdown">
                        <li><a href="<?php echo $route->generateURL('Producto','mostrarPorCategoria',['categoria'=>"accesorios",'page'=>1])?>">Accesorios</a></li>
                        <li><a href="<?php echo $route->generateURL('Producto','mostrarPorCategoria',['categoria'=>"ropa",'page'=>1])?>">Ropa</a></li>
                        <li><a href="<?php echo $route->generateURL('Producto','mostrarPorCategoria',['categoria'=>"zapatillas",'page'=>1])?>">Zapatillas</a></li>
                    </ul>
                </li>
                <li><a href="#">Sobre Nosotros</a></li>
                <li><a href="<?php echo $route->generateURL('Producto','contacto')?>">Contáctanos</a></li>
            </ul>
        </div>
    </nav>
</header>
<!--FIN NAVBAR-->