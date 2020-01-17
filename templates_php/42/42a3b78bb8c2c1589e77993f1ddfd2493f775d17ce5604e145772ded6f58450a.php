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

/* contactus.twig */
class __TwigTemplate_bcbdecacd3ba8bf470e83cce66ea1dd6d072ed8631d97a09e162009ca43aa5b0 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "contactus.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"container\">
        <div class=\"row gurizone-contact m-5 p-3\">
            <div class=\"col-md-12\">
                <h2 class=\"h3 mb-3 text-black\">¡Pregunta sobre cualquier duda!</h2>
            </div>
            <div class=\"col-md-12 justify-content-center\">
                <form action=\"#\" method=\"post\">

                    <div class=\"p-3 p-lg-5\">
                        <div class=\"form-group row\">
                            <div class=\"col-md-6\">
                                <label for=\"c_fname\" class=\"text-black\">Nombre <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_fname\" name=\"c_fname\">
                            </div>
                            <div class=\"col-md-6\">
                                <label for=\"c_lname\" class=\"text-black\">Apellidos <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_lname\" name=\"c_lname\">
                            </div>
                        </div>
                        <div class=\"form-group row\">
                            <div class=\"col-md-12\">
                                <label for=\"c_email\" class=\"text-black\">Email <span class=\"text-danger\">*</span></label>
                                <input type=\"email\" class=\"form-control\" id=\"c_email\" name=\"c_email\" placeholder=\"\">
                            </div>
                        </div>
                        <div class=\"form-group row\">
                            <div class=\"col-md-12\">
                                <label for=\"c_subject\" class=\"text-black\">Asunto </label>
                                <input type=\"text\" class=\"form-control\" id=\"c_subject\" name=\"c_subject\">
                            </div>
                        </div>

                        <div class=\"form-group row\">
                            <div class=\"col-md-12\">
                                <label for=\"c_message\" class=\"text-black\">Mensaje </label>
                                <textarea name=\"c_message\" id=\"c_message\" cols=\"30\" rows=\"7\" class=\"form-control\"></textarea>
                            </div>
                        </div>
                        <div class=\"form-group row\">
                            <div class=\"col-lg-12\">
                                <input type=\"submit\" class=\"btn btn-primary btn-lg btn-block\" value=\"Enviar mensaje\">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "contactus.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "contactus.twig", "/opt/lampp/htdocs/GuriZone/templates/contactus.twig");
    }
}
