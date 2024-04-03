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

/* test/variables.html.twig */
class __TwigTemplate_84b0385ad487986dd753c053314e8676 extends Template
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
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "test/variables.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "test/variables.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "test/variables.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "
    ";
        // line 6
        echo "    <ul>
        ";
        // line 8
        echo "        <li>Jour : ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["tableau"]) || array_key_exists("tableau", $context) ? $context["tableau"] : (function () { throw new RuntimeError('Variable "tableau" does not exist.', 8, $this->source); })()), "jour", [], "array", false, false, false, 8), "html", null, true);
        echo " </li>  
        <li>Mois : ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["tableau"]) || array_key_exists("tableau", $context) ? $context["tableau"] : (function () { throw new RuntimeError('Variable "tableau" does not exist.', 9, $this->source); })()), "mois", [], "any", false, false, false, 9), "html", null, true);
        echo " </li>  
        <li>Année : ";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["tableau"]) || array_key_exists("tableau", $context) ? $context["tableau"] : (function () { throw new RuntimeError('Variable "tableau" does not exist.', 10, $this->source); })()), "annee", [], "any", false, false, false, 10), "html", null, true);
        echo " </li>  
    </ul>

    ";
        // line 14
        echo "    <ul>
        <li> ";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["tableau2"]) || array_key_exists("tableau2", $context) ? $context["tableau2"] : (function () { throw new RuntimeError('Variable "tableau2" does not exist.', 15, $this->source); })()), 0, [], "array", false, false, false, 15), "html", null, true);
        echo " </li>
        <li> ";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["tableau2"]) || array_key_exists("tableau2", $context) ? $context["tableau2"] : (function () { throw new RuntimeError('Variable "tableau2" does not exist.', 16, $this->source); })()), 1, [], "any", false, false, false, 16), "html", null, true);
        echo " </li>
        <li> ";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["tableau2"]) || array_key_exists("tableau2", $context) ? $context["tableau2"] : (function () { throw new RuntimeError('Variable "tableau2" does not exist.', 17, $this->source); })()), 2, [], "any", false, false, false, 17), "html", null, true);
        echo " </li>
    </ul>

    ";
        // line 21
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 22
            echo "        <p> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["tableau2"]) || array_key_exists("tableau2", $context) ? $context["tableau2"] : (function () { throw new RuntimeError('Variable "tableau2" does not exist.', 22, $this->source); })()), $context["i"], [], "array", false, false, false, 22), "html", null, true);
            echo " </p>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "
    <ul>
        ";
        // line 27
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tableau"]) || array_key_exists("tableau", $context) ? $context["tableau"] : (function () { throw new RuntimeError('Variable "tableau" does not exist.', 27, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["valeur"]) {
            // line 28
            echo "            <li> ";
            echo twig_escape_filter($this->env, $context["valeur"], "html", null, true);
            echo " </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['valeur'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "    </ul>

    <ul>
        ";
        // line 34
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tableau"]) || array_key_exists("tableau", $context) ? $context["tableau"] : (function () { throw new RuntimeError('Variable "tableau" does not exist.', 34, $this->source); })()));
        foreach ($context['_seq'] as $context["indice"] => $context["valeur"]) {
            // line 35
            echo "            <li>  ";
            echo twig_escape_filter($this->env, $context["indice"], "html", null, true);
            echo " : ";
            echo twig_escape_filter($this->env, $context["valeur"], "html", null, true);
            echo " </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['indice'], $context['valeur'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "    </ul>

    ";
        // line 40
        echo "    ";
        if (((isset($context["nombre"]) || array_key_exists("nombre", $context) ? $context["nombre"] : (function () { throw new RuntimeError('Variable "nombre" does not exist.', 40, $this->source); })()) < 20)) {
            // line 41
            echo "        <p>Le nombre fourni est bien inférieur à 20</p>
    ";
        }
        // line 43
        echo "    
    ";
        // line 45
        echo "    ";
        if (((isset($context["nombre"]) || array_key_exists("nombre", $context) ? $context["nombre"] : (function () { throw new RuntimeError('Variable "nombre" does not exist.', 45, $this->source); })()) < 2)) {
            echo " 
        <p>Le nombre est inférieur à 2</p>
    ";
        } elseif ((        // line 47
(isset($context["nombre"]) || array_key_exists("nombre", $context) ? $context["nombre"] : (function () { throw new RuntimeError('Variable "nombre" does not exist.', 47, $this->source); })()) < 10)) {
            // line 48
            echo "        <p>Le nombre est inférieur à 10</p>
    ";
        } else {
            // line 50
            echo "        <p>Le nombre est supérieur ou égal à 10</p>  
    ";
        }
        // line 52
        echo "
    ";
        // line 54
        echo "    ";
        // line 55
        echo "    ";
        if (array_key_exists("chaine", $context)) {
            // line 56
            echo "        Oui la chaine existe ! 
    ";
        }
        // line 58
        echo "
    ";
        // line 60
        echo "    ";
        if (twig_test_empty((isset($context["chaine"]) || array_key_exists("chaine", $context) ? $context["chaine"] : (function () { throw new RuntimeError('Variable "chaine" does not exist.', 60, $this->source); })()))) {
            // line 61
            echo "        Oui la chaine est vide ! 
    ";
        }
        // line 63
        echo "
    ";
        // line 65
        echo "    ";
        if ((array_key_exists("chaine", $context) && twig_test_empty((isset($context["chaine"]) || array_key_exists("chaine", $context) ? $context["chaine"] : (function () { throw new RuntimeError('Variable "chaine" does not exist.', 65, $this->source); })())))) {
            // line 66
            echo "        <p>Chaine est défini et est vide ! </p>
    ";
        }
        // line 68
        echo "
    ";
        // line 70
        echo "    ";
        // line 71
        echo "
    <p>
    ";
        // line 73
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["tableau"]) || array_key_exists("tableau", $context) ? $context["tableau"] : (function () { throw new RuntimeError('Variable "tableau" does not exist.', 73, $this->source); })()), "mois", [], "any", false, false, false, 73)), "html", null, true);
        echo "
    </p>
    
    
    


";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "test/variables.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  230 => 73,  226 => 71,  224 => 70,  221 => 68,  217 => 66,  214 => 65,  211 => 63,  207 => 61,  204 => 60,  201 => 58,  197 => 56,  194 => 55,  192 => 54,  189 => 52,  185 => 50,  181 => 48,  179 => 47,  173 => 45,  170 => 43,  166 => 41,  163 => 40,  159 => 37,  148 => 35,  143 => 34,  138 => 30,  129 => 28,  124 => 27,  120 => 24,  111 => 22,  106 => 21,  100 => 17,  96 => 16,  92 => 15,  89 => 14,  83 => 10,  79 => 9,  74 => 8,  71 => 6,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block body %}

    {# Tableau associatif #}
    <ul>
        {# Plusiurs possibilités de syntaxe pour piocher dans des array en twig #}
        <li>Jour : {{ tableau[\"jour\"] }} </li>  
        <li>Mois : {{ tableau.mois }} </li>  
        <li>Année : {{ tableau.annee }} </li>  
    </ul>

    {# Pour un tableau indexé numériquement #}
    <ul>
        <li> {{tableau2[0]}} </li>
        <li> {{tableau2.1}} </li>
        <li> {{tableau2.2}} </li>
    </ul>

    {# Boucle For #}
    {% for i in 0..2 %}
        <p> {{tableau2[i]}} </p>
    {% endfor %}

    <ul>
        {# Boucle for mais syntaxe équivalente au foreach pour uniquement les valeurs #}
        {% for valeur in tableau %}
            <li> {{valeur}} </li>
        {% endfor %}
    </ul>

    <ul>
        {# Boucle for mais syntaxe équivalente au foreach pour les valeurs + les indices #}
        {% for indice, valeur in tableau %}
            <li>  {{indice}} : {{valeur}} </li>
        {% endfor %}
    </ul>

    {#  if #}
    {% if nombre < 20 %}
        <p>Le nombre fourni est bien inférieur à 20</p>
    {% endif %}
    
    {# if elseif else #}
    {% if nombre < 2 %} 
        <p>Le nombre est inférieur à 2</p>
    {% elseif nombre < 10 %}
        <p>Le nombre est inférieur à 10</p>
    {% else %}
        <p>Le nombre est supérieur ou égal à 10</p>  
    {% endif %}

    {# TESTS #}
    {# \"defined\" équivalent à isset, permet de comprendre si un élément existe bel et bien, est bien défini #}
    {% if chaine is defined %}
        Oui la chaine existe ! 
    {% endif %}

    {# empty, équivalent au empty de PHP natif sauf que en symfony empty fait la vérification de la valeur uniquement ! Si la variable n'existe pas, alors cela déclenchera une erreur alors qu'en PHP natif, en plus de vérifier la valeur, la fonction empty vérifie aussi l'existence de cette variable #}
    {% if chaine is empty %}
        Oui la chaine est vide ! 
    {% endif %}

    {# Dans ce cas il faudra donc faire d'abord un test defined avant de se lancer dans un test empty car il ne peut être fait que sur une variable qui existe #}
    {% if chaine is defined and chaine is empty %}
        <p>Chaine est défini et est vide ! </p>
    {% endif %}

    {# FILTRES #}
    {# filtre upper pour transformer une variable tout en majuscule, il existe des tas de filtres twig que l'on peut appliquer à nos variables : https://twig.symfony.com/doc/3.x/filters/index.html #}

    <p>
    {{tableau.mois|upper}}
    </p>
    
    
    


{% endblock %}", "test/variables.html.twig", "D:\\wamp64\\www\\LDW14\\09-Symfony\\projet-bibliosf\\templates\\test\\variables.html.twig");
    }
}
