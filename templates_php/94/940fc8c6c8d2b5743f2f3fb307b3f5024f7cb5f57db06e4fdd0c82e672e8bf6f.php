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

/* index.twig */
class __TwigTemplate_d93358871566800dd683ee515c5b8824eddf66ed27949d007f85b6feda23f252 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"justify-content-center gurizone-inicio p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5\">
        <div class=\"site-section site-blocks-2\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0\" data-aos=\"fade\" data-aos-delay=\"\">
                        <a class=\"block-2-item\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 8), "html", null, true);
        echo "?categoria=accesorios&page=1\">
                            <figure class=\"image\">
                                <img src=\"../imgs/backgrounds/accesorios.jpg\" alt=\"\" class=\"img-fluid\">
                            </figure>
                            <div class=\"text\">
                                <span class=\"text-uppercase\">Catálogo</span>
                                <h3>Accesorios</h3>
                            </div>
                        </a>
                    </div>
                    <div class=\"col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0\" data-aos=\"fade\" data-aos-delay=\"100\">
                        <a class=\"block-2-item\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 19), "html", null, true);
        echo "?categoria=ropa&page=1\">
                            <figure class=\"image\">
                                <img src=\"../imgs/backgrounds/ropa.jpg\" alt=\"\" class=\"img-fluid\">
                            </figure>
                            <div class=\"text\">
                                <span class=\"text-uppercase\">Catálogo</span>
                                <h3>Ropa</h3>
                            </div>
                        </a>
                    </div>
                    <div class=\"col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0\" data-aos=\"fade\" data-aos-delay=\"200\">
                        <a class=\"block-2-item\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "catalogo"], "method", false, false, false, 30), "html", null, true);
        echo "?categoria=zapatillas&page=1\">
                            <figure class=\"image\">
                                <img src=\"../imgs/backgrounds/zapatillas.jpg\" alt=\"\" class=\"img-fluid\">
                            </figure>
                            <div class=\"text\">
                                <span class=\"text-uppercase\">Catálogo</span>
                                <h3>Zapatillas</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--INICIO TOP TREANDING-->
    <div class=\"justify-content-center gurizone-inicio p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5\">
        <div class=\"site-section block-3 site-blocks-2\">
            <div class=\"container\">
                <div class=\"row justify-content-center\">
                    <div class=\"col-md-7 site-section-heading text-center pt-4\">
                        <h2>MÁS VENDIDOS</h2>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <div class=\"nonloop-block-3 owl-carousel\">
                            ";
        // line 57
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["productosTT"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["producto"]) {
            // line 58
            echo "                            <div class=\"item\">
                                <a href=\"";
            // line 59
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "mostrarProducto", 2 => ["id" => twig_get_attribute($this->env, $this->source, $context["producto"], "getIdProd", [], "any", false, false, false, 59)]], "method", false, false, false, 59), "html", null, true);
            echo "\" class=\"block-6\">
                                    <div class=\"block-4 text-center shadow\">
                                        <figure class=\"block-4-image\">
                                            <img src=\"../";
            // line 62
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getFotoProd", [], "any", false, false, false, 62), "html", null, true);
            echo "\" alt=\"Image placeholder\" class=\"img-fluid\">
                                        </figure>
                                        <div class=\"block-4-text p-4\">
                                            <h3><a href=\"";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "mostrarProducto", 2 => ["id" => twig_get_attribute($this->env, $this->source, $context["producto"], "getIdProd", [], "any", false, false, false, 65)]], "method", false, false, false, 65), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getModeloProd", [], "any", false, false, false, 65), "html", null, true);
            echo "</a></h3>
                                            <p class=\"mb-0\">";
            // line 66
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getNumVentas", [], "any", false, false, false, 66), "html", null, true);
            echo " vendidos</p>
                                            <p class=\"text-primary font-weight-bold\">";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getPrecioUnidad", [], "any", false, false, false, 67), "html", null, true);
            echo "€</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['producto'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FIN TOP TREANDING-->

    <!--INICIO NOVEDADES-->
    <div class=\"justify-content-center gurizone-inicio p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5\">
        <div class=\"site-section block-3 site-blocks-2\">
            <div class=\"container\">
                <div class=\"row justify-content-center\">
                    <div class=\"col-md-7 site-section-heading text-center pt-4\">
                        <h2>NOVEDADES</h2>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <div class=\"nonloop-block-3 owl-carousel\">
                            ";
        // line 93
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["novedades"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["producto"]) {
            // line 94
            echo "                            <div class=\"item\">
                                <a href=\"";
            // line 95
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "mostrarProducto", 2 => ["id" => twig_get_attribute($this->env, $this->source, $context["producto"], "getIdProd", [], "any", false, false, false, 95)]], "method", false, false, false, 95), "html", null, true);
            echo "\" class=\"block-6\">
                                    <div class=\"block-4 text-center shadow\">
                                        <figure class=\"block-4-image\">
                                            <img src=\"../";
            // line 98
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getFotoProd", [], "any", false, false, false, 98), "html", null, true);
            echo "\" alt=\"Image placeholder\" class=\"img-fluid\">
                                        </figure>
                                        <div class=\"block-4-text p-4\">
                                            <h3><a href=\"";
            // line 101
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "mostrarProducto", 2 => ["id" => twig_get_attribute($this->env, $this->source, $context["producto"], "getIdProd", [], "any", false, false, false, 101)]], "method", false, false, false, 101), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getModeloProd", [], "any", false, false, false, 101), "html", null, true);
            echo "</a></h3>
                                            <p class=\"mb-0\">";
            // line 102
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getNumVentas", [], "any", false, false, false, 102), "html", null, true);
            echo " vendidos</p>
                                            <p class=\"text-primary font-weight-bold\">";
            // line 103
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getPrecioUnidad", [], "any", false, false, false, 103), "html", null, true);
            echo "€</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['producto'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 109
        echo "                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FIN TOP NOVEDADES-->
";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  219 => 109,  207 => 103,  203 => 102,  197 => 101,  191 => 98,  185 => 95,  182 => 94,  178 => 93,  156 => 73,  144 => 67,  140 => 66,  134 => 65,  128 => 62,  122 => 59,  119 => 58,  115 => 57,  85 => 30,  71 => 19,  57 => 8,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index.twig", "/opt/lampp/htdocs/GuriZone/templates/index.twig");
    }
}
