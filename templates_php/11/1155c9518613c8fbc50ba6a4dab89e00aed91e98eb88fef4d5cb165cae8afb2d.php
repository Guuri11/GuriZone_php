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

/* crear_producto.twig */
class __TwigTemplate_327c4c138b353e93954843abb05151b8c76d7889c28b2600621fef76ae40c58f extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "crear_producto.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"container\">
        <div class=\"justify-content-center gurizone-crear p-lg-4 m-lg-3 p-md-4 m-md-3 p-sm-4 m-sm-5\">
            <h1 class=\"text-center text-black-50\">CREAR PRODUCTO</h1>
            <!-- RESOLUCION=DEL UPDATE-->
            ";
        // line 7
        if (( !($context["errores"] ?? null) == "")) {
            // line 8
            echo "            <h3 class=\"text-danger text-center\">Error en la inserción del producto!</h3>
                ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errores"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 10
                echo "                <h5 class=\"text-danger text-center\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</h5>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo "            ";
        } elseif (((($context["datos_enviados"] ?? null) == true) && twig_test_empty(($context["errores"] ?? null)))) {
            // line 13
            echo "            <h3 class=\"text-success text-center\">Inserción del producto realizada!</h3>
            ";
        }
        // line 15
        echo "            <!--FIN RESOLUCION DEL UPDATE-->

            <!--FORMULARIO-->
            <div class=\"col-md-12 justify-content-center\">
                <form action=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "crearProducto"], "method", false, false, false, 19), "html", null, true);
        echo "\" method=\"post\">
                    <div class=\"p-3 p-lg-5\">
                        <div class=\"form-group row\">
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">MODELO <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"modelo\" placeholder=\"\">
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">MARCA <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"marca\" placeholder=\"\">
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">CATEGORIA <span class=\"text-danger\">*</span></label>
                                <select class=\"custom-select\" name=\"categoria\" id=\"c_text\">
                                    <option selected value=\"1\">Accesorios</option>
                                    <option value=\"2\">Ropa</option>
                                    <option value=\"1\">Zapatillas</option>
                                </select>
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">SUBCATEGORIA<span class=\"text-danger\">*</span></label>
                                <select class=\"custom-select\" name=\"subcategoria\" id=\"c_text\">
                                    <option selected value=\"1\">Balones</option>
                                    <option value=\"2\">Tableros</option>
                                    <option value=\"3\">Varios</option>
                                    <option value=\"4\">CamisetasNBA</option>
                                    <option value=\"5\">Sudaderas</option>
                                    <option value=\"6\">Camisetas</option>
                                    <option value=\"7\">Caquetas</option>
                                    <option value=\"8\">Pantalones</option>
                                    <option value=\"9\">Jordan</option>
                                    <option value=\"10\">Nike</option>
                                    <option value=\"11\">Adidas</option>
                                </select>
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">COLOR<span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"color\" placeholder=\"\">
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">TALLA<span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"talla\" placeholder=\"\">
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">STOCK<span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"stock\" placeholder=\"\">
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">PRECIO <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"precio\" placeholder=\"\">
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">URL FOTO <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"urlfoto\" value=\"/imgs/productos/\">
                            </div>
                        </div>
                        <div class=\"col-md-12\">
                            <label for=\"c_text\" class=\"text-black\">ESTADO <span class=\"text-danger\">*</span></label>
                            <div>
                                <label class=\"radio-inline\"><input type=\"radio\" name=\"descatalogado\" checked value=\"0\">Dar alta</label>
                                <label class=\"radio-inline\"><input type=\"radio\" name=\"descatalogado\" value=\"1\">Dar baja</label>
                            </div>
                        </div>
                        <div class=\"form-group row\">
                            <div class=\"col-md-12\">
                                <label for=\"descripcion\" class=\"text-black\">DESCRIPCION </label>
                                <textarea name=\"descripcion\" id=\"descripcion\" cols=\"30\" rows=\"7\" class=\"form-control\"></textarea>
                            </div>
                        </div>
                        <div class=\"form-group row\">
                            <div class=\"col-lg-12\">
                                <input type=\"submit\" class=\"btn btn-primary btn-lg btn-block\" value=\"CREAR\">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--FIN FORMULARIO-->
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "crear_producto.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 19,  81 => 15,  77 => 13,  74 => 12,  65 => 10,  61 => 9,  58 => 8,  56 => 7,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "crear_producto.twig", "/opt/lampp/htdocs/GuriZone/templates/crear_producto.twig");
    }
}
