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

/* borrar_usuario.twig */
class __TwigTemplate_d602f0cc299b815d2296dcfd844831c5e112cb0af18d9a4bf6c641e33e8e79e2 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "borrar_usuario.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"site-section\">
        <div class=\"justify-content-center gurizone-login p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5\">
            <h3 class=\"text-center\">¿ESTAS SEGURO DE QUE QUIERES BORRAR EL USUARIO?</h3>
            <form action=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "borrarUsuario", 2 => ["id" => ($context["id"] ?? null)]], "method", false, false, false, 6), "html", null, true);
        echo "\" method=\"post\">
                <div class=\"mt-5 ml-5\">
                    <input type=\"hidden\" name=\"borrar\" value=\"true\">
                    <input type=\"submit\" value=\"Si\" class=\"btn btn-primary w-25\">
                    <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionUsuarios"], "method", false, false, false, 10), "html", null, true);
        echo "\"><button type=\"button\" class=\"btn btn-danger w-25 float-right mr-5\">No</button></a>
                </div>
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "borrar_usuario.twig";
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
        return new Source("", "borrar_usuario.twig", "/opt/lampp/htdocs/GuriZone/templates/borrar_usuario.twig");
    }
}
