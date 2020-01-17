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

/* gestion_usuarios.twig */
class __TwigTemplate_ea13359141a765499089959d1998042e914af6db8de73388a1ac3ce5ed319998 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "gestion_usuarios.twig", 1);
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
                <div class=\"col-lg-12 col-md-12 col-sm-12 p-4 mb-4 ml-3\">
                    <!--FILTRO ROL-->
                    <div class=\"btn-group mr-1 ml-md-auto float-right\">
                        <button type=\"button\" class=\"btn btn-secondary btn-sm dropdown-toggle\" id=\"dropdownMenuReference\" data-toggle=\"dropdown\">Filtrar por Categoria</button>
                        <div class=\"dropdown-menu fixed-top\" aria-labelledby=\"dropdownMenuReference\">
                            <a class=\"dropdown-item\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionUsuarios"], "method", false, false, false, 11), "html", null, true);
        echo "?rol=todo&page=1\">Todo</a>
                            <a class=\"dropdown-item\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionUsuarios"], "method", false, false, false, 12), "html", null, true);
        echo "?rol=usuario&page=1\">Clientes</a>
                            <a class=\"dropdown-item\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionUsuarios"], "method", false, false, false, 13), "html", null, true);
        echo "?rol=empleado&page=1\">Empleados</a>
                        </div>
                    </div>
                    <!--FIN FILTRO ROL-->
                </div>
            </div>
            ";
        // line 19
        if ((($context["confirmacion"] ?? null) != "")) {
            // line 20
            echo "                <div>
                    <h3 class=\"text-success text-center\">";
            // line 21
            echo twig_escape_filter($this->env, ($context["confirmacion"] ?? null), "html", null, true);
            echo "</h3>
                </div>
            ";
        } elseif ((        // line 23
($context["error"] ?? null) != "")) {
            // line 24
            echo "                <div>
                    <h3 class=\"text-danger text-center\">";
            // line 25
            echo twig_escape_filter($this->env, ($context["error"] ?? null), "html", null, true);
            echo "</h3>
                </div>
            ";
        }
        // line 28
        echo "            <!--FILTRO TABLA PRODUCTOS-->
            <div class=\"table-responsive\">
                <table class=\"table table-hover table-sm table-responsive-sm table-responsive-md\">
                    <thead class=\"thead-dark sticky-top\">
                    <tr class=\"text-center\">
                        <th scope=\"col\">#</th>
                        <th scope=\"col\">ROL</th>
                        <th scope=\"col\">NOMBRE</th>
                        <th scope=\"col\">APELLIDOS</th>
                        <th scope=\"col\">EMAIL</th>
                        <th scope=\"col\">CONTRASEÑA</th>
                        <th scope=\"col\">FOTO PERFIL</th>
                        <th scope=\"col\">ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getUsuarios", [], "any", false, false, false, 44));
        foreach ($context['_seq'] as $context["_key"] => $context["usuario"]) {
            // line 45
            echo "                        <tr>
                            <td class=\"text-center\"><a href=\"#\">";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "getIdCli", [], "any", false, false, false, 46), "html", null, true);
            echo "</a></td>
                            <td>
                                <form action=\"";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionUsuarios"], "method", false, false, false, 48), "html", null, true);
            echo "\" method=\"post\">
                                    <select class=\"form-control\" form=\"formUsuario_";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "getIdCLi", [], "any", false, false, false, 49), "html", null, true);
            echo "\" name=\"rol_seleccionado_";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "getIdCLi", [], "any", false, false, false, 49), "html", null, true);
            echo "\">
                                        <option value=\"";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "getIdCli", [], "any", false, false, false, 50), "html", null, true);
            echo "-1\" ";
            echo (((twig_get_attribute($this->env, $this->source, $context["usuario"], "getRol", [], "any", false, false, false, 50) == 1)) ? ("selected") : (""));
            echo ">Anonimo</option>
                                        <option value=\"";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "getIdCli", [], "any", false, false, false, 51), "html", null, true);
            echo "-2\" ";
            echo (((twig_get_attribute($this->env, $this->source, $context["usuario"], "getRol", [], "any", false, false, false, 51) == 2)) ? ("selected") : (""));
            echo ">Administrador</option>
                                        <option value=\"";
            // line 52
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "getIdCli", [], "any", false, false, false, 52), "html", null, true);
            echo "-3\" ";
            echo (((twig_get_attribute($this->env, $this->source, $context["usuario"], "getRol", [], "any", false, false, false, 52) == 3)) ? ("selected") : (""));
            echo ">Usuario normal</option>
                                        <option value=\"";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "getIdCli", [], "any", false, false, false, 53), "html", null, true);
            echo "-4\" ";
            echo (((twig_get_attribute($this->env, $this->source, $context["usuario"], "getRol", [], "any", false, false, false, 53) == 4)) ? ("selected") : (""));
            echo ">Empleado</option>
                                    </select>
                                </form>
                            </td>
                            <td>";
            // line 57
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "getNombre", [], "any", false, false, false, 57), "html", null, true);
            echo "</td>
                            <td>";
            // line 58
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "getApellidos", [], "any", false, false, false, 58), "html", null, true);
            echo "</td>
                            <td>";
            // line 59
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "getEmail", [], "any", false, false, false, 59), "html", null, true);
            echo "</td>
                            <td>";
            // line 60
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "getPassword", [], "any", false, false, false, 60), "html", null, true);
            echo "</td>
                            <td>";
            // line 61
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "getFotoPerfil", [], "any", false, false, false, 61), "html", null, true);
            echo "</td>
                            <td>
                                <div>
                                    <form action=\"";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionUsuarios"], "method", false, false, false, 64), "html", null, true);
            echo "\" method=\"post\" id=\"formUsuario_";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "getIdCli", [], "any", false, false, false, 64), "html", null, true);
            echo "\">
                                        <input type=\"submit\" class=\"btn btn-primary\" value=\"Actualizar\">
                                    </form>
                                </div>
                                <div>
                                    <a href=\"";
            // line 69
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "borrarUsuario", 2 => ["id" => twig_get_attribute($this->env, $this->source, $context["usuario"], "getIdCli", [], "any", false, false, false, 69)]], "method", false, false, false, 69), "html", null, true);
            echo "\"><input type=\"button\" class=\"btn btn-danger\" value=\"Eliminar\"></a>
                                </div>
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['usuario'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "                    </tbody>
                </table>
            </div>
            <!--FIN FILTRO TABLA PRODUCTOS-->

            <!--PAGINACION: segun el filtro solicitado mostrara una paginacion u otra-->
            <div class=\"row\" data-aos=\"fade-up\">
                <div class=\"col-md-12 text-center\">
                    <div class=\"site-block-27\">
                        <ul>
                            <li><a href=\"";
        // line 84
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionUsuarios"], "method", false, false, false, 84), "html", null, true);
        echo "?rol=";
        echo twig_escape_filter($this->env, ($context["rol"] ?? null), "html", null, true);
        echo "&page=";
        (((($context["pagina"] ?? null) <= 0)) ? (print (twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 84) - 1), "html", null, true))) : (print ("1")));
        echo "\"><</a></li>
                            ";
        // line 85
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getNumPaginas", [], "any", false, false, false, 85)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 86
            echo "                                <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionUsuarios"], "method", false, false, false, 86), "html", null, true);
            echo "?rol=";
            echo twig_escape_filter($this->env, ($context["rol"] ?? null), "html", null, true);
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
        // line 88
        echo "                            <li><a href=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["router"] ?? null), "generateURL", [0 => "Usuario", 1 => "gestionUsuarios"], "method", false, false, false, 88), "html", null, true);
        echo "?rol=";
        echo twig_escape_filter($this->env, ($context["rol"] ?? null), "html", null, true);
        echo "&page=";
        (((twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 88) >= twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getNumPaginas", [], "any", false, false, false, 88))) ? (print ("1")) : (print (twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["paginacion"] ?? null), "getPagina", [], "any", false, false, false, 88) + 1), "html", null, true))));
        echo "\">&gt;</a></li>
                        </ul>
                    </div>
                </div>
                <!--FIN PAGINACION-->
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "gestion_usuarios.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  247 => 88,  232 => 86,  228 => 85,  220 => 84,  208 => 74,  197 => 69,  187 => 64,  181 => 61,  177 => 60,  173 => 59,  169 => 58,  165 => 57,  156 => 53,  150 => 52,  144 => 51,  138 => 50,  132 => 49,  128 => 48,  123 => 46,  120 => 45,  116 => 44,  98 => 28,  92 => 25,  89 => 24,  87 => 23,  82 => 21,  79 => 20,  77 => 19,  68 => 13,  64 => 12,  60 => 11,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "gestion_usuarios.twig", "/opt/lampp/htdocs/GuriZone/templates/gestion_usuarios.twig");
    }
}
