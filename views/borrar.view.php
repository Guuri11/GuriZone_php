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
    <div class="container">
        <div class="justify-content-center gurizone-login p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5">
            <h1 class="text-center">¿ESTÁS SEGURO DE BORRAR ESTE PRODUCTO?</h1>
            <!--form action="<?= $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $producto->getIdProd(); ?>">
                <a href="?page=borrar&id=<?php echo $producto->getIdProd(); ?>"><input type="button" class="btn btn-danger" value="Eliminar"></a>
            </form--->
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