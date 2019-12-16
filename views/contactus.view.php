<!DOCTYPE html>
<html lang="en">
<head>
    <title>GuriZone</title>
    <link rel="icon" href="imgs/logo_draw_black.png">
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
        <div class="row gurizone-contact m-5 p-3">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">¡Pregunta sobre cualquier duda!</h2>
            </div>
            <div class="col-md-12 justify-content-center">
            <form action="#" method="post">

                <div class="p-3 p-lg-5">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="c_fname" class="text-black">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_fname" name="c_fname">
                        </div>
                        <div class="col-md-6">
                            <label for="c_lname" class="text-black">Apellidos <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_lname" name="c_lname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="c_email" name="c_email" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_subject" class="text-black">Asunto </label>
                            <input type="text" class="form-control" id="c_subject" name="c_subject">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_message" class="text-black">Mensaje </label>
                            <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar mensaje
">
                        </div>
                    </div>
                </div>
            </form>
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