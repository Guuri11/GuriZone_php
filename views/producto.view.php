<!DOCTYPE html>
<html lang="en">
<head>
    <title>GuriZone</title>
    <link rel="icon" href="../imgs/logo_draw_black.png">
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
    <div class="site-section">
        <div class="justify-content-center gurizone-login p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="..<?php echo $productoSeleccionado->getFotoProd()?>" alt="Image" class="img-fluid w-75">
                </div>
                <div class="col-md-6">
                    <h2 class="text-black h1"><?php echo $productoSeleccionado->getModeloProd()?></h2>
                    <p class="text-black h4"><?php echo $productoSeleccionado->getDescripcion()?></p>
                    <hr class="bg-dark">
                    <p class="text-black h4">Fecha salida:<?php echo $productoSeleccionado->getFechaSalida()->format('Y-m-d')?></p>
                    <p><strong class="text-primary h4">Precio: <?php echo $productoSeleccionado->getPrecioUnidad()?>€</strong></p>
                    <p><strong class="text-primary h4">Talla: <?php echo $productoSeleccionado->getTalla()?></strong></p>
                    <p><strong class="text-primary h4">Stock: <?php echo $productoSeleccionado->getStockProd()?></strong></p>
                    <p><a href="#" class="buy-now btn btn-sm btn-primary">Add To Cart</a></p>
                    <?php global $cookieValue; if($cookieValue === "admin"){     // SI EL USUARIO ES ADMIN: OPCION EDITAR PRODUCTO?>
                        <p><a href="<?php echo $route->generateURL('Producto','editarProducto',['id'=>$productoSeleccionado->getIdProd()]) ?>" class="buy-now btn btn-sm btn-primary">EDITAR</a></p>
                    <?php } ?>
                </div>
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