<?php

/* google-analytics.html */
class __TwigTemplate_0d60c8a8b62801a3f29c56575aedbc270547a8afa47b82bed717d10233cde5b4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script type=\"text/javascript\">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "googleAnalytics", array()), "html", null, true);
        echo "']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
";
    }

    public function getTemplateName()
    {
        return "google-analytics.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
/* <script type="text/javascript">*/
/*     var _gaq = _gaq || [];*/
/*     _gaq.push(['_setAccount', '{{ app.googleAnalytics }}']);*/
/*     _gaq.push(['_trackPageview']);*/
/*     (function() {*/
/*         var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;*/
/*         ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';*/
/*         var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);*/
/*     })();*/
/* </script>*/
/* */
