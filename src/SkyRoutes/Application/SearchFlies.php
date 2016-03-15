<?php

namespace SkyRoutes\Application;

use SkyRoutes\Domain\RouteQuoteCollection;
use SkyRoutes\Domain\SearchCountryEntity;
use SkyRoutes\Domain\SearchFliesEntity;
use SkyRoutes\Infrastructure\ApiRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class SearchFlies
{
    const maxFlightsToShow = 20;

    /**
     * @var $apiRepository
     */
    protected $apiRepository;

    /**
     * SearchCountry constructor.
     *
     * @param ApiRepository $apiRepository
     */
    public function __construct(ApiRepository $apiRepository)
    {
        $this->apiRepository = $apiRepository;
    }

    /**
     * @param $country
     * @param $currency
     * @param $lang
     * @param $city
     * @param $departure
     * @param $return
     * @return string
     */
    public function searchFlies($country, $currency, $lang, $city, $departure, $return)
    {
        $searchFliesEntity = new SearchFliesEntity($country, $lang, $currency, $city, $departure, $return);
        $jsonResults = $this->apiRepository->searchFlies($searchFliesEntity);
        $jsonResults = json_decode($jsonResults, true);
        $routeQuoteCollection = new RouteQuoteCollection($jsonResults['Quotes'], $jsonResults['Places']);

        $jsonResults = $this->apiRepository->searchFlies($searchFliesEntity, 'ES');
        $jsonResults = json_decode($jsonResults, true);
        $routeQuoteCollection->addRoutes($jsonResults['Quotes'], $jsonResults['Places']);

        $jsonResults = $this->apiRepository->searchFlies($searchFliesEntity, 'IT');
        $jsonResults = json_decode($jsonResults, true);
        $routeQuoteCollection->addRoutes($jsonResults['Quotes'], $jsonResults['Places']);

        $jsonResults = $this->apiRepository->searchFlies($searchFliesEntity, 'FR');
        $jsonResults = json_decode($jsonResults, true);
        $routeQuoteCollection->addRoutes($jsonResults['Quotes'], $jsonResults['Places']);

        $jsonResults = $this->apiRepository->searchFlies($searchFliesEntity, 'UK');
        $jsonResults = json_decode($jsonResults, true);
        $routeQuoteCollection->addRoutes($jsonResults['Quotes'], $jsonResults['Places']);

        $jsonResults = $this->apiRepository->searchFlies($searchFliesEntity, 'GE');
        $jsonResults = json_decode($jsonResults, true);
        $routeQuoteCollection->addRoutes($jsonResults['Quotes'], $jsonResults['Places']);

        return array_slice($routeQuoteCollection->getJsonData(), 0, self::maxFlightsToShow);
    }
}
