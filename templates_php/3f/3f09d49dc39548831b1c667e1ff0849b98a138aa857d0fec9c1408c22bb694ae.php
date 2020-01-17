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

/* gestion_productos.twig */
class __TwigTemplate_53ed4e40b289775e77121de69f492f90e559662d42cc88a7e209413a6494890b extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "gestion_productos.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"\">
        <div class=\"justify-content-center gurizone-login p-lg-3 m-lg-2 p-md-4 m-md-3 p-sm-4 m-sm-5 table-bordered\">
            <div class=\"row\">
                <div class=\"col-lg-6 col-md-12 col-sm-12 border p-4 rounded mb-4 ml-3\">
                    <!--FILTRO CATEGORIA-->
                    <div class=\"btn-group mr-1 ml-md-auto float-right\">
                        <button type=\"button\" class=\"btn btn-secondary btn-sm dropdown-toggle\" id=\"dropdownMenuReference\" data-toggle=\"dropdown\">Filtrar por Categoria</button>
                        <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuReference\">
                            <a class=\"dropdown-item\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 11), "html", null, true);
        echo "?categoria=todo&page=1\">Todo</a>
                            <a class=\"dropdown-item\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 12), "html", null, true);
        echo "?categoria=accesorios&page=1\">Accesorios</a>
                            <a class=\"dropdown-item\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 13), "html", null, true);
        echo "?categoria=ropa&page=1\">Ropa</a>
                            <a class=\"dropdown-item\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 14), "html", null, true);
        echo "?categoria=zapatillas&page=1\">Zapatillas</a>
                        </div>
                    </div>
                    <!--FIN FILTRO CATEGORIA-->
                    <!--FILTRO FECHA-->
                    <div>
                        <div class=\"mt-4\">
                            <h3 class=\"mb-3 h6 text-uppercase text-black d-block\">Filtrar por fecha</h3>
                            <form action=\"";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 22), "html", null, true);
        echo "\" method=\"get\">
                                <label for=\"fecha_inicial\" class=\"d-flex text-black\">Fecha Inicial</label>
                                <input type=\"date\" id=\"fecha_inicial\" name=\"fecha_inicial\" class=\"mr-2 mt-1 form-control\">
                                <label for=\"fecha_final\" class=\"d-flex text-black\">Fecha Final</label>
                                <input type=\"date\" id=\"fecha_final\" class=\"mr-2 mt-1 form-control\" name=\"fecha_final\">
                                <input type=\"submit\" value=\"Filtrar\" class=\"btn btn-primary mt-3\">
                            </form>
                        </div>
                    </div>
                    <!--FIN FILTRO FECHA-->
                </div>
            </div>
            <!--FILTRO TABLA PRODUCTOS-->
            <div class=\"table-responsive\">
                <table class=\"table table-hover table-sm table-responsive-sm table-responsive-md\">
                    <thead class=\"thead-dark sticky-top\">
                    <tr>
                        <th scope=\"col\">#</th>
                        <th scope=\"col\">MODELO</th>
                        <th scope=\"col\">CREADO POR</th>
                        <th scope=\"col\">MARCA</th>
                        <th scope=\"col\">CATEGORIA</th>
                        <th scope=\"col\">SUBCATEGORIA</th>
                        <th scope=\"col\">COLOR</th>
                        <th scope=\"col\">TALLA</th>
                        <th scope=\"col\">STOCK</th>
                        <th scope=\"col\">VENTAS</th>
                        <th scope=\"col\">FECHA</th>
                        <th scope=\"col\">PRECIO</th>
                        <th scope=\"col\">URL FOTO</th>
                        <th scope=\"col\">DESCRIPCION</th>
                        <th scope=\"col\">ESTADO</th>
                        <th scope=\"col\">ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getProductos", [], "any", false, false, false, 58));
        foreach ($context['_seq'] as $context["_key"] => $context["producto"]) {
            // line 59
            echo "                        <tr>
                            <td><a href=\"";
            // line 60
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "mostrarProducto", 2 => ["id" => twig_get_attribute($this->env, $this->source, $context["producto"], "getIdProd", [], "any", false, false, false, 60)]], "method", false, false, false, 60), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getIdProd", [], "any", false, false, false, 60), "html", null, true);
            echo "</a></td>
                            <td>";
            // line 61
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getModeloProd", [], "any", false, false, false, 61), "html", null, true);
            echo "</td>
                            <td>";
            // line 62
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getIdEmpleado", [], "any", false, false, false, 62), "html", null, true);
            echo "</td>
                            <td>";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getMarcaProd", [], "any", false, false, false, 63), "html", null, true);
            echo "</td>
                            <td>";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getCategoriaProd", [], "any", false, false, false, 64), "html", null, true);
            echo "</td>
                            <td>";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getSubcategoriaProd", [], "any", false, false, false, 65), "html", null, true);
            echo "</td>
                            <td>";
            // line 66
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getColor", [], "any", false, false, false, 66), "html", null, true);
            echo "(";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getColorDisp", [], "any", false, false, false, 66), "html", null, true);
            echo ")</td>
                            <td>";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getTalla", [], "any", false, false, false, 67), "html", null, true);
            echo "(";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getTallaDisp", [], "any", false, false, false, 67), "html", null, true);
            echo ")</td>
                            <td>";
            // line 68
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getStockProd", [], "any", false, false, false, 68), "html", null, true);
            echo "</td>
                            <td>";
            // line 69
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getNumVentas", [], "any", false, false, false, 69), "html", null, true);
            echo "</td>
                            <td>";
            // line 70
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getFechaSalida", [], "method", false, false, false, 70), "Y-m-d"), "html", null, true);
            echo "</td>
                            <td>";
            // line 71
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getPrecioUnidad", [], "any", false, false, false, 71), "html", null, true);
            echo "</td>
                            <td>";
            // line 72
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getFotoProd", [], "any", false, false, false, 72), "html", null, true);
            echo "</td>
                            <td class=\"cut\">";
            // line 73
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["producto"], "getDescripcion", [], "any", false, false, false, 73), "html", null, true);
            echo "</td>
                            <td>";
            // line 74
            echo (((twig_get_attribute($this->env, $this->source, $context["producto"], "getDescatalogado", [], "any", false, false, false, 74) == 0)) ? ("Activo") : ("Desactivado"));
            echo "</td>
                            <td>
                                <div>
                                    <a href=\"";
            // line 77
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "editarProducto", 2 => ["id" => twig_get_attribute($this->env, $this->source, $context["producto"], "getIdProd", [], "any", false, false, false, 77)]], "method", false, false, false, 77), "html", null, true);
            echo "\"><button type=\"button\" class=\"btn btn-primary mb-3\">Editar</button></a>
                                </div>
                                <div>
                                    <a href=\"";
            // line 80
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Producto", 1 => "borrarProducto", 2 => ["id" => twig_get_attribute($this->env, $this->source, $context["producto"], "getIdProd", [], "any", false, false, false, 80)]], "method", false, false, false, 80), "html", null, true);
            echo "\"><input type=\"button\" class=\"btn btn-danger\" value=\"Eliminar\"></a>
                                </div>
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['producto'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        echo "                    </tbody>
                </table>
            </div>
            <!--FIN FILTRO TABLA PRODUCTOS-->

            <!--PAGINACION: segun el filtro solicitado mostrara una paginacion u otra-->
            <div class=\"row\" data-aos=\"fade-up\">
                <div class=\"col-md-12 text-center\">
                    <div class=\"site-block-27\">
                        ";
        // line 94
        if (( !(null === ($context["fecha_inicial"] ?? null)) &&  !(null === ($context["fecha_final"] ?? null)))) {
            // line 95
            echo "                        <ul>
                            <li><a href=\"";
            // line 96
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 96), "html", null, true);
            echo "?fecha_inicial=";
            echo twig_escape_filter($this->env, ($context["fecha_inicial"] ?? null), "html", null, true);
            echo "&fecha_final=";
            echo twig_escape_filter($this->env, ($context["fecha_final"] ?? null), "html", null, true);
            echo "?>&page=";
            (((($context["pagina"] ?? null) <= 0)) ? (print (twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 96) - 1), "html", null, true))) : (print ("1")));
            echo "\"><</a></li>
                            ";
            // line 97
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getNumPaginas", [], "any", false, false, false, 97)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 98
                echo "                            <li><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 98), "html", null, true);
                echo "?fecha_inicial=";
                echo twig_escape_filter($this->env, ($context["fecha_inicial"] ?? null), "html", null, true);
                echo "&fecha_final=";
                echo twig_escape_filter($this->env, ($context["fecha_final"] ?? null), "html", null, true);
                echo "&page=";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "\"><span>";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "</span></a></li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 100
            echo "                            <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 100), "html", null, true);
            echo "?fecha_inicial=";
            echo twig_escape_filter($this->env, ($context["fecha_inicial"] ?? null), "html", null, true);
            echo "&fecha_final=";
            echo twig_escape_filter($this->env, ($context["fecha_final"] ?? null), "html", null, true);
            echo "&page=";
            (((twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 100) >= twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getNumPaginas", [], "any", false, false, false, 100))) ? (print ("1")) : (print (twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 100) + 1), "html", null, true))));
            echo "\">&gt;</a></li>
                        </ul>
                        ";
        } else {
            // line 103
            echo "                        <ul>
                            <li><a href=\"";
            // line 104
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 104), "html", null, true);
            echo "?categoria=";
            echo twig_escape_filter($this->env, ($context["categoria"] ?? null), "html", null, true);
            echo "&page=";
            (((($context["pagina"] ?? null) <= 0)) ? (print (twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 104) - 1), "html", null, true))) : (print ("1")));
            echo "\"><</a></li>
                            ";
            // line 105
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getNumPaginas", [], "any", false, false, false, 105)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 106
                echo "                            <li><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 106), "html", null, true);
                echo "?categoria=";
                echo twig_escape_filter($this->env, ($context["categoria"] ?? null), "html", null, true);
                echo "&page=";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "\"><span>";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "</span></a></li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            echo "                            <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionProductos"], "method", false, false, false, 108), "html", null, true);
            echo "?categoria=";
            echo twig_escape_filter($this->env, ($context["categoria"] ?? null), "html", null, true);
            echo "&page=";
            (((twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 108) >= twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getNumPaginas", [], "any", false, false, false, 108))) ? (print ("1")) : (print (twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 108) + 1), "html", null, true))));
            echo "\">&gt;</a></li>
                        </ul>
                        ";
        }
        // line 111
        echo "                    </div>
                </div>
                <!--FIN PAGINACION-->
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "gestion_productos.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  315 => 111,  304 => 108,  289 => 106,  285 => 105,  277 => 104,  274 => 103,  261 => 100,  244 => 98,  240 => 97,  230 => 96,  227 => 95,  225 => 94,  214 => 85,  203 => 80,  197 => 77,  191 => 74,  187 => 73,  183 => 72,  179 => 71,  175 => 70,  171 => 69,  167 => 68,  161 => 67,  155 => 66,  151 => 65,  147 => 64,  143 => 63,  139 => 62,  135 => 61,  129 => 60,  126 => 59,  122 => 58,  83 => 22,  72 => 14,  68 => 13,  64 => 12,  60 => 11,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "gestion_productos.twig", "/opt/lampp/htdocs/GuriZone/templates/gestion_productos.twig");
    }
}
