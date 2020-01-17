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

/* producto.twig */
class __TwigTemplate_ae822b7ba49550d955a5bb0369cd498fc588b893070f713cc13c7d668da33d07 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "producto.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "        <div class=\"site-section\">
            <div class=\"justify-content-center gurizone-login p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <img src=\"..";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getFotoProd", [], "method", false, false, false, 7), "html", null, true);
        echo "\" alt=\"Image\" class=\"img-fluid w-75\">
                    </div>
                    <div class=\"col-md-6\">
                        <h2 class=\"text-black h1\">";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getModeloProd", [], "method", false, false, false, 10), "html", null, true);
        echo "</h2>
                        <p class=\"text-black h4\">";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getDescripcion", [], "method", false, false, false, 11), "html", null, true);
        echo "</p>
                        <hr class=\"bg-dark\">
                        <p class=\"text-black h4\">Fecha salida: ";
        // line 13
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getFechaSalida", [], "method", false, false, false, 13), "Y-m-d"), "html", null, true);
        echo "</p>
                        <p><strong class=\"text-primary h4\">Precio: ";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getPrecioUnidad", [], "method", false, false, false, 14), "html", null, true);
        echo "€</strong></p>
                        <p><strong class=\"text-primary h4\">Talla: ";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getTalla", [], "method", false, false, false, 15), "html", null, true);
        echo "</strong></p>
                        <p><strong class=\"text-primary h4\">Stock: ";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getStockProd", [], "method", false, false, false, 16), "html", null, true);
        echo "</strong></p>
                        <p><a href=\"#\" class=\"buy-now btn btn-sm btn-primary\">Add To Cart</a></p>
                        ";
        // line 18
        if (((($context["usuario"] ?? null) == "admin") && (($context["producto_de_empleado"] ?? null) == true))) {
            // line 19
            echo "                        <p><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "editarProducto", 2 => ["id" => twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getIdProd", [], "method", false, false, false, 19)]], "method", false, false, false, 19), "html", null, true);
            echo "\" class=\"buy-now btn btn-sm btn-primary\">EDITAR</a></p>
                        ";
        }
        // line 21
        echo "                    </div>
                </div>
            </div>
        </div>
";
    }

    public function getTemplateName()
    {
        return "producto.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 21,  90 => 19,  88 => 18,  83 => 16,  79 => 15,  75 => 14,  71 => 13,  66 => 11,  62 => 10,  56 => 7,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "producto.twig", "/opt/lampp/htdocs/GuriZone/templates/producto.twig");
    }
}
