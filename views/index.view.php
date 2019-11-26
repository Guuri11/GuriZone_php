<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GuriZone</title>
    <link rel="icon" href="imgs/logo_draw_black.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="js/sesions.js"></script>

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
          <!--SLIDER--
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img class="d-block w-100" src="./imgs/backgrounds/shoes_background.jpg" alt="First slide">
                      <div class="carousel-caption d-none d-md-block">
                          <h1 style="font-weight: bold">MUEVETE COMO TU JUGADOR FAVORITO</h1>
                          <p style="font-weight: bold; font-size: 2em">Tenemos las mejores zapatillas que se adaptan a tu juego</p>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <img class="d-block w-100" src="./imgs/backgrounds/nba_jerseys_background_2.jpg" alt="Second slide">
                      <div class="carousel-caption d-none d-md-block">
                          <h1 style="font-weight: bold">VISTE CON LA CAMISETA DE TU EQUIPO FAVORITO</h1>
                          <p style="font-weight: bold; font-size: 2em">Todas las camisetas de las grandes estrellas del baloncesto mundial</p>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <img class="d-block w-100" src="./imgs/backgrounds/accessories_background.jpg" alt="Third slide">
                      <div class="carousel-caption d-none d-md-block">
                          <h1 style="font-weight: bold">COMPLETA TU ESTILO CON NUESTROS ACCESORIOS</h1>
                          <p style="font-weight: bold; font-size: 2em">Encontrarás distintos accesorios que te harán las vida más fácil en el mundo del baloncesto</p>
                      </div>
                  </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>
          <--FIN SLIDEER-->

          <div class="justify-content-center gurizone-inicio p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5">
              <div class="site-section site-blocks-2">
                  <div class="container">
                      <div class="row justify-content-center">
                          <div class="col-md-7 site-section-heading text-center pt-4">
                              <h2>CATÁLOGO</h2>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                              <a class="block-2-item" href="?page=tienda&categoria=accesorios&pg=1">
                                  <figure class="image">
                                      <img src="imgs/backgrounds/accesorios.jpg" alt="" class="img-fluid">
                                  </figure>
                                  <div class="text">
                                      <span class="text-uppercase">Catálogo</span>
                                      <h3>Accesorios</h3>
                                  </div>
                              </a>
                          </div>
                          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                              <a class="block-2-item" href="?page=tienda&categoria=ropa&pg=1">
                                  <figure class="image">
                                      <img src="imgs/backgrounds/ropa.jpg" alt="" class="img-fluid">
                                  </figure>
                                  <div class="text">
                                      <span class="text-uppercase">Catálogo</span>
                                      <h3>Ropa</h3>
                                  </div>
                              </a>
                          </div>
                          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                              <a class="block-2-item" href="?page=tienda&categoria=zapatillas&pg=1">
                                  <figure class="image">
                                      <img src="imgs/backgrounds/zapatillas.jpg" alt="" class="img-fluid">
                                  </figure>
                                  <div class="text">
                                      <span class="text-uppercase">Catálogo</span>
                                      <h3>Zapatillas</h3>
                                  </div>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!--INICIO TOP TREANDING-->
          <div class="justify-content-center gurizone-inicio p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5">
              <div class="site-section block-3 site-blocks-2">
                  <div class="container">
                      <div class="row justify-content-center">
                          <div class="col-md-7 site-section-heading text-center pt-4">
                              <h2>MÁS VENDIDOS</h2>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="nonloop-block-3 owl-carousel">
                                  <?php foreach ($productosTT as $producto){ ?>
                                  <div class="item">
                                      <a href="?page=producto&id=<?php echo $producto->getIdProd()?>" class="block-6">
                                      <div class="block-4 text-center shadow">
                                          <figure class="block-4-image">
                                              <img src=".<?php echo $producto->getFotoProd()?>" alt="Image placeholder" class="img-fluid">
                                          </figure>
                                          <div class="block-4-text p-4">
                                              <h3><a href="#"><?php echo $producto->getModeloProd()?></a></h3>
                                              <p class="mb-0"><?php echo $producto->getNumVentasProd()?> vendidos</p>
                                              <p class="text-primary font-weight-bold"><?php echo $producto->getPrecioUnidad()?>€</p>
                                          </div>
                                      </div>
                                  </div>
                                  <?php } ?>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--FIN TOP TREANDING-->

          <!--INICIO NOVEDADES-->
          <div class="justify-content-center gurizone-inicio p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5">
              <div class="site-section block-3 site-blocks-2">
                  <div class="container">
                      <div class="row justify-content-center">
                          <div class="col-md-7 site-section-heading text-center pt-4">
                              <h2>NOVEDADES</h2>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="nonloop-block-3 owl-carousel">
                                  <?php foreach ($novedades as $producto){ ?>
                                      <div class="item">
                                          <a href="?page=producto&id=<?php echo $producto->getIdProd()?>" class="block-6">
                                          <div class="block-4 text-center shadow">
                                              <figure class="block-4-image">
                                                  <img src=".<?php echo $producto->getFotoProd()?>" alt="Image placeholder" class="img-fluid">
                                              </figure>
                                              <div class="block-4-text p-4">
                                                  <h3><a href="#"><?php echo $producto->getModeloProd()?></a></h3>
                                                  <p class="mb-0"><?php echo $producto->getNumVentasProd()?> vendidos</p>
                                                  <p class="text-primary font-weight-bold"><?php echo $producto->getPrecioUnidad()?>€</p>
                                              </div>
                                          </div>
                                      </div>
                                  <?php } ?>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--FIN TOP NOVEDADES-->

          <!--INICIO OFERTAS-->
          <!--FIN TOP OFERTAS-->

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