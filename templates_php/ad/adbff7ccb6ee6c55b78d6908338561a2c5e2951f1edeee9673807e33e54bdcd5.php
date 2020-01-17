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

/* login.twig */
class __TwigTemplate_115e49da9edb9dd0b146941471a01a18443430fc9be8d36b335bd52392c80f79 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "login.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"container\">
        <div class=\"justify-content-center gurizone-login p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5\">
            <h1 class=\"text-center\">Iniciar sesión</h1>
            <form action=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "login"], "method", false, false, false, 6), "html", null, true);
        echo "\" method=\"post\">
                <div class=\"form-group\">
                    ";
        // line 8
        if (twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "requerido_email", [], "any", true, true, false, 8)) {
            // line 9
            echo "                    <p class=\"text-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "requerido_email", [], "any", false, false, false, 9), "html", null, true);
            echo "</p>
                    ";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 10
($context["errores"] ?? null), "email_no_valido", [], "any", true, true, false, 10)) {
            // line 11
            echo "                    <p class=\"text-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "email_no_valido", [], "any", false, false, false, 11), "html", null, true);
            echo "</p>
                    ";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 12
($context["errores"] ?? null), "formato_email", [], "any", true, true, false, 12)) {
            // line 13
            echo "                    <p class=\"text-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "formato_email", [], "any", false, false, false, 13), "html", null, true);
            echo "</p>
                    ";
        }
        // line 15
        echo "                    <label for=\"email\" class=\"text-black\">Email:</label>
                    <input type=\"email\" class=\"form-control\" id=\"email\" placeholder=\"\" name=\"email\">
                </div>
                <div class=\"form-group\">
                    ";
        // line 19
        if (((twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "requerido_pass", [], "any", true, true, false, 19) &&  !twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "email_no_valido", [], "any", true, true, false, 19)) &&  !twig_get_attribute($this->env, $this->source,         // line 20
($context["errores"] ?? null), "formato_email", [], "any", true, true, false, 20))) {
            // line 21
            echo "                    <p class=\"text-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "requerido_pass", [], "any", false, false, false, 21), "html", null, true);
            echo "</p>
                    ";
        } elseif (((twig_get_attribute($this->env, $this->source,         // line 22
($context["errores"] ?? null), "pass_no_valido", [], "any", true, true, false, 22) &&  !twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "email_no_valido", [], "any", true, true, false, 22)) &&  !twig_get_attribute($this->env, $this->source,         // line 23
($context["errores"] ?? null), "formato_email", [], "any", true, true, false, 23))) {
            // line 24
            echo "                    <p class=\"text-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "pass_no_valido", [], "any", false, false, false, 24), "html", null, true);
            echo "</p>
                    ";
        }
        // line 26
        echo "                    <label for=\"pwd\" class=\"text-black\">Contraseña:</label>
                    <input type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"\" name=\"password\">
                </div>
                <div class=\"text-center mt-3\">
                    <button type=\"submit\" class=\"btn btn-primary\">Iniciar sesión</button>
                </div>
                <hr/>
                <div>
                    <p class=\"text-center\">¿Eres nuevo en GuriZone?</p>
                </div>
                <div class=\"text-center\">
                    <a href=\"";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "registrarse"], "method", false, false, false, 37), "html", null, true);
        echo "\"><button type=\"button\" class=\"btn btn-secondary\">Crear tu cuenta en GuriZone</button></a>
                </div>
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 37,  105 => 26,  99 => 24,  97 => 23,  96 => 22,  91 => 21,  89 => 20,  88 => 19,  82 => 15,  76 => 13,  74 => 12,  69 => 11,  67 => 10,  62 => 9,  60 => 8,  55 => 6,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "login.twig", "/opt/lampp/htdocs/GuriZone/templates/login.twig");
    }
}
