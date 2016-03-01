<?php

namespace SkyRoutes\Application;

use SkyRoutes\Domain\SearchCountryEntity;
use SkyRoutes\Infrastructure\ApiRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class SearchCountry
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
     * @param $country
     * @param $currency
     * @param $lang
     * @param $query
     * @return string
     */
    public function searchCountry($country, $currency, $lang, $query)
    {
        $searchCountryEntity = new SearchCountryEntity($country, $lang, $currency, $query);
        $jsonResults = $this->apiRepository->searchCountry($searchCountryEntity);
        return new JsonResponse($jsonResults);
    }


}
