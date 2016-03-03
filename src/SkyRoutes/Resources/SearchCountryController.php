<?php

namespace SkyRoutes\Resources;

use SkyRoutes\Application\SearchCountry;
use Symfony\Component\HttpFoundation\Request;

class SearchCountryController
{

    public $searchCountry;

    /**
     * @param SearchCountry $searchCountry
     */
    public function __construct(SearchCountry $searchCountry)
    {
        $this->searchCountry = $searchCountry;
    }

    public function indexAction(Request $request)
    {
        $data = json_decode($request->getContent());
        return $this->searchCountry->searchCountry($data->country, $data->currency, $data->lang, $data->query);
    }
}
