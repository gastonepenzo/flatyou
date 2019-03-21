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
class __TwigTemplate_5c4dcebb9fe741cd39acd17170da4c6f1083300ea5753697d500e4d137bbb472 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<h1>User List</h1>
<ul>
    <li><a href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("profile", ["name" => "josh"]), "html", null, true);
        echo "\">Josh</a></li>
</ul>
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
        return array (  39 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "apartment.html", "/var/www/f/src/public/twig/templates/apartment.html");
    }
}
