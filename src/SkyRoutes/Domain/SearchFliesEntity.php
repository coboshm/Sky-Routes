<?php

namespace SkyRoutes\Domain;

class SearchFliesEntity {

    /* @var string $country */
    private $country;
    /* @var string $lang */
    private $lang;
    /* @var string $currency */
    private $currency;
    /* @var string $city */
    private $city;
    /* @var string $departure */
    private $departure;
    /* @var string $return */
    private $return;

    /**
     * SearchFliesEntity constructor.
     *
     * @param $country
     * @param $lang
     * @param $currency
     * @param $city
     * @param $departure
     * @param $return
     */
    public function __construct($country, $lang, $currency, $city, $departure, $return)
    {
        $this->currency     = $currency;
        $this->country      = $country;
        $this->lang         = $lang;
        $this->city         = $city;
        $this->departure    = $departure;
        $this->return       = $return;
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
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @return string
     */
    public function getReturn()
    {
        return $this->return;
    }
}
