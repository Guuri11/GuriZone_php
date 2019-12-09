<!DOCTYPE html>
<html lang="en">
<head>
    <title>GuriZone</title>
    <link rel="icon" href="imgs/logo_draw_black.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">


    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/guriZone.css">

</head>
<body>
<div class="site-wrap">
    <?php  require_once ('./partials/header.php');?>
    <div class="">
        <div class="justify-content-center gurizone-login p-lg-3 m-lg-2 p-md-4 m-md-3 p-sm-4 m-sm-5 table-bordered">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 border p-4 rounded mb-4 ml-3">
                    <!--FILTRO CATEGORIA-->
                    <div class="btn-group mr-1 ml-md-auto float-right">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Filtrar por Categoria</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                            <a class="dropdown-item" href="?page=gestion&categoria=todo&pg=1">Todo</a>
                            <a class="dropdown-item" href="?page=gestion&categoria=accesorios&pg=1">Accesorios</a>
                            <a class="dropdown-item" href="?page=gestion&categoria=ropa&pg=1">Ropa</a>
                            <a class="dropdown-item" href="?page=gestion&categoria=zapatillas&pg=1">Zapatillas</a>
                        </div>
                    </div>
                    <!--FIN FILTRO CATEGORIA-->
                    <!--FILTRO FECHA-->
                    <div>
                        <div class="mt-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filtrar por fecha</h3>
                            <form action="<?= $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>" method="get">
                                <input type="hidden" name="page" value="gestion">
                                <label for="fecha_inicial" class="d-flex text-black">Fecha Inicial</label>
                                <input type="date" id="fecha_inicial" name="fecha_inicial" class="mr-2 mt-1 form-control">
                                <label for="fecha_final" class="d-flex text-black">Fecha Final</label>
                                <input type="date" id="fecha_final" class="mr-2 mt-1 form-control" name="fecha_final">
                                <input type="submit" value="Filtrar" class="btn btn-primary mt-3">
                            </form>
                        </div>
                    </div>
                    <!--FIN FILTRO FECHA-->
                </div>
            </div>
            <!--FILTRO TABLA PRODUCTOS-->
            <table class="table table-hover table-sm table-responsive-sm table-responsive-md">
                <thead class="thead-dark sticky-top">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">MODELO</th>
                    <th scope="col">MARCA</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">SUBCATEGORIA</th>
                    <th scope="col">COLOR</th>
                    <th scope="col">TALLA</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">VENTAS</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">PRECIO</th>
                    <th scope="col">URL FOTO</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($paginacion->getProductos() as $producto){ ?>
                <tr>
                    <td><a href="?page=producto&id=<?php echo $producto->getIdProd(); ?>"><?php echo $producto->getIdProd(); ?></a></td>
                    <td><?php echo $producto->getModeloProd(); ?></td>
                    <td><?php echo $producto->getMarcaProd(); ?></td>
                    <td><?php echo $producto->getCategoriaProd(); ?></td>
                    <td><?php echo $producto->getSubCategoriaProd(); ?></td>
                    <td><?php echo $producto->getColor().'('.$producto->getColorDisp().')'; ?></td>
                    <td><?php echo $producto->getTalla().'('.$producto->getTallaDisp().')'; ?></td>
                    <td><?php echo $producto->getStockProd(); ?></td>
                    <td><?php echo $producto->getNumVentasProd(); ?></td>
                    <td><?php echo $producto->getFechaSalida()->format('Y-m-d'); ?></td>
                    <td><?php echo $producto->getPrecioUnidad(); ?></td>
                    <td><?php echo $producto->getFotoProd(); ?></td>
                    <td class="cut"><?php echo $producto->getDescripcion(); ?></td>
                    <td><?php echo $producto->getDescatalogado()==0 ? 'Activo':'Desactivado'; ?></td>
                    <td>
                        <div>
                            <a href="?page=editar_producto&id=<?php echo $producto->getIdProd();?>"><button type="button" class="btn btn-primary mb-3">Editar</button></a>
                        </div>
                        <div>
                            <a href="?page=borrar&id=<?php echo $producto->getIdProd(); ?>"><input type="button" class="btn btn-danger" value="Eliminar"></a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <!--FIN FILTRO TABLA PRODUCTOS-->

            <!--PAGINACION: segun el filtro solicitado mostrara una paginacion u otra-->
            <div class="row" data-aos="fade-up">
                <div class="col-md-12 text-center">
                    <div class="site-block-27">
                    <?php if(array_key_exists('fecha_inicial',$_GET) && array_key_exists('fecha_final',$_GET)){?>
                        <ul>
                            <li><a href="?page=gestion&categoria=<?php echo $_GET['categoria']?>&fecha_inicial=<?php echo $paginacion->getFecha('fecha_inicial'); ?>&fecha_final=<?php echo $paginacion->getFecha('fecha_final'); ?>&pg=<?php echo $_GET['pg']<=0 ? $paginacion->getPagina()-1:'1';?>"><</a></li>
                            <?php for ($i = 1; $i<=$paginacion->getNumPaginas();$i++){?>
                                <li><a href="?page=gestion&categoria=<?php echo $_GET['categoria']?>&fecha_inicial=<?php echo $paginacion->getFecha('fecha_inicial'); ?>&fecha_final=<?php echo $paginacion->getFecha('fecha_final'); ?>&pg=<?php echo $i?>"><span><?php echo $i ?></span></a></li>
                            <?php } ?>
                            <li><a href="?page=gestion&categoria=<?php echo $_GET['categoria']?>&fecha_inicial=<?php echo $paginacion->getFecha('fecha_inicial'); ?>&fecha_final=<?php echo $paginacion->getFecha('fecha_final'); ?>&pg=<?php echo $paginacion->getPagina()>=$paginacion->getNumPaginas() ? '1':$paginacion->getPagina()+1;?>">&gt;</a></li>
                        </ul>
                        <?php }else{ ?>
                        <ul>
                            <li><a href="?page=gestion&categoria=<?php echo $_GET['categoria']?>&pg=<?php echo $_GET['pg']<=0 ? $paginacion->getPagina()-1:'1';?>"><</a></li>
                            <?php for ($i = 1; $i<=$paginacion->getNumPaginas();$i++){?>
                                <li><a href="?page=gestion&categoria=<?php echo $_GET['categoria']?>&pg=<?php echo $i?>"><span><?php echo $i ?></span></a></li>
                            <?php } ?>
                            <li><a href="?page=gestion&categoria=<?php echo $_GET['categoria']?>&pg=<?php echo $paginacion->getPagina()>=$paginacion->getNumPaginas() ? '1':$paginacion->getPagina()+1;?>">&gt;</a></li>
                        </ul>
                        <?php }?>
                    </div>
                </div>
                <!--FIN PAGINACION-->
            </div>
        </div>
    </div>
    <?php  require_once ('./partials/footer.php');?>
</div>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/aos.js"></script>
<script src="../js/main.js"></script>
</body>
</html>
