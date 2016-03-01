<?php

namespace SkyRoutes\Domain;

class SearchCountryEntity {

    /* @var string $country */
    private $country;
    /* @var string $lang */
    private $lang;
    /* @var string $currency */
    private $currency;
    /* @var string $query */
    private $query;

    /**
     * SearchCountryEntity constructor.
     *
     * @param $country
     * @param $lang
     * @param $currency
     * @param $query
     */
    public function __construct($country, $lang, $currency, $query)
    {
        $this->currency = $currency;
        $this->country  = $country;
        $this->lang     = $lang;
        $this->query    = $query;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }



}
