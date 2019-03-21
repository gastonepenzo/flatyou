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

/* apartment.html */
class __TwigTemplate_bd1cbe63dc6c6e74f97fa1c228808bd0a1995bdf3c54d70f8dd560e82a6da1d9 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("page.html", "apartment.html", 1);
        $this->blocks = [
            'meta_title' => [$this, 'block_meta_title'],
            'meta_description' => [$this, 'block_meta_description'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "page.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_meta_title($context, array $blocks = [])
    {
        echo "Appartamento";
    }

    // line 5
    public function block_meta_description($context, array $blocks = [])
    {
        echo "Appartamento";
    }

    // line 7
    public function block_body($context, array $blocks = [])
    {
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["apartment"] ?? null), "code", []), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "apartment.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 8,  58 => 7,  52 => 5,  46 => 3,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "apartment.html", "/var/www/f/src/public/twig/templates/apartment.html");
    }
}
