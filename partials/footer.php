<!--FOOTER-->
<footer class="site-footer border-top guriFooter">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="footer-heading mb-4">Navigations</h3>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li><a href="#">Sell online</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Shopping cart</a></li>
                            <li><a href="#">Store builder</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li><a href="#">Mobile commerce</a></li>
                            <li><a href="#">Dropshipping</a></li>
                            <li><a href="#">Website development</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li><a href="#">Point of sale</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Software</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <h3 class="footer-heading mb-4">Promo</h3>
                <a href="<?php echo $route->generateURL('Producto','mostrarProducto',['id'=>$ultimoProducto->getIdProd()])?>" class="block-6">
                    <img src=".<?php echo $ultimoProducto->getFotoProd()?>" alt="Image placeholder" class="img-fluid rounded mb-4">
                    <h3 class="font-weight-light  mb-0">Nuevos productos!</h3>
                    <p><?php echo $ultimoProducto->getModeloProd()?></p>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="block-5 mb-5">
                    <h3 class="footer-heading mb-4">Contact Info</h3>
                    <ul class="list-unstyled">
                        <li class="address">C/Falsa 123, Ondara, Alicante, España</li>
                        <li class="phone"><a href="tel://34902202122">+34 902 20 21 22</a></li>
                        <li class="email">contact@gurizone.com</li>
                    </ul>
                </div>

                <div class="block-7">
                    <form action="#" method="post">
                        <label for="email_subscribe" class="footer-heading">Subscribe</label>
                        <div class="form-group">
                            <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                            <input type="submit" class="btn btn-sm btn-primary" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <span class="float-left">Copyright &copy; Colorlib </span> GuriZone 2019 <span class="float-right">2 CFGS DAW</span></a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>

        </div>
    </div>
</footer>
<!--FIN FOOTER-->