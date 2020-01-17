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

/* dashboard.twig */
class __TwigTemplate_3b82090d4d679bb698c1969ae5dc4b3d0bcb1fea2be666ec67ff1db58e04abc8 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "dashboard.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"container\">
        <div class=\"justify-content-center gurizone-login p-lg-4 m-lg-3 p-md-4 m-md-3 p-sm-4 m-sm-5\">
            <h1 class=\"text-center text-black-50\">DASHBOARD</h1>
            <div class=\"row text-center\">
                <div class=\"col-12\">
                    <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "crearProducto"], "method", false, false, false, 8), "html", null, true);
        echo "\"><button type=\"button\" class=\"btn btn-dark w-75 mt-3 mb-3 p-2\">CREAR PRODUCTO</button></a>
                </div>
                <div class=\"col-12\">
                    <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "perfil"], "method", false, false, false, 11), "html", null, true);
        echo "\"><button type=\"button\" class=\"btn btn-dark w-75 mt-3 mb-3 p-2\">PERFIL</button></a>
                </div>
                <div class=\"col-12\">
                    <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 14), "html", null, true);
        echo "?page=1\"><button type=\"button\" class=\"btn btn-dark w-75 mt-3 mb-3 p-2\">GESTIONAR PRODUCTOS</button></a>
                </div>
                <div class=\"col-12\">
                    <a href=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionUsuarios"], "method", false, false, false, 17), "html", null, true);
        echo "?page=1\"><button type=\"button\" class=\"btn btn-dark w-75 mt-3 mb-3 p-2\">GESTIONAR USUARIOS</button></a>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 17,  69 => 14,  63 => 11,  57 => 8,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "dashboard.twig", "/opt/lampp/htdocs/GuriZone/templates/dashboard.twig");
    }
}
