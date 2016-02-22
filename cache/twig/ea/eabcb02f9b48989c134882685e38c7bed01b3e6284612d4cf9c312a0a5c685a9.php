<?php

/* layout.html.twig */
class __TwigTemplate_958dcb3ab68c436a36340dc886290bbf7e482222a7edfd8c89d6b26fbe01a648 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Last Wishes</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel=\"stylesheet\" href=\"/components/flat-ui/bootstrap/css/bootstrap.css\">
    <link rel=\"stylesheet\" href=\"/components/flat-ui/css/flat-ui.css\">
    <link rel=\"stylesheet\" href=\"/assets/app.css\">

    <style>
        body { padding-top: 70px; }
        footer { margin-top: 40px; }
        .wish-image { width: 80px; height: 80px; }
        .wish-row { margin-bottom: 20px; }
        .wish-control { display:inline; width: 300px; }
        input.ng-invalid {
            color: #e74c3c;
            border-color: #e74c3c;
            box-shadow: none;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
    <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->

    ";
        // line 35
        $this->loadTemplate("google-analytics.html", "layout.html.twig", 35)->display(array());
        // line 36
        echo "</head>
<body ng-app=\"lw\">
    <div class=\"container\">
        <nav class=\"navbar navbar-default navbar-inverse navbar-fixed-top\" role=\"navigation\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navbar-collapse-01\">
                    <span class=\"sr-only\">Toggle navigation</span>
                </button>
                <a class=\"navbar-brand\" href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("home");
        echo "\">SkyRoutes</a>
            </div>
        </nav><!-- /navbar -->


        ";
        // line 49
        $this->displayBlock('content', $context, $blocks);
        // line 50
        echo "    </div>

    <footer>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src=\"/components/flat-ui/js/jquery-1.10.2.min.js\"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src=\"/components/flat-ui/js/bootstrap.min.js\"></script>

    <!--
    <script src=\"/components/angular/angular.min.js\"></script>
    <script src=\"/components/angular-resource/angular-resource.min.js\"></script>
    <script src=\"/components/ngprogress/build/ngProgress.min.js\"></script>
    <script src=\"/assets/js/app.js\"></script>
    -->
</body>
</html>
";
    }

    // line 49
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 49,  78 => 50,  76 => 49,  68 => 44,  58 => 36,  56 => 35,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*     <title>Last Wishes</title>*/
/* */
/*     <!-- Bootstrap -->*/
/*     <!-- Latest compiled and minified CSS -->*/
/*     <link rel="stylesheet" href="/components/flat-ui/bootstrap/css/bootstrap.css">*/
/*     <link rel="stylesheet" href="/components/flat-ui/css/flat-ui.css">*/
/*     <link rel="stylesheet" href="/assets/app.css">*/
/* */
/*     <style>*/
/*         body { padding-top: 70px; }*/
/*         footer { margin-top: 40px; }*/
/*         .wish-image { width: 80px; height: 80px; }*/
/*         .wish-row { margin-bottom: 20px; }*/
/*         .wish-control { display:inline; width: 300px; }*/
/*         input.ng-invalid {*/
/*             color: #e74c3c;*/
/*             border-color: #e74c3c;*/
/*             box-shadow: none;*/
/*         }*/
/*     </style>*/
/* */
/*     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/*     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*     <!--[if lt IE 9]>*/
/*     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>*/
/*     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/* */
/*     {% include 'google-analytics.html' only %}*/
/* </head>*/
/* <body ng-app="lw">*/
/*     <div class="container">*/
/*         <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">*/
/*             <div class="navbar-header">*/
/*                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">*/
/*                     <span class="sr-only">Toggle navigation</span>*/
/*                 </button>*/
/*                 <a class="navbar-brand" href="{{ path('home') }}">SkyRoutes</a>*/
/*             </div>*/
/*         </nav><!-- /navbar -->*/
/* */
/* */
/*         {% block content %}{% endblock %}*/
/*     </div>*/
/* */
/*     <footer>*/
/*     </footer>*/
/* */
/*     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->*/
/*     <script src="/components/flat-ui/js/jquery-1.10.2.min.js"></script>*/
/* */
/*     <!-- Latest compiled and minified JavaScript -->*/
/*     <script src="/components/flat-ui/js/bootstrap.min.js"></script>*/
/* */
/*     <!--*/
/*     <script src="/components/angular/angular.min.js"></script>*/
/*     <script src="/components/angular-resource/angular-resource.min.js"></script>*/
/*     <script src="/components/ngprogress/build/ngProgress.min.js"></script>*/
/*     <script src="/assets/js/app.js"></script>*/
/*     -->*/
/* </body>*/
/* </html>*/
/* */
