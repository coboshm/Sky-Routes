<?php

namespace SkyRoutes\Infrastructure;

use SkyRoutes\Domain\SearchCountryEntity;
use GuzzleHttp\Client;
use SkyRoutes\Domain\SearchFliesEntity;

class ApiRepository
{
    const API_KEY = 'we576790151656261625171748788772';

    public function __construct() {}

    public function searchCountry(SearchCountryEntity $searchCountryEntity)
    {
        $client = new Client();

        $query = "http://partners.api.skyscanner.net/apiservices/autosuggest/v1.0/". $searchCountryEntity->getCountry();
        $query .= "/". $searchCountryEntity->getCurrency() ."/";
        $query .= $searchCountryEntity->getLang() .".?query=". $searchCountryEntity->getQuery();
        $query .= "&apiKey=".self::API_KEY;

        $res = $client->request('GET', $query, array('Accept' => 'application/json'));
        $stream = $res->getBody();
        return $stream->getContents();
    }

    public function searchFlies(SearchFliesEntity $searchFliesEntity)
    {
        $client = new Client();

        $query = "http://partners.api.skyscanner.net/apiservices/browseroutes/v1.0/". $searchFliesEntity->getCountry();
        $query .= "/". $searchFliesEntity->getLang() ."/";
        $query .= $searchFliesEntity->getCurrency() ."/" . $searchFliesEntity->getCity() . "/";
        $query .= "anywhere/" . $searchFliesEntity->getDeparture() . "/" . $searchFliesEntity->getReturn();
        $query .= "?apiKey=".self::API_KEY;

        $res = $client->request('GET', $query, array('Accept' => 'application/json'));
        $stream = $res->getBody();
        return $stream->getContents();
    }

}

