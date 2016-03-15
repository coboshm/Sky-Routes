<?php

namespace SkyRoutes\Infrastructure;

use SkyRoutes\Domain\SearchCountryEntity;
use GuzzleHttp\Client;
use SkyRoutes\Domain\SearchFliesEntity;
use SkyRoutes\Domain\SearchTicketsEntity;

class ApiRepository
{
    const API_KEY = 'we576790151656261625171748788772';

    public function __construct() {}

    /**
     * @param SearchCountryEntity $searchCountryEntity
     *
     * @return string
     */
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

    /**
     * @param SearchFliesEntity $searchFliesEntity
     * @param string $where
     *
     * @return string
     */
    public function searchFlies(SearchFliesEntity $searchFliesEntity, $where = 'anywhere')
    {
        $client = new Client();

        $query = "http://partners.api.skyscanner.net/apiservices/browsequotes/v1.0/". $searchFliesEntity->getCountry();
        $query .= "/". $searchFliesEntity->getLang() ."/";
        $query .= $searchFliesEntity->getCurrency() ."/" . $searchFliesEntity->getCity() . "/";
        $query .= $where . '/' . $searchFliesEntity->getDeparture() . "/" . $searchFliesEntity->getReturn();
        $query .= "?apiKey=".self::API_KEY;

        $res = $client->request('GET', $query, array('Accept' => 'application/json'));
        $stream = $res->getBody();
        return $stream->getContents();
    }

    /**
     * @param SearchTicketsEntity $searchTicket
     * @return string
     */
    public function searchTickets(SearchTicketsEntity $searchTicket)
    {
        return '';
    }

}

