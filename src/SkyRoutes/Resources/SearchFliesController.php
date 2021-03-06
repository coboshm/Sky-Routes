<?php

namespace SkyRoutes\Resources;

use SkyRoutes\Application\SearchFlies;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;

class SearchFliesController
{

    private $twig;
    private $templateName = 'fliesResults.html.twig';

    /**
     * SearchFliesController constructor.
     *
     * @param \Twig_Environment $twig
     * @param SearchFlies $searchFlies
     * @param Translator $translator
     */
    public function __construct(\Twig_Environment $twig, SearchFlies $searchFlies, Translator $translator)
    {
        $this->twig = $twig;
        $this->searchFlies = $searchFlies;
    }

    public function indexAction(Request $request)
    {
        parse_str($request->getContent(), $data);
        $routes = $this->searchFlies->searchFlies(
            $data['country'],
            $data['lang'],
            $data['currency'],
            $data['city'],
            $data['departure'],
            $data['return']
        );
        return $this->twig->render($this->templateName, ['routes' => $routes, 'search' => $data]);
    }
}
