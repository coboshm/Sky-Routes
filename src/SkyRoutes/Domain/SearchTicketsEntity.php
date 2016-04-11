<?php

namespace SkyRoutes\Domain;

class SearchTicketsEntity {

    /** @var  string $country */
    private $country;
    /** @var  string $currency */
    private $currency;
    /** @var  string $locale */
    private $locale;
    /** @var  string $originplace */
    private $originplace;
    /** @var  string $destinationplace */
    private $destinationplace;
    /** @var  string $outbounddate */
    private $outbounddate;
    /** @var  string $inbounddate */
    private $inbounddate;
    /** @var int $adults */
    private $adults = 1;


    /**
     * SearchTicketsEntity constructor.
     *
     **/
    public function __construct($searchData)
    {
        $this->country = $searchData['country'];
        $this->currency = $searchData['currency'];
        $this->locale = $searchData['lang'];
        $this->originplace = $searchData['routes']['origin']['cityId'];
        $this->destinationplace = $searchData['routes']['destination']['cityId'];
        $this->outbounddate = $searchData['departure'];
        $this->inbounddate = $searchData['return'];
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getDestinationplace()
    {
        return $this->destinationplace;
    }

    /**
     * @param mixed $destinationplace
     */
    public function setDestinationplace($destinationplace)
    {
        $this->destinationplace = $destinationplace;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param mixed $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return mixed
     */
    public function getInbounddate()
    {
        return $this->inbounddate;
    }

    /**
     * @param mixed $inbounddate
     */
    public function setInbounddate($inbounddate)
    {
        $this->inbounddate = $inbounddate;
    }

    /**
     * @return mixed
     */
    public function getOriginplace()
    {
        return $this->originplace;
    }

    /**
     * @param mixed $originplace
     */
    public function setOriginplace($originplace)
    {
        $this->originplace = $originplace;
    }

    /**
     * @return mixed
     */
    public function getOutbounddate()
    {
        return $this->outbounddate;
    }

    /**
     * @param mixed $outbounddate
     */
    public function setOutbounddate($outbounddate)
    {
        $this->outbounddate = $outbounddate;
    }


    /**
     * @return int
     */
    public function getAdults()
    {
        return $this->adults;
    }

    /**
     * @param int $adults
     */
    public function setAdults($adults)
    {
        $this->adults = $adults;
    }


}
