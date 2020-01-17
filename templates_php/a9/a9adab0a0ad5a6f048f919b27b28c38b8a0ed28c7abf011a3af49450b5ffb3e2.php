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

/* registrarse.twig */
class __TwigTemplate_b26632adf89372b15fa554ff19e3ea81c8cfd43a51e775d85e9c43b63237c530 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "registrarse.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"container\">
        <div class=\"justify-content-center gurizone-login p-lg-4 m-lg-5 p-md-4 m-md-3 p-sm-4 m-sm-5\">
            <h1 class=\"text-center\">Crear cuenta</h1>
            ";
        // line 6
        if ((($context["error"] ?? null) != "")) {
            // line 7
            echo "                <p class=\"\" style=\"color: red\">";
            echo twig_escape_filter($this->env, ($context["error"] ?? null), "html", null, true);
            echo "</p>
            ";
        }
        // line 9
        echo "            <form action=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "registrarse"], "method", false, false, false, 9), "html", null, true);
        echo "\" method=\"post\">
                <div class=\"form-group\">
                    ";
        // line 11
        if (twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "nombre", [], "any", true, true, false, 11)) {
            // line 12
            echo "                    <p class=\"text-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "nombre", [], "any", false, false, false, 12), "html", null, true);
            echo "</p>
                    ";
        }
        // line 14
        echo "                    <label for=\"nombre\" class=\"text-black\">Nombre:</label>
                    <input type=\"text\" class=\"form-control\" id=\"nombre\" placeholder=\"\" name=\"nombre\">
                </div>
                <div class=\"form-group\">
                    ";
        // line 18
        if (twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "apellido", [], "any", true, true, false, 18)) {
            // line 19
            echo "                        <p class=\"text-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "apellido", [], "any", false, false, false, 19), "html", null, true);
            echo "</p>
                    ";
        }
        // line 21
        echo "                    <label for=\"apellidos\" class=\"text-black\">Apellidos:</label>
                    <input type=\"text\" class=\"form-control\" id=\"apellidos\" placeholder=\"\" name=\"apellido\">
                </div>
                <div class=\"form-group\">
                    ";
        // line 25
        if (twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "email", [], "any", true, true, false, 25)) {
            // line 26
            echo "                        <p class=\"text-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "email", [], "any", false, false, false, 26), "html", null, true);
            echo "</p>
                    ";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 27
($context["errores"] ?? null), "email_no_valido", [], "any", true, true, false, 27)) {
            // line 28
            echo "                        <p class=\"text-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "email_no_valido", [], "any", false, false, false, 28), "html", null, true);
            echo "</p>
                    ";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 29
($context["errores"] ?? null), "email_registrado", [], "any", true, true, false, 29)) {
            // line 30
            echo "                        <p class=\"text-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "email_registrado", [], "any", false, false, false, 30), "html", null, true);
            echo "</p>
                    ";
        }
        // line 32
        echo "                    <label for=\"email\" class=\"text-black\">Email:</label>
                    <input type=\"email\" class=\"form-control\" id=\"email\" placeholder=\"\" name=\"email\">
                </div>
                <div class=\"form-group\">
                    ";
        // line 36
        if (twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "password", [], "any", true, true, false, 36)) {
            // line 37
            echo "                        <p class=\"text-danger\">Por favor, introduzca una contraseña</p>
                    ";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 38
($context["errores"] ?? null), "pass_corta", [], "any", true, true, false, 38)) {
            // line 39
            echo "                        <p class=\"text-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "pass_corta", [], "any", false, false, false, 39), "html", null, true);
            echo "</p>
                    ";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 40
($context["errores"] ?? null), "pass_no_igual", [], "any", true, true, false, 40)) {
            // line 41
            echo "                        <p class=\"text-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "pass_no_igual", [], "any", false, false, false, 41), "html", null, true);
            echo "</p>
                    ";
        }
        // line 43
        echo "                    <label for=\"pwd\" class=\"text-black\">Contraseña:</label>
                    <input type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"Al menos 6 caracteres\" name=\"password\">
                </div>
                ";
        // line 46
        if (twig_get_attribute($this->env, $this->source, ($context["errores"] ?? null), "password", [], "any", true, true, false, 46)) {
            // line 47
            echo "                    <p class=\"text-danger\">Por favor, repita su contraseña</p>
                ";
        }
        // line 49
        echo "                <div class=\"form-group\">
                    <label for=\"pwd\" class=\"text-black\">Confirma tu contraseña:</label>
                    <input type=\"password\" class=\"form-control\" id=\"password_repeat\" placeholder=\"\" name=\"password_repeat\">
                </div>
                <div class=\"text-center mt-3\">
                    <button type=\"submit\" class=\"btn btn-primary\">Crear cuenta en GuriZone</button>
                </div>
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "registrarse.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 49,  152 => 47,  150 => 46,  145 => 43,  139 => 41,  137 => 40,  132 => 39,  130 => 38,  127 => 37,  125 => 36,  119 => 32,  113 => 30,  111 => 29,  106 => 28,  104 => 27,  99 => 26,  97 => 25,  91 => 21,  85 => 19,  83 => 18,  77 => 14,  71 => 12,  69 => 11,  63 => 9,  57 => 7,  55 => 6,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "registrarse.twig", "/opt/lampp/htdocs/GuriZone/templates/registrarse.twig");
    }
}
