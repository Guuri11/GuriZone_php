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

/* catalogo.twig */
class __TwigTemplate_68a8e06b1b89df8276bd3091c60795abdc0e2a16b5a42251faae51c5bd079751 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.twig", "catalogo.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"justify-content-center gurizone-login p-lg-2 m-lg-3 p-md-4 m-md-3 p-sm-4 m-sm-5\">
        <div class=\"site-section\">
            <div class=\"container\">
                <div class=\"col-6 col-md-4 order-2 order-md-1 site-search-icon text-left\">
                    <form action=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 7), "html", null, true);
        echo "\" method=\"get\" class=\"site-block-top-search\">
                        <button type=\"submit\" class=\"icon icon-search mr-5 bg-white\"></button>
                        <input type=\"text\" class=\"form-control border-0\" name=\"search\" placeholder=\"Search\">
                    </form>
                </div>
                <div class=\"row mb-5\">
                    <div class=\"col-md-9 order-2\">
                        <div class=\"row\">
                            <div class=\"col-md-12 mb-5\">
                                ";
        // line 16
        if (( !(null === ($context["fecha_inicial"] ?? null)) &&  !(null === ($context["fecha_final"] ?? null)))) {
            // line 17
            echo "                                <div class=\"float-md-left mb-4\"><h2 class=\"text-black h5\">Fecha filtrada entre ";
            echo twig_escape_filter($this->env, ($context["fecha_inicial"] ?? null), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, ($context["fecha_final"] ?? null), "html", null, true);
            echo "</h2></div>
                                ";
        } elseif ( !(null ===         // line 18
($context["busqueda"] ?? null))) {
            // line 19
            echo "                                <div class=\"float-md-left mb-4\"><h2 class=\"text-black h5\">Busqueda: ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, ($context["busqueda"] ?? null)), "html", null, true);
            echo "</h2></div>
                                ";
        } else {
            // line 21
            echo "                                <div class=\"float-md-left mb-4\"><h2 class=\"text-black h5\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["categoria"] ?? null)), "html", null, true);
            echo "</h2></div>
                                ";
        }
        // line 23
        echo "                            </div>
                        </div>
                        <!--PRODUCTOS-->
                        <div class=\"row mb-5\">
                            ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getProductos", [], "any", false, false, false, 27));
        foreach ($context['_seq'] as $context["_key"] => $context["producto"]) {
            // line 28
            echo "                            <div class=\"col-sm-6 col-lg-4 mb-4\" data-aos=\"fade-up\">
                                <div class=\"block-4 text-center border\">
                                    <figure class=\"block-4-image\">
                                        <a href=\"";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "mostrarProducto", 2 => ["id" => twig_get_attribute($this->env, $this->source, $context["producto"], "getIdProd", [], "any", false, false, false, 31)]], "method", false, false, false, 31), "html", null, true);
            echo "\"><img src=\".";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getFotoProd", [], "any", false, false, false, 31), "html", null, true);
            echo "\" alt=\"Image placeholder\" class=\"img-fluid\"></a>
                                    </figure>
                                    <div class=\"block-4-text p-4\">
                                        <h3><a href=\"";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "mostrarProducto", 2 => ["id" => twig_get_attribute($this->env, $this->source, $context["producto"], "getIdProd", [], "any", false, false, false, 34)]], "method", false, false, false, 34), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getModeloProd", [], "any", false, false, false, 34), "html", null, true);
            echo "</a></h3>
                                        <p class=\"mb-0\">";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getMarcaProd", [], "any", false, false, false, 35), "html", null, true);
            echo "</p>
                                        <p class=\"text-primary font-weight-bold\">";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getPrecioUnidad", [], "any", false, false, false, 36), "html", null, true);
            echo "€</p>
                                    </div>
                                </div>
                            </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['producto'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "                        </div>
                        <!--FIN PRODUCTOS-->

                        <!--PAGINACION: Segun los filtros de busqueda utilizara un tipo de paginada u otro para la redireccion-->

                        <div class=\"row\" data-aos=\"fade-up\">
                            <div class=\"col-md-12 text-center\">
                                <div class=\"site-block-27\">
                                    ";
        // line 49
        if ((((null === ($context["busqueda"] ?? null)) && (null === ($context["fecha_inicial"] ?? null))) && (null === ($context["fecha_final"] ?? null)))) {
            // line 50
            echo "                                    <ul>
                                        <li><a href=\"";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 51), "html", null, true);
            echo "?categoria=";
            echo twig_escape_filter($this->env, ($context["categoria"] ?? null), "html", null, true);
            echo "&page=";
            (((($context["pagina"] ?? null) <= 0)) ? (print (twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 51) - 1), "html", null, true))) : (print ("1")));
            echo "\"><</a></li>
                                        ";
            // line 52
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getNumPaginas", [], "any", false, false, false, 52)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 53
                echo "                                        <li><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generaterURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 53), "html", null, true);
                echo "?categoria=";
                echo twig_escape_filter($this->env, ($context["categoria"] ?? null), "html", null, true);
                echo "&page=";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "\"><span>";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "</span></a></li>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "                                        <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 55), "html", null, true);
            echo "?categoria=";
            echo twig_escape_filter($this->env, ($context["categoria"] ?? null), "html", null, true);
            echo "&page=";
            (((twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 55) >= twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getNumPaginas", [], "any", false, false, false, 55))) ? (print ("1")) : (print (twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 55) + 1), "html", null, true))));
            echo "\">&gt;</a></li>
                                    </ul>
                                    ";
        } elseif (( !(null ===         // line 57
($context["fecha_inicial"] ?? null)) &&  !(null === ($context["fecha_final"] ?? null)))) {
            // line 58
            echo "                                    <ul>
                                        <li><a href=\"";
            // line 59
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 59), "html", null, true);
            echo "?fecha_inicial=";
            echo twig_escape_filter($this->env, ($context["fecha_inicial"] ?? null), "html", null, true);
            echo "&fecha_final=";
            echo twig_escape_filter($this->env, ($context["fecha_final"] ?? null), "html", null, true);
            echo "&page=";
            (((($context["pagina"] ?? null) <= 0)) ? (print (twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 59) - 1), "html", null, true))) : (print ("1")));
            echo "\"><</a></li>
                                        ";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getNumPaginas", [], "any", false, false, false, 60)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 61
                echo "                                        <li><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 61), "html", null, true);
                echo "?fecha_inicial=";
                echo twig_escape_filter($this->env, ($context["fecha_inicial"] ?? null), "html", null, true);
                echo "&fecha_final=";
                echo twig_escape_filter($this->env, ($context["fecha_final"] ?? null), "html", null, true);
                echo "&page=";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "\"><span>";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "</span></a></li>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            echo "                                        <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 63), "html", null, true);
            echo "?fecha_inicial=";
            echo twig_escape_filter($this->env, ($context["fecha_inicial"] ?? null), "html", null, true);
            echo "&fecha_final=";
            echo twig_escape_filter($this->env, ($context["fecha_final"] ?? null), "html", null, true);
            echo "&page=";
            (((twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 63) >= twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getNumPaginas", [], "any", false, false, false, 63))) ? (print ("1")) : (print (twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 63) + 1), "html", null, true))));
            echo "\">&gt;</a></li>
                                    </ul>
                                    ";
        } else {
            // line 66
            echo "                                    <ul>
                                        <li><a href=\"";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 67), "html", null, true);
            echo "?search=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getBusqueda", [], "any", false, false, false, 67), "html", null, true);
            echo "&page=";
            (((($context["pagina"] ?? null) <= 0)) ? (print (twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 67) - 1), "html", null, true))) : (print ("1")));
            echo "\"><</a></li>
                                        ";
            // line 68
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getNumPaginas", [], "any", false, false, false, 68)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 69
                echo "                                        <li><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 69), "html", null, true);
                echo "?search=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getBusqueda", [], "any", false, false, false, 69), "html", null, true);
                echo "&page=";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "\"><span>";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "</span></a></li>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            echo "                                        <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 71), "html", null, true);
            echo "?search=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getBusqueda", [], "any", false, false, false, 71), "html", null, true);
            echo "&page=";
            (((twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 71) >= twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getNumPaginas", [], "any", false, false, false, 71))) ? (print ("1")) : (print (twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 71) + 1), "html", null, true))));
            echo "\">&gt;</a></li>
                                    </ul>
                                    ";
        }
        // line 74
        echo "                                </div>
                            </div>
                        </div>
                        <!--FIN PAGINACION-->
                        <!--FILTRO CATEGORIA/FECHA-->
                    </div>
                    <div class=\"col-md-3 order-1 mb-5 mb-md-0\">
                        <div class=\"border p-4 rounded mb-4\">
                            <h3 class=\"mb-3 h6 text-uppercase text-black d-block\">Categorias</h3>
                            <ul class=\"list-unstyled mb-0\">
                                <li class=\"mb-1\"><a href=\"";
        // line 84
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 84), "html", null, true);
        echo "?categoria=todo&page=1\" class=\"d-flex\"><span>Todo</span> <span class=\"text-black ml-auto\"></span></a></li>
                                <li class=\"mb-1\"><a href=\"";
        // line 85
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 85), "html", null, true);
        echo "?categoria=accesorios&page=1\" class=\"d-flex\"><span>Accesorios</span> <span class=\"text-black ml-auto\">";
        echo twig_escape_filter($this->env, ($context["stock_accesorios"] ?? null), "html", null, true);
        echo "</span></a></li>
                                <li class=\"mb-1\"><a href=\"";
        // line 86
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 86), "html", null, true);
        echo "?categoria=ropa&page=1\" class=\"d-flex\"><span>Ropa</span> <span class=\"text-black ml-auto\">";
        echo twig_escape_filter($this->env, ($context["stock_ropa"] ?? null), "html", null, true);
        echo "</span></a></li>
                                <li class=\"mb-1\"><a href=\"";
        // line 87
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 87), "html", null, true);
        echo "?categoria=zapatillas&page=1\" class=\"d-flex\"><span>Zapatillas</span> <span class=\"text-black ml-auto\">";
        echo twig_escape_filter($this->env, ($context["stock_zapatillas"] ?? null), "html", null, true);
        echo "</span></a></li>
                            </ul>
                        </div>
                        <div class=\"border p-4 rounded mb-4\">
                            <div class=\"mb-4\">
                                <h3 class=\"mb-3 h6 text-uppercase text-black d-block\">Filtrar por fecha</h3>
                                <form action=\"";
        // line 93
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 93), "html", null, true);
        echo "\" method=\"get\">
                                    <label for=\"fecha_inicial\" class=\"d-flex text-black\">Fecha Inicial</label>
                                    <input type=\"date\" id=\"fecha_inicial\" name=\"fecha_inicial\" class=\"mr-2 mt-1 form-control\">
                                    <label for=\"fecha_final\" class=\"d-flex text-black\">Fecha Final</label>
                                    <input type=\"date\" id=\"fecha_final\" class=\"mr-2 mt-1 form-control\" name=\"fecha_final\">
                                    <input type=\"hidden\" name=\"page\" value=\"1\">
                                    <input type=\"submit\" value=\"Filtrar\" class=\"btn btn-primary mt-3\">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--FIN FILTRO CATEGORIA/FECHA-->
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "catalogo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  316 => 93,  305 => 87,  299 => 86,  293 => 85,  289 => 84,  277 => 74,  266 => 71,  251 => 69,  247 => 68,  239 => 67,  236 => 66,  223 => 63,  206 => 61,  202 => 60,  192 => 59,  189 => 58,  187 => 57,  177 => 55,  162 => 53,  158 => 52,  150 => 51,  147 => 50,  145 => 49,  135 => 41,  124 => 36,  120 => 35,  114 => 34,  106 => 31,  101 => 28,  97 => 27,  91 => 23,  85 => 21,  79 => 19,  77 => 18,  70 => 17,  68 => 16,  56 => 7,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "catalogo.twig", "/opt/lampp/htdocs/GuriZone/templates/catalogo.twig");
    }
}
