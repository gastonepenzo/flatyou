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

/* page.html */
class __TwigTemplate_fbb169595699718cab68949f7ebceb5b0d8eb3e86bf31fb93201fa336a1fc3b4 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'meta_title' => [$this, 'block_meta_title'],
            'meta_description' => [$this, 'block_meta_description'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"it\">
    <head>
        <meta charset=\"utf-8\">
        <title>";
        // line 5
        $this->displayBlock('meta_title', $context, $blocks);
        echo "</title>
        <meta name=\"description\" content=\"";
        // line 6
        $this->displayBlock('meta_description', $context, $blocks);
        echo "\"/>
        <meta name=\"keywords\" content=\"\"/>
        <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
        <link type=\"text/css\" rel=\"stylesheet\" href=\"/css/materialize.min.css\"  media=\"screen,projection\"/>
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
    </head>
    <body>
        ";
        // line 13
        $this->displayBlock('body', $context, $blocks);
        // line 14
        echo "        <script type=\"text/javascript\" src=\"/js/materialize.min.js\"></script>
    </body>
</html>";
    }

    // line 5
    public function block_meta_title($context, array $blocks = [])
    {
    }

    // line 6
    public function block_meta_description($context, array $blocks = [])
    {
    }

    // line 13
    public function block_body($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "page.html";
    }

    public function getDebugInfo()
    {
        return array (  76 => 13,  71 => 6,  66 => 5,  60 => 14,  58 => 13,  48 => 6,  44 => 5,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "page.html", "/var/www/f/src/public/twig/templates/page.html");
    }
}
