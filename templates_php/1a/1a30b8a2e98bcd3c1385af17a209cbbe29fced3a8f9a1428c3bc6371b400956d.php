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

/* editar_producto.twig */
class __TwigTemplate_ea2caeb086c176325f8d50a99d68fdf2bba5f66ea3ac0595ae6649711682ae73 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "editar_producto.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"container\">
        <div class=\"justify-content-center gurizone-crear p-lg-4 m-lg-3 p-md-4 m-md-3 p-sm-4 m-sm-5\">
            <h1 class=\"text-center text-black-50\">EDITAR PRODUCTO</h1>
            <!--RESOLUCION DEL UPDATE-->
            ";
        // line 7
        if (((($context["datos_enviados"] ?? null) == true) && twig_test_empty(($context["errores"] ?? null)))) {
            // line 8
            echo "            <h3 class=\"text-success text-center\">Actualización exitosa!</h3>
            ";
        } elseif (((        // line 9
($context["datos_enviados"] ?? null) == true) &&  !twig_test_empty(($context["errores"] ?? null)))) {
            // line 10
            echo "            <h3 class=\"text-danger text-center\">Error en la actualizacion!</h3>
                ";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errores"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 12
                echo "                <h5 class=\"text-danger text-center\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</h5>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "            ";
        }
        // line 15
        echo "            <!--FIN RESOLUCION DEL UPDATE-->

            <div class=\"col-md-12 justify-content-center\">
                <!--FORMULARIO-->
                <form action=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "editarProducto", 2 => ["id" => twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getIdProd", [], "any", false, false, false, 19)]], "method", false, false, false, 19), "html", null, true);
        echo "\" method=\"post\">
                    <div class=\"p-3 p-lg-5\">
                        <div class=\"form-group row\">
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">MODELO <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"modelo\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getModeloProd", [], "any", false, false, false, 24), "html", null, true);
        echo "\">
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">MARCA <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"marca\" placeholder=\"\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getMarcaProd", [], "method", false, false, false, 28), "html", null, true);
        echo "\">
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">CATEGORIA <span class=\"text-danger\">*</span></label>
                                <select class=\"custom-select\" name=\"categoria\" id=\"c_text\">
                                    <option value=\"1\" ";
        // line 33
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getCategoriaProd", [], "any", false, false, false, 33) == 1)) ? ("selected") : (""));
        echo ">Accesorios</option>
                                    <option value=\"2\" ";
        // line 34
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getCategoriaProd", [], "any", false, false, false, 34) == 2)) ? ("selected") : (""));
        echo ">Ropa</option>
                                    <option value=\"3\" ";
        // line 35
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getCategoriaProd", [], "any", false, false, false, 35) == 3)) ? ("selected") : (""));
        echo ">Zapatillas</option>
                                </select>
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">SUBCATEGORIA<span class=\"text-danger\">*</span></label>
                                <select class=\"custom-select\" name=\"subcategoria\" id=\"c_text\">
                                    <option value=\"1\" ";
        // line 41
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getSubcategoriaProd", [], "any", false, false, false, 41) == 1)) ? ("selected") : (""));
        echo ">Balones</option>
                                    <option value=\"2\" ";
        // line 42
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getSubcategoriaProd", [], "any", false, false, false, 42) == 2)) ? ("selected") : (""));
        echo ">Tableros</option>
                                    <option value=\"3\" ";
        // line 43
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getSubcategoriaProd", [], "any", false, false, false, 43) == 3)) ? ("selected") : (""));
        echo ">Varios</option>
                                    <option value=\"4\" ";
        // line 44
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getSubcategoriaProd", [], "any", false, false, false, 44) == 4)) ? ("selected") : (""));
        echo ">CamisetasNBA</option>
                                    <option value=\"5\" ";
        // line 45
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getSubcategoriaProd", [], "any", false, false, false, 45) == 5)) ? ("selected") : (""));
        echo ">Sudaderas</option>
                                    <option value=\"6\" ";
        // line 46
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getSubcategoriaProd", [], "any", false, false, false, 46) == 6)) ? ("selected") : (""));
        echo ">Camisetas</option>
                                    <option value=\"7\" ";
        // line 47
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getSubcategoriaProd", [], "any", false, false, false, 47) == 7)) ? ("selected") : (""));
        echo ">Caquetas</option>
                                    <option value=\"8\" ";
        // line 48
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getSubcategoriaProd", [], "any", false, false, false, 48) == 8)) ? ("selected") : (""));
        echo ">Pantalones</option>
                                    <option value=\"9\" ";
        // line 49
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getSubcategoriaProd", [], "any", false, false, false, 49) == 9)) ? ("selected") : (""));
        echo ">Jordan</option>
                                    <option value=\"10\" ";
        // line 50
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getSubcategoriaProd", [], "any", false, false, false, 50) == 10)) ? ("selected") : (""));
        echo ">Nike</option>
                                    <option value=\"11\" ";
        // line 51
        echo (((twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getSubcategoriaProd", [], "any", false, false, false, 51) == 11)) ? ("selected") : (""));
        echo ">Adidas</option>
                                </select>
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">COLOR<span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"color\" placeholder=\"\" value=\"";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getColor", [], "any", false, false, false, 56), "html", null, true);
        echo "\">
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">TALLA<span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"talla\" placeholder=\"\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getTalla", [], "any", false, false, false, 60), "html", null, true);
        echo "\">
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">STOCK<span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"stock\" placeholder=\"\" value=\"";
        // line 64
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getStockProd", [], "any", false, false, false, 64), "html", null, true);
        echo "\">
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">PRECIO <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"precio\" placeholder=\"\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getPrecioUnidad", [], "any", false, false, false, 68), "html", null, true);
        echo "\">
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">URL FOTO <span class=\"text-danger\">*</span></label>
                                <input type=\"text\" class=\"form-control\" id=\"c_text\" name=\"urlfoto\" placeholder=\"\" value=\"";
        // line 72
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getFotoProd", [], "any", false, false, false, 72), "html", null, true);
        echo "\">
                            </div>
                            <div class=\"col-md-12\">
                                <label for=\"c_text\" class=\"text-black\">ESTADO <span class=\"text-danger\">*</span></label>
                                <div>
                                    <label class=\"radio-inline\"><input type=\"radio\" name=\"descatalogado\" checked value=\"0\">Dar alta</label>
                                    <label class=\"radio-inline\"><input type=\"radio\" name=\"descatalogado\" value=\"1\">Dar baja</label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group row\">
                            <div class=\"col-md-12\">
                                <label for=\"descripcion\" class=\"text-black\">DESCRIPCION </label>
                                <textarea name=\"descripcion\" id=\"descripcion\" cols=\"30\" rows=\"7\" class=\"form-control\">";
        // line 85
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["producto"] ?? null), "getDescripcion", [], "any", false, false, false, 85), "html", null, true);
        echo "</textarea>
                            </div>
                        </div>
                        <div class=\"form-group row\">
                            <div class=\"col-lg-12\">
                                <input type=\"submit\" class=\"btn btn-primary btn-lg btn-block\" value=\"ACTUALIZAR\">
                            </div>
                        </div>
                    </div>
                </form>
                <!--FORMULARIO-->
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "editar_producto.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 85,  204 => 72,  197 => 68,  190 => 64,  183 => 60,  176 => 56,  168 => 51,  164 => 50,  160 => 49,  156 => 48,  152 => 47,  148 => 46,  144 => 45,  140 => 44,  136 => 43,  132 => 42,  128 => 41,  119 => 35,  115 => 34,  111 => 33,  103 => 28,  96 => 24,  88 => 19,  82 => 15,  79 => 14,  70 => 12,  66 => 11,  63 => 10,  61 => 9,  58 => 8,  56 => 7,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "editar_producto.twig", "/opt/lampp/htdocs/GuriZone/templates/editar_producto.twig");
    }
}
