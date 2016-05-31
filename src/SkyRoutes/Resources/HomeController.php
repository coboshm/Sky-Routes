<?php

namespace SkyRoutes\Resources;

use Symfony\Component\Translation\Translator;

class HomeController
{

    private $twig;

    private $templateName = 'index.html.twig';

    /**
     * @param \Twig_Environment $twig
     * @param Translator $translator
     */
    public function __construct(\Twig_Environment $twig, Translator $translator)
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
