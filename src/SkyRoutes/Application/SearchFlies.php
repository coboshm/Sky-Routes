<?php

namespace SkyRoutes\Application;

use SkyRoutes\Domain\SearchCountryEntity;
use SkyRoutes\Domain\SearchFliesEntity;
use SkyRoutes\Infrastructure\ApiRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class SearchFlies
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
     * @param $city
     * @param $departure
     * @param $return
     * @return string
     */
    public function searchFlies($country, $currency, $lang, $city, $departure, $return)
    {
        $searchFliesEntity = new SearchFliesEntity($country, $lang, $currency, $city, $departure, $return);
        $jsonResults = $this->apiRepository->searchFlies($searchFliesEntity);
        var_dump($jsonResults);
        $jsonResults = json_decode($jsonResults);

        var_dump($jsonResults);
        die('ola');
        return new JsonResponse($jsonResults);
    }


}
