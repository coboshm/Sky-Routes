<?php

/* layout.html.twig */
class __TwigTemplate_ed2bce97a3c45432921a88adde9aebf4f0373ad06fb78a77c803e98c6c857cdc extends Twig_Template
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
</head>
<body ng-app=\"lw\">
    <div class=\"container\">
        <nav class=\"navbar navbar-default navbar-inverse navbar-fixed-top\" role=\"navigation\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navbar-collapse-01\">
                    <span class=\"sr-only\">Toggle navigation</span>
                </button>
                <a class=\"navbar-brand\" href=\"";
        // line 42
        echo $this->env->getExtension('routing')->getPath("home");
        echo "\">LastWishes</a>
            </div>
        </nav><!-- /navbar -->

        ";
        // line 46
        if (array_key_exists("messages", $context)) {
            // line 47
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : $this->getContext($context, "messages")));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 48
                echo "                ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["message"], "info", array()), "html", null, true);
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "        ";
        }
        // line 51
        echo "
        ";
        // line 52
        $this->displayBlock('content', $context, $blocks);
        // line 100
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

    // line 52
    public function block_content($context, array $blocks = array())
    {
        // line 53
        echo "        <div class=\"row\">
            <div class=\"col-xs-12\">
                <h1>LastWishes</h1>
                <p class=\"lead\">
                    If something happen to you, your feelings won't be lost.
                </p>
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-xs-12\">
                <h4>How it Works</h4>
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-xs-12 col-sm-3\">
                <div class=\"tile\">
                    <img src=\"/components/flat-ui/images/icons/svg/pencils.svg\" alt=\"Sign up\" class=\"tile-image big-illustration\">
                    <h3 class=\"tile-title\">1. Sign In</h3>
                    <p>So you would start to make wishes in case something happen to you.</p>
                </div>
            </div>
            <div class=\"col-xs-12 col-sm-3\">
                <div class=\"tile\">
                    <img src=\"/components/flat-ui/images/icons/svg/gift-box.svg\" alt=\"Make a wish\" class=\"tile-image big-illustration\">
                    <h3 class=\"tile-title\">2. Make a wish</h3>
                    <p>Add a message you want to sent in case something happen.</p>
                </div>
            </div>
            <div class=\"col-xs-12 col-sm-3\">
                <div class=\"tile\">
                    <img src=\"/components/flat-ui/images/icons/svg/loop.svg\" alt=\"You're Ok!\" class=\"tile-image big-illustration\">
                    <h3 class=\"tile-title\">3. Keep in touch</h3>
                    <p>Answer our emails or use our App to say you're ok.</p>
                </div>
            </div>
            <div class=\"col-xs-12 col-sm-3\">
                <div class=\"tile\">
                    <img src=\"/components/flat-ui/images/icons/svg/retina.svg\" alt=\"Grant your wishes\" class=\"tile-image big-illustration\">
                    <h3 class=\"tile-title\">4. Grant wishes</h3>
                    <p>In case you're out, we'll deliver your messages and wishes.</p>
                </div>
            </div>
        </div>

        ";
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
        return array (  120 => 53,  117 => 52,  94 => 100,  92 => 52,  89 => 51,  86 => 50,  77 => 48,  72 => 47,  70 => 46,  63 => 42,  20 => 1,);
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
/* </head>*/
/* <body ng-app="lw">*/
/*     <div class="container">*/
/*         <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">*/
/*             <div class="navbar-header">*/
/*                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">*/
/*                     <span class="sr-only">Toggle navigation</span>*/
/*                 </button>*/
/*                 <a class="navbar-brand" href="{{ path('home') }}">LastWishes</a>*/
/*             </div>*/
/*         </nav><!-- /navbar -->*/
/* */
/*         {% if messages is defined %}*/
/*             {% for message in messages %}*/
/*                 {{ message.info }}*/
/*             {% endfor %}*/
/*         {% endif %}*/
/* */
/*         {% block content %}*/
/*         <div class="row">*/
/*             <div class="col-xs-12">*/
/*                 <h1>LastWishes</h1>*/
/*                 <p class="lead">*/
/*                     If something happen to you, your feelings won't be lost.*/
/*                 </p>*/
/*             </div>*/
/*         </div>*/
/* */
/*         <div class="row">*/
/*             <div class="col-xs-12">*/
/*                 <h4>How it Works</h4>*/
/*             </div>*/
/*         </div>*/
/* */
/*         <div class="row">*/
/*             <div class="col-xs-12 col-sm-3">*/
/*                 <div class="tile">*/
/*                     <img src="/components/flat-ui/images/icons/svg/pencils.svg" alt="Sign up" class="tile-image big-illustration">*/
/*                     <h3 class="tile-title">1. Sign In</h3>*/
/*                     <p>So you would start to make wishes in case something happen to you.</p>*/
/*                 </div>*/
/*             </div>*/
/*             <div class="col-xs-12 col-sm-3">*/
/*                 <div class="tile">*/
/*                     <img src="/components/flat-ui/images/icons/svg/gift-box.svg" alt="Make a wish" class="tile-image big-illustration">*/
/*                     <h3 class="tile-title">2. Make a wish</h3>*/
/*                     <p>Add a message you want to sent in case something happen.</p>*/
/*                 </div>*/
/*             </div>*/
/*             <div class="col-xs-12 col-sm-3">*/
/*                 <div class="tile">*/
/*                     <img src="/components/flat-ui/images/icons/svg/loop.svg" alt="You're Ok!" class="tile-image big-illustration">*/
/*                     <h3 class="tile-title">3. Keep in touch</h3>*/
/*                     <p>Answer our emails or use our App to say you're ok.</p>*/
/*                 </div>*/
/*             </div>*/
/*             <div class="col-xs-12 col-sm-3">*/
/*                 <div class="tile">*/
/*                     <img src="/components/flat-ui/images/icons/svg/retina.svg" alt="Grant your wishes" class="tile-image big-illustration">*/
/*                     <h3 class="tile-title">4. Grant wishes</h3>*/
/*                     <p>In case you're out, we'll deliver your messages and wishes.</p>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/* */
/*         {% endblock %}*/
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
