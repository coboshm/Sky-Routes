<?php

namespace SkyRoutes\Resources;

class HomeController
{

    private $twig;

    private $templateName = 'index.html.twig';

    /**
     * @param \Twig_Environment $twig
     */
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @return mixed
     */
    public function indexAction()
    {
        return $this->twig->render($this->templateName, []);
    }
}
