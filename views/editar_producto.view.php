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
            <h1 class="text-center text-black-50">EDITAR PRODUCTO</h1>
            <!--RESOLUCION DEL UPDATE-->
            <?php if (isset($errores) && empty($errores)){ ?>
                <h3 class="text-success text-center">Actualización exitosa!</h3>
            <?php }elseif (isset($errores) && !empty($errores)){?>
                <h3 class="text-danger text-center">Error en la actualizacion!</h3>
            <?php foreach ($errores as $error) { ?>
                      <h5 class="text-danger text-center"><?php echo $error;?></h5>
               <?php }
            } ?>
            <!--FIN RESOLUCION DEL UPDATE-->

            <div class="col-md-12 justify-content-center">
                <!--FORMULARIO-->
                <form action="#" method="post">
                    <div class="p-3 p-lg-5">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">MODELO <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="modelo" value="<?php echo $productoSeleccionado->getModeloProd()?>">
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">MARCA <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="marca" placeholder="" value="<?php echo $productoSeleccionado->getMarcaProd()?>">
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">CATEGORIA <span class="text-danger">*</span></label>
                                <select class="custom-select" name="categoria" id="c_text">
                                    <option value="1" <?php echo $productoSeleccionado->getCategoriaProd()==1 ? 'selected':''?>>Accesorios</option>
                                    <option value="2" <?php echo $productoSeleccionado->getCategoriaProd()==2 ? 'selected':''?>>Ropa</option>
                                    <option value="3" <?php echo $productoSeleccionado->getCategoriaProd()==3 ? 'selected':''?>>Zapatillas</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">SUBCATEGORIA<span class="text-danger">*</span></label>
                                <select class="custom-select" name="subcategoria" id="c_text">
                                    <option value="1" <?php echo $productoSeleccionado->getSubcategoriaProd()==1 ? 'selected':''?>>Balones</option>
                                    <option value="2" <?php echo $productoSeleccionado->getSubcategoriaProd()==2 ? 'selected':''?>>Tableros</option>
                                    <option value="3" <?php echo $productoSeleccionado->getSubcategoriaProd()==3 ? 'selected':''?>>Varios</option>
                                    <option value="4" <?php echo $productoSeleccionado->getSubcategoriaProd()==4 ? 'selected':''?>>CamisetasNBA</option>
                                    <option value="5" <?php echo $productoSeleccionado->getSubcategoriaProd()==5 ? 'selected':''?>>Sudaderas</option>
                                    <option value="6" <?php echo $productoSeleccionado->getSubcategoriaProd()==6 ? 'selected':''?>>Camisetas</option>
                                    <option value="7" <?php echo $productoSeleccionado->getSubcategoriaProd()==7 ? 'selected':''?>>Caquetas</option>
                                    <option value="8" <?php echo $productoSeleccionado->getSubcategoriaProd()==8 ? 'selected':''?>>Pantalones</option>
                                    <option value="9" <?php echo $productoSeleccionado->getSubcategoriaProd()==9 ? 'selected':''?>>Jordan</option>
                                    <option value="10" <?php echo $productoSeleccionado->getSubcategoriaProd()==10 ? 'selected':''?>>Nike</option>
                                    <option value="11" <?php echo $productoSeleccionado->getSubcategoriaProd()==11 ? 'selected':''?>>Adidas</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">COLOR<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="color" placeholder="" value="<?php echo $productoSeleccionado->getColor()?>">
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">TALLA<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="talla" placeholder="" value="<?php echo $productoSeleccionado->getTalla()?>">
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">STOCK<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="stock" placeholder="" value="<?php echo $productoSeleccionado->getStockProd()?>">
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">PRECIO <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="precio" placeholder="" value="<?php echo $productoSeleccionado->getPrecioUnidad()?>">
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">URL FOTO <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_text" name="urlfoto" placeholder="" value="<?php echo $productoSeleccionado->getFotoProd()?>">
                            </div>
                            <div class="col-md-12">
                                <label for="c_text" class="text-black">ESTADO <span class="text-danger">*</span></label>
                                <div>
                                <label class="radio-inline"><input type="radio" name="descatalogado" checked value="0">Dar alta</label>
                                <label class="radio-inline"><input type="radio" name="descatalogado" value="1">Dar baja</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="descripcion" class="text-black">DESCRIPCION </label>
                                <textarea name="descripcion" id="descripcion" cols="30" rows="7" class="form-control"><?php echo $productoSeleccionado->getDescripcion()?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="ACTUALIZAR">
                            </div>
                        </div>
                    </div>
                </form>
                <!--FORMULARIO-->
            </div>
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
