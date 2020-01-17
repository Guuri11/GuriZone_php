<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.twig */
class __TwigTemplate_45210f30168f8caae52ae80f319c8a61a21862a0b36362f3679a5097cc946878 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <title>GuriZone</title>
    <link rel=\"icon\" href=\"/../imgs/logo_draw_black.png\">
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Mukta:300,400,700\">
    <link rel=\"stylesheet\" href=\"/../fonts/icomoon/style.css\">

    <link rel=\"stylesheet\" href=\"/../css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"/../css/magnific-popup.css\">
    <link rel=\"stylesheet\" href=\"/../css/jquery-ui.css\">
    <link rel=\"stylesheet\" href=\"/../css/owl.carousel.min.css\">
    <link rel=\"stylesheet\" href=\"/../css/owl.theme.default.min.css\">


    <link rel=\"stylesheet\" href=\"/../css/aos.css\">

    <link rel=\"stylesheet\" href=\"/../css/style.css\">
    <link rel=\"stylesheet\" href=\"/../css/guriZone.css\">

</head>
<body>
<div class=\"site-wrap\">
    <!--NAVBAR-->
    <header class=\"site-navbar\" role=\"banner\">
        <div class=\"site-navbar-top\">
            <div class=\"container\">
                <div class=\"row align-items-center\">

                    <div class=\"col-6 col-md-4 order-2 order-md-1 site-search-icon text-left\">
                        <form action=\"";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 34), "html", null, true);
        echo "\" method=\"get\" class=\"site-block-top-search\">
                            <button type=\"submit\" class=\"icon icon-search mr-5 bg-white\"></button>
                            <input type=\"text\" class=\"form-control border-0\" name=\"search\" placeholder=\"";
        // line 36
        echo gettext("BUSCAR");
        echo "\">
                        </form>
                    </div>

                    <div class=\"col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center\">
                        <div >
                            <a href=\"";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "index"], "method", false, false, false, 42), "html", null, true);
        echo "\" class=\"\"><img class=\"img-fluid gurilogo\" src=\"/../imgs/logo_black.png\" width=\"45%\"></a>
                        </div>
                    </div>
                    <div class=\"col-6 col-md-4 order-3 order-md-3 text-right\">
                        <div class=\"site-top-icons\">
                            <ul>
                                ";
        // line 48
        if ((($context["usuario"] ?? null) == "anonimo")) {
            echo " ";
            // line 49
            echo "                                <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "registrarse"], "method", false, false, false, 49), "html", null, true);
            echo "\"><span class=\"icon icon-person_add \"></span> ";
            echo gettext("REGISTRARSE");
            echo "</a>
                                <li><a href=\"";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "login"], "method", false, false, false, 50), "html", null, true);
            echo "\"><span class=\"icon icon-sign-in\"></span> ";
            echo gettext("INICIAR SESIÓN");
            echo "</a></li>
                                ";
        } elseif (((        // line 51
($context["usuario"] ?? null) == "usuario") || (($context["usuario"] ?? null) == "empleado"))) {
            echo " ";
            // line 52
            echo "                                <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "logout"], "method", false, false, false, 52), "html", null, true);
            echo "\"><span class=\"icon icon-sign-out\"></span> ";
            echo gettext("CERRAR SESIÓN");
            echo "</a></li>
                                <li><a href=\"";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "perfil"], "method", false, false, false, 53), "html", null, true);
            echo "\"><span class=\"icon icon-home\"></span> ";
            echo gettext("MI PERFIL");
            echo "</a></li>
                                ";
        } elseif ((        // line 54
($context["usuario"] ?? null) == "admin")) {
            echo " ";
            // line 55
            echo "                                <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "logout"], "method", false, false, false, 55), "html", null, true);
            echo "\"><span class=\"icon icon-sign-out\"></span> ";
            echo gettext("CERRAR SESIÓN");
            echo "</a></li>
                                <li><a href=\"";
            // line 56
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "dashboard"], "method", false, false, false, 56), "html", null, true);
            echo "\"><span class=\"icon icon-dashboard\"></span> ";
            echo gettext("ADMIN");
            echo "</a></li>
                                ";
        }
        // line 58
        echo "                                <li>
                                    <a href=\"#\" class=\"site-cart\">
                                        <span class=\"icon icon-shopping_cart\"></span> ";
        // line 60
        echo gettext("CARRITO");
        // line 61
        echo "                                    </a>
                                </li>
                                <li class=\"d-inline-block d-md-none ml-md-0\"><a href=\"#\" class=\"site-menu-toggle js-menu-toggle\"><span class=\"icon-menu\"></span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <nav class=\"site-navigation text-right text-md-center\" role=\"navigation\">
            <div class=\"container\">
                <ul class=\"site-menu js-clone-nav d-none d-md-block\">
                    <li><a href=\"";
        // line 74
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "index"], "method", false, false, false, 74), "html", null, true);
        echo "\">";
        echo gettext("INICIO");
        echo "</a></li>
                    <li class=\"has-children\">
                        <a href=\"";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 76), "html", null, true);
        echo "\">";
        echo gettext("TIENDA");
        echo "</a>
                        <ul class=\"dropdown\">
                            <li><a href=\"";
        // line 78
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 78), "html", null, true);
        echo "?categoria=accesorios&page=1\">";
        echo gettext("ACCESORIOS");
        echo "</a></li>
                            <li><a href=\"";
        // line 79
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 79), "html", null, true);
        echo "?categoria=ropa&page=1\">";
        echo gettext("ROPA");
        echo "</a></li>
                            <li><a href=\"";
        // line 80
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 80), "html", null, true);
        echo "?categoria=zapatillas&page=1\">";
        echo gettext("ZAPATILLAS");
        echo "</a></li>
                        </ul>
                    </li>
                    <li><a href=\"#\">Sobre Nosotros</a></li>
                    <li><a href=\"";
        // line 84
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "contacto"], "method", false, false, false, 84), "html", null, true);
        echo "\">";
        echo gettext("CONTACTANOS");
        echo "</a></li>
                </ul>
            </div>
        </nav>
        </nav>
    </header>
    <!--FIN NAVBAR-->
        ";
        // line 91
        $this->displayBlock('body', $context, $blocks);
        // line 93
        echo "    <!--FOOTER-->
    <footer class=\"site-footer border-top guriFooter\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-6 mb-5 mb-lg-0\">
                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <h3 class=\"footer-heading mb-4\">";
        // line 100
        echo gettext("Navegacion");
        echo "</h3>
                        </div>
                        <div class=\"col-md-6 col-lg-4\">
                            <ul class=\"list-unstyled\">
                                <li><a href=\"#\">";
        // line 104
        echo gettext("Ventas online");
        echo "</a></li>
                                <li><a href=\"#\">";
        // line 105
        echo gettext("Caracteristicas");
        echo "</a></li>
                                <li><a href=\"#\">";
        // line 106
        echo gettext("Carrito");
        echo "</a></li>
                            </ul>
                        </div>
                        <div class=\"col-md-6 col-lg-4\">
                            <ul class=\"list-unstyled\">
                                <li><a href=\"#\">";
        // line 111
        echo gettext("Comercio movil");
        echo "</a></li>
                                <li><a href=\"#\">";
        // line 112
        echo gettext("Envios");
        echo "</a></li>
                                <li><a href=\"#\">";
        // line 113
        echo gettext("Desarrollo Web");
        echo "</a></li>
                            </ul>
                        </div>
                        <div class=\"col-md-6 col-lg-4\">
                            <ul class=\"list-unstyled\">
                                <li><a href=\"#\">";
        // line 118
        echo gettext("Punto de venta");
        echo "</a></li>
                                <li><a href=\"#\">Hardware</a></li>
                                <li><a href=\"#\">Software</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-6 col-lg-3 mb-4 mb-lg-0\">
                    <h3 class=\"footer-heading mb-4\">Promo</h3>
                    <a href=\"";
        // line 127
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "mostrarProducto", 2 => ["id" => twig_get_attribute($this->env, $this->source, ($context["ultimo_producto"] ?? null), "getIdProd", [], "method", false, false, false, 127)]], "method", false, false, false, 127), "html", null, true);
        echo "\" class=\"block-6\">
                        <img src=\"/../";
        // line 128
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ultimo_producto"] ?? null), "getFotoProd", [], "method", false, false, false, 128), "html", null, true);
        echo "\" alt=\"Image placeholder\" class=\"img-fluid rounded mb-4\">
                        <h3 class=\"font-weight-light  mb-0\">";
        // line 129
        echo gettext("Nuevo producto!");
        echo "</h3>
                        <p>";
        // line 130
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ultimo_producto"] ?? null), "getModeloProd", [], "method", false, false, false, 130), "html", null, true);
        echo "</p>
                    </a>
                </div>
                <div class=\"col-md-6 col-lg-3\">
                    <div class=\"block-5 mb-5\">
                        <h3 class=\"footer-heading mb-4\">";
        // line 135
        echo gettext("Informacion de contacto");
        echo "</h3>
                        <ul class=\"list-unstyled\">
                            <li class=\"address\">C/Falsa 123, Ondara, Alicante, España</li>
                            <li class=\"phone\"><a href=\"tel://34902202122\">+34 902 20 21 22</a></li>
                            <li class=\"email\">contact@gurizone.com</li>
                        </ul>
                    </div>

                    <div class=\"block-7\">
                        <form action=\"#\" method=\"post\">
                            <label for=\"email_subscribe\" class=\"footer-heading\">";
        // line 145
        echo gettext("Subscribete");
        echo "</label>
                            <div class=\"form-group\">
                                <input type=\"text\" class=\"form-control py-4\" id=\"email_subscribe\" placeholder=\"Email\">
                                <input type=\"submit\" class=\"btn btn-sm btn-primary\" value=\"";
        // line 148
        echo gettext("Enviar");
        echo "\">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class=\"row pt-5 mt-5 text-center\">
                <div class=\"col-md-12\">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <span class=\"float-left\">Copyright &copy; Colorlib </span> Sergio Gurillo Corral - 2020 <span class=\"float-right\">2 CFGS DAW</span></a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </div>
    </footer>
    <!--FIN FOOTER-->
</div>

<script src=\"/../js/jquery-3.3.1.min.js\"></script>
<script src=\"/../js/jquery-ui.js\"></script>
<script src=\"/../js/popper.min.js\"></script>
<script src=\"/../js/bootstrap.min.js\"></script>
<script src=\"/../js/owl.carousel.min.js\"></script>
<script src=\"/../js/jquery.magnific-popup.min.js\"></script>
<script src=\"/../js/aos.js\"></script>
<script src=\"/../js/main.js\"></script>
</body>
</html>";
    }

    // line 91
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 92
        echo "        ";
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  353 => 92,  349 => 91,  314 => 148,  308 => 145,  295 => 135,  287 => 130,  283 => 129,  279 => 128,  275 => 127,  263 => 118,  255 => 113,  251 => 112,  247 => 111,  239 => 106,  235 => 105,  231 => 104,  224 => 100,  215 => 93,  213 => 91,  201 => 84,  192 => 80,  186 => 79,  180 => 78,  173 => 76,  166 => 74,  151 => 61,  149 => 60,  145 => 58,  138 => 56,  131 => 55,  128 => 54,  122 => 53,  115 => 52,  112 => 51,  106 => 50,  99 => 49,  96 => 48,  87 => 42,  78 => 36,  73 => 34,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.twig", "/opt/lampp/htdocs/GuriZone/templates/base.twig");
    }
}
