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

/* perfil.twig */
class __TwigTemplate_93bc2f6cf2d59372e273d513cde8475e31901e47977f4d0599fd8c7b0414e89e extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "perfil.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"site-section\">
        <div class=\"justify-content-center gurizone-login p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5\">
            <div class=\"row\">
                <div class=\"col-12 text-center\">
                    <div>
                        <img src=\"../imgs/default_profile.jpg\" width=\"100px\">
                    </div>
                    <div class=\"container mt-3\">
                        <form>
                            <div class=\"custom-file\">
                                <input type=\"file\" class=\"custom-file-input\" id=\"customFile\">
                                <label class=\"custom-file-label\" for=\"customFile\">Choose file</label>
                                <input type=\"button\" value=\"Actualizar foto\" class=\"btn btn-primary mt-3 mb-3\">
                            </div>
                        </form>
                    </div>
                    <hr/>
                </div>
                <div class=\"col-12\">
                    <h3 class=\"text-black text-center\">NOMBRE</h3>
                    <div class=\"container\">
                        <p>Usuario: ";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "nombre", [], "any", false, false, false, 24), "html", null, true);
        echo "</p>
                        <p>Email: ";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 25), "html", null, true);
        echo "</p>
                    </div>
                    <div class=\"container\">
                        <a href=\"#\" class=\"btn btn-primary\">Editar perfil</a>
                    </div>
                    ";
        // line 30
        if ((($context["usuario"] ?? null) == "empleado")) {
            // line 31
            echo "                    <div class=\"container mt-3\">
                        <a href=\"";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "crearProducto"], "method", false, false, false, 32), "html", null, true);
            echo "\" class=\"btn btn-primary\">Crear producto</a>
                    </div>
                    <div class=\"container mt-3\">
                        <a href=\"";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 35), "html", null, true);
            echo "\" class=\"btn btn-primary\">Gestionar productos</a>
                    </div>
                    ";
        }
        // line 38
        echo "                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "perfil.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 38,  96 => 35,  90 => 32,  87 => 31,  85 => 30,  77 => 25,  73 => 24,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "perfil.twig", "/opt/lampp/htdocs/GuriZone/templates/perfil.twig");
    }
}
