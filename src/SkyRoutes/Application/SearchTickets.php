<?php

namespace SkyRoutes\Application;

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


    public function searchTickets()
    {
        $searchCountryEntity = new SearchTicketsEntity();
        $jsonResults = $this->apiRepository->searchTickets($searchCountryEntity);
        return new JsonResponse($jsonResults);
    }


}
