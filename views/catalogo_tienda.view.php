<!DOCTYPE html>
<html lang="en">
<head>
    <title>GuriZone</title>
    <link rel="icon" href="/GuriZone/imgs/logo_draw_black.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="/GuriZone/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/GuriZone/css/bootstrap.min.css">
    <link rel="stylesheet" href="/GuriZone/css/magnific-popup.css">
    <link rel="stylesheet" href="/GuriZone/css/jquery-ui.css">
    <link rel="stylesheet" href="/GuriZone/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/GuriZone/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="/GuriZone/css/aos.css">

    <link rel="stylesheet" href="/GuriZone/css/style.css">
    <link rel="stylesheet" href="/GuriZone/css/guriZone.css">
</head>
<body>
<div class="site-wrap">
    <?php  require_once ('./partials/header.php');?>
    <!--SLIDER-->
    <div class="justify-content-center gurizone-login p-lg-2 m-lg-3 p-md-4 m-md-3 p-sm-4 m-sm-5">
        <div class="site-section">
            <div class="container">
                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                    <form action="<?php global $route;echo $route->generateURL('Producto','catalogo')?>" method="get" class="site-block-top-search">
                        <button type="submit" class="icon icon-search mr-5 bg-white"></button>
                        <input type="text" class="form-control border-0" name="search" placeholder="Search">
                    </form>
                </div>
                <div class="row mb-5">
                    <div class="col-md-9 order-2">
                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <div class="float-md-left mb-4"><h2 class="text-black h5"><?php echo ucfirst($_GET['categoria']??'todo')?></h2></div>
                            </div>
                        </div>
                        <!--PRODUCTOS-->
                        <div class="row mb-5">
                            <?php foreach ($paginacion->getProductos() as $producto){ ?>
                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="block-4 text-center border">
                                    <figure class="block-4-image">
                                        <a href="<?php echo $route->generateURL('Producto','mostrarProducto',['id'=>$producto->getIdProd()])?>"><img src=".<?php echo $producto->getFotoProd()?>" alt="Image placeholder" class="img-fluid"></a>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="?page=producto&id=<?php echo $producto->getIdProd()?>"><?php echo $producto->getModeloProd()?></a></h3>
                                        <p class="mb-0"><?php echo $producto->getMarcaProd()?></p>
                                        <p class="text-primary font-weight-bold"><?php echo $producto->getPrecioUnidad()?>€</p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!--FIN PRODUCTOS-->

                        <!--PAGINACION: Segun los filtros de busqueda utilizara un tipo de paginada u otro para la redireccion-->

                        <div class="row" data-aos="fade-up">
                            <div class="col-md-12 text-center">
                                <div class="site-block-27">
                                    <?php if (!array_key_exists('search',$_GET) && (!array_key_exists('fecha_inicial',$_GET) && !array_key_exists('fecha_final',$_GET))){?>
                                    <ul>
                                        <li><a href="<?php echo $route->generateURL('Producto','catalogo')?>?categoria=<?php echo $_GET['categoria']?>&page=<?php echo $_GET['page']<=0 ? $paginacion->getPagina()-1:'1';?>"><</a></li>
                                        <?php for ($i = 1; $i<=$paginacion->getNumPaginas();$i++){?>
                                        <li><a href="<?php echo $route->generateURL('Producto','catalogo')?>?categoria=<?php echo $_GET['categoria']?>&page=<?php echo $i?>"><span><?php echo $i ?></span></a></li>
                                        <?php } ?>
                                        <li><a href="<?php echo $route->generateURL('Producto','catalogo')?>?categoria=<?php echo $_GET['categoria']?>&page=<?php echo $paginacion->getPagina()>=$paginacion->getNumPaginas() ? '1':$paginacion->getPagina()+1;?>">&gt;</a></li>
                                    </ul>
                                    <?php }elseif(array_key_exists('fecha_inicial',$_GET) && array_key_exists('fecha_final',$_GET)){?>
                                    <ul>
                                        <li><a href="<?php echo $route->generateURL('Producto','catalogo')?>?fecha_inicial=<?php echo $paginacion->getFecha('fecha_inicial'); ?>&fecha_final=<?php echo $paginacion->getFecha('fecha_final'); ?>&page=<?php echo $_GET['page']<=0 ? $paginacion->getPagina()-1:'1';?>"><</a></li>
                                        <?php for ($i = 1; $i<=$paginacion->getNumPaginas();$i++){?>
                                            <li><a href="<?php echo $route->generateURL('Producto','catalogo')?>?fecha_inicial=<?php echo $paginacion->getFecha('fecha_inicial'); ?>&fecha_final=<?php echo $paginacion->getFecha('fecha_final'); ?>&page=<?php echo $i?>"><span><?php echo $i ?></span></a></li>
                                        <?php } ?>
                                        <li><a href="<?php echo $route->generateURL('Producto','catalogo')?>?fecha_inicial=<?php echo $paginacion->getFecha('fecha_inicial'); ?>&fecha_final=<?php echo $paginacion->getFecha('fecha_final'); ?>&page=<?php echo $paginacion->getPagina()>=$paginacion->getNumPaginas() ? '1':$paginacion->getPagina()+1;?>">&gt;</a></li>
                                    </ul>
                                    <?php }else{ ?>
                                    <ul>
                                        <li><a href="?page=tienda&search=<?php echo $paginacion->getBusqueda(); ?>&page=<?php echo $_GET['page']<=0 ? $paginacion->getPagina()-1:'1';?>"><</a></li>
                                        <?php for ($i = 1; $i<=$paginacion->getNumPaginas();$i++){?>
                                            <li><a href="?page=tienda&search=<?php echo $paginacion->getBusqueda(); ?>&page=<?php echo $i?>"><span><?php echo $i ?></span></a></li>
                                        <?php } ?>
                                        <li><a href="?page=tienda&search=<?php echo $paginacion->getBusqueda(); ?>&page=<?php echo $paginacion->getPagina()>=$paginacion->getNumPaginas() ? '1':$paginacion->getPagina()+1;?>">&gt;</a></li>
                                    </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!--FIN PAGINACION-->
                    <!--FILTRO CATEGORIA/FECHA-->
                    </div>
                    <div class="col-md-3 order-1 mb-5 mb-md-0">
                        <div class="border p-4 rounded mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Categorias</h3>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-1"><a href="<?php echo $route->generateURL('Producto','catalogo')?>?categoria=todo&page=1" class="d-flex"><span>Todo</span> <span class="text-black ml-auto"></span></a></li>
                                <li class="mb-1"><a href="<?php echo $route->generateURL('Producto','catalogo')?>?categoria=accesorios&page=1" class="d-flex"><span>Accesorios</span> <span class="text-black ml-auto"><?php echo $stockAccesorios['stock'];?></span></a></li>
                                <li class="mb-1"><a href="<?php echo $route->generateURL('Producto','catalogo')?>?categoria=ropa&page=1" class="d-flex"><span>Ropa</span> <span class="text-black ml-auto"><?php echo $stockRopa['stock'];?></span></a></li>
                                <li class="mb-1"><a href="<?php echo $route->generateURL('Producto','catalogo')?>?categoria=zapatillas&page=1" class="d-flex"><span>Zapatillas</span> <span class="text-black ml-auto"><?php echo $stockZapatillas['stock'];?></span></a></li>
                            </ul>
                        </div>
                        <div class="border p-4 rounded mb-4">
                            <div class="mb-4">
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filtrar por fecha</h3>
                                <form action="<?php echo $route->generateURL('Producto','catalogo')?>" method="get">
                                    <label for="fecha_inicial" class="d-flex text-black">Fecha Inicial</label>
                                    <input type="date" id="fecha_inicial" name="fecha_inicial" class="mr-2 mt-1 form-control">
                                    <label for="fecha_final" class="d-flex text-black">Fecha Final</label>
                                    <input type="date" id="fecha_final" class="mr-2 mt-1 form-control" name="fecha_final">
                                    <input type="hidden" name="page" value="1">
                                    <input type="submit" value="Filtrar" class="btn btn-primary mt-3">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--FIN FILTRO CATEGORIA/FECHA-->
                </div>
            </div>
        </div>
    </div>
    <!--FIN SLIDEER-->
    <?php  require_once ('./partials/footer.php');?>
</div>

<script src="/GuriZone/js/jquery-3.3.1.min.js"></script>
<script src="/GuriZone/js/jquery-ui.js"></script>
<script src="/GuriZone/js/popper.min.js"></script>
<script src="/GuriZone/js/bootstrap.min.js"></script>
<script src="/GuriZone/js/owl.carousel.min.js"></script>
<script src="/GuriZone/js/jquery.magnific-popup.min.js"></script>
<script src="/GuriZone/js/aos.js"></script>
<script src="/GuriZone/js/main.js"></script>
</body>
</html>