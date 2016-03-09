<?php

namespace SkyRoutes\Domain;

class Place {

    private $placeId;
    private $iataCode;
    private $name;
    private $cityId;
    private $countryName;

    /**
     * Place constructor.
     *
     * @param array $place
     *
     */
    public function __construct($place)
    {
        $this->placeId     = $place['PlaceId'];
        $this->iataCode    = $place['IataCode'];
        $this->name        = $place['CityName'];
        $this->cityId      = $place['CityId'];
        $this->countryName = $place['CountryName'];
    }

    /**
     * @return mixed
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * @param mixed $cityId
     */
    public function setCityId($cityId)
    {
        $this->cityId = $cityId;
    }

    /**
     * @return mixed
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param mixed $countryName
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
    }

    /**
     * @return mixed
     */
    public function getIataCode()
    {
        return $this->iataCode;
    }

    /**
     * @param mixed $iataCode
     */
    public function setIataCode($iataCode)
    {
        $this->iataCode = $iataCode;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPlaceId()
    {
        return $this->placeId;
    }

    /**
     * @param mixed $placeId
     */
    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;
    }

    function getJsonData(){
        $var = get_object_vars($this);
        foreach($var as &$value){
            if(is_object($value) && method_exists($value,'getJsonData')){
                $value = $value->getJsonData();
            }
        }
        return $var;
    }
}
