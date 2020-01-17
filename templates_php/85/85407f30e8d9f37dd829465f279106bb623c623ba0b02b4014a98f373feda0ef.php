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

/* borrar_producto.twig */
class __TwigTemplate_407f3aaba2ca8b472aad78fae2f85970ded86f8eac022354a43975ae17c61383 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "borrar_producto.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"site-section\">
        <div class=\"justify-content-center gurizone-login p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5\">
            <h3 class=\"text-center\">¿ESTAS SEGURO DE QUE QUIERES BORRAR EL PRODUCTO?</h3>
            <form action=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "borrarProducto", 2 => ["id" => ($context["id"] ?? null)]], "method", false, false, false, 6), "html", null, true);
        echo "\" method=\"post\">
                <div class=\"mt-5 ml-5\">
                    <input type=\"hidden\" name=\"borrar\" value=\"true\">
                    <input type=\"submit\" value=\"Si\" class=\"btn btn-primary w-25\">
                    <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 10), "html", null, true);
        echo "\"><button type=\"button\" class=\"btn btn-danger w-25 float-right mr-5\">No</button></a>
                </div>
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "borrar_producto.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 10,  55 => 6,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "borrar_producto.twig", "/opt/lampp/htdocs/GuriZone/templates/borrar_producto.twig");
    }
}
