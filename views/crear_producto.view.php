<!DOCTYPE html>
<html lang="en">
<head>
    <title>GuriZone</title>
    <link rel="icon" href="imgs/logo_draw_black.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/guriZone.css">

</head>
<body>
<div class="site-wrap">
    <?php  require_once ('./partials/header.php');?>
    <div class="container">
        <div class="justify-content-center gurizone-crear p-lg-4 m-lg-3 p-md-4 m-md-3 p-sm-4 m-sm-5">
            <h1 class="text-center text-black-50">CREAR PRODUCTO</h1>
            <!--RESOLUCION DEL UPDATE-->
            <?php if (!empty($errores)){ ?>
                <h3 class="text-danger text-center">Error en la inserción del producto!</h3>
                <?php foreach ($errores as $error){ ?>
                    <h5 class="text-danger text-center"><?php echo $error;?></h5>
                <?php }
            }elseif($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errores)){?>
                <h3 class="text-success text-center">Inserción del producto realizada!</h3>
            <?php } ?>
            <!--FIN RESOLUCION DEL UPDATE-->

            <!--FORMULARIO-->
            <div class="col-md-12 justify-content-center">
                <form action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']?>" method="post">
                    <div class="p-3 p-lg-5">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">MODELO <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="modelo" placeholder="">
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">MARCA <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="marca" placeholder="">
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">CATEGORIA <span class="text-danger">*</span></label>
                                <select class="custom-select" name="categoria" id="c_text">
                                    <option selected value="1">Accesorios</option>
                                    <option value="2">Ropa</option>
                                    <option value="1">Zapatillas</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">SUBCATEGORIA<span class="text-danger">*</span></label>
                                <select class="custom-select" name="subcategoria" id="c_text">
                                    <option selected value="1">Balones</option>
                                    <option value="2">Tableros</option>
                                    <option value="3">Varios</option>
                                    <option value="4">CamisetasNBA</option>
                                    <option value="5">Sudaderas</option>
                                    <option value="6">Camisetas</option>
                                    <option value="7">Caquetas</option>
                                    <option value="8">Pantalones</option>
                                    <option value="9">Jordan</option>
                                    <option value="10">Nike</option>
                                    <option value="11">Adidas</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">COLOR<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="color" placeholder="">
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">TALLA<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="talla" placeholder="">
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">STOCK<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="stock" placeholder="">
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">PRECIO <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="precio" placeholder="">
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">URL FOTO <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="urlfoto" value="/imgs/productos/">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="c_text" class="text-black">ESTADO <span class="text-danger">*</span></label>
                            <div>
                                <label class="radio-inline"><input type="radio" name="descatalogado" checked value="0">Dar alta</label>
                                <label class="radio-inline"><input type="radio" name="descatalogado" value="1">Dar baja</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="descripcion" class="text-black">DESCRIPCION </label>
                                <textarea name="descripcion" id="descripcion" cols="30" rows="7" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="CREAR">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--FIN FORMULARIO-->
        </div>
    </div>
    <?php  require_once ('./partials/footer.php');?>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>
</body>
</html>
