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
    <div class="justify-content-center gurizone-perfil p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5">
    <div class="row">
        <div class="col-12 text-center">
            <div>
                <img src="/GuriZone/imgs/default_profile.jpg" width="100px">
            </div>
            <div class="container mt-3">
                <form>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <input type="button" value="Actualizar foto" class="btn btn-primary mt-3 mb-3">
                    </div>
                </form>
            </div>
            <hr/>
        </div>
        <div class="col-12">
            <h3 class="text-black text-center">NOMBRE</h3>
            <div class="container">
                <p>Usuario: <?php echo $user->getNombre()?></p>
                <p>Email: <?php echo $user->getEmail()?></p>
            </div>
            <div class="container">
            <a href="#" class="btn btn-primary">Editar perfil</a>
            </div>
        </div>
    </div>
    </div>
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