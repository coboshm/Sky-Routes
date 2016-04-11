<?php

namespace SkyRoutes\Application;

use SkyRoutes\Domain\FlightsCollection;
use SkyRoutes\Domain\SearchTicketsEntity;
use SkyRoutes\Infrastructure\ApiRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class SearchTickets
{
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
     * @param $searchData
     *
     * @return JsonResponse
     */
    public function searchTickets($searchData)
    {
        $searchCountryEntity = new SearchTicketsEntity($searchData);
        $jsonResults = $this->apiRepository->searchTickets($searchCountryEntity);
        $jsonResults = json_decode($jsonResults, true);
        $flightsCollection = new FlightsCollection(
            $jsonResults['Itineraries'],
            $jsonResults['Legs'],
            $jsonResults['Carriers'],
            $jsonResults['Agents'],
            $jsonResults['Places']
        );

        return new JsonResponse($flightsCollection->getJsonData());
    }


}
