<?php

namespace SkyRoutes\Infrastructure;

use SkyRoutes\Domain\SearchCountryEntity;
use GuzzleHttp\Client;
use SkyRoutes\Domain\SearchFliesEntity;
use SkyRoutes\Domain\SearchTicketsEntity;

class ApiRepository
{
    const API_KEY = 'XXX';

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
        $client = new Client();

        $response = $client->request('POST', 'http://partners.api.skyscanner.net/apiservices/pricing/v1.0', [
            'form_params' => [
                'apiKey' => self::API_KEY,
                'country' => $searchTicket->getCountry(),
                'currency' => $searchTicket->getCurrency(),
                'locale' => $searchTicket->getLocale(),
                'adults' => $searchTicket->getAdults(),
                'originplace' => $searchTicket->getOriginplace() . '-sky',
                'destinationplace' => $searchTicket->getDestinationplace(). '-sky',
                'outbounddate' => $searchTicket->getOutbounddate(),
                'inbounddate' => $searchTicket->getInbounddate()
            ],
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $sessionUrl = $response->getHeader('Location')[0];

        $query = $sessionUrl . '?apiKey=' . self::API_KEY;
        $res = $client->request('GET', $query, array('Accept' => 'application/json'));
        $stream = $res->getBody();
        return $stream->getContents();
    }



}

