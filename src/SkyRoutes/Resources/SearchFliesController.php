<?php

namespace SkyRoutes\Resources;

use SkyRoutes\Application\SearchFlies;
use Symfony\Component\HttpFoundation\Request;

class SearchFliesController
{

    private $twig;
    private $templateName = 'index.html.twig';

    /**
     * @param SearchFlies $searchFlies
     */
    public function __construct(\Twig_Environment $twig, SearchFlies $searchFlies)
    {
        $this->twig = $twig;
        $this->searchFlies = $searchFlies;
    }

    public function indexAction(Request $request)
    {
        parse_str($request->getContent(), $data);
        $flies = $this->searchFlies->searchFlies(
            $data['country'],
            $data['lang'],
            $data['currency'],
            $data['city'],
            $data['departure'],
            $data['return']
        );
        var_dump($flies);
        die();
    }
}
