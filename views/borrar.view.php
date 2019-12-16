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
    <div class="container">
        <div class="justify-content-center gurizone-login p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5">
            <h3 class="text-center">¿ESTAS SEGURO DE QUE QUIERES BORRAR EL PRODUCTO?</h3>
            <form action="<?php echo $route->generateURL('Producto','borrarProducto',['id'=>$id])?>" method="post">
                <div class="mt-5 ml-5">
                    <input type="hidden" name="borrar" value="true">
                    <input type="submit" value="Si" class="btn btn-primary w-25">
                    <a href="<?php global $route; echo $route->generateURL('Usuario','gestion')?>"><button type="button" class="btn btn-danger w-25 float-right mr-5">No</button></a>
                </div>
            </form>
        </div>
    </div>
    <?php  require_once ('./partials/footer.php');?>
</div>

<script src="/GuriZone/../../js/jquery-3.3.1.min.js"></script>
<script src="/GuriZone/../../js/jquery-ui.js"></script>
<script src="/GuriZone/../../js/popper.min.js"></script>
<script src="/GuriZone/../../js/bootstrap.min.js"></script>
<script src="/GuriZone/../../js/owl.carousel.min.js"></script>
<script src="/GuriZone/../../js/jquery.magnific-popup.min.js"></script>
<script src="/GuriZone/../../js/aos.js"></script>
<script src="/GuriZone/../../js/main.js"></script>
</body>
</html>