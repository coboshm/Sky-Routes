<?php

namespace SkyRoutes\Domain;

class RouteQuote {

    private $minPrice;
    private $isDirect;
    private $origin;
    private $destination;

    /**
     * RouteQuote constructor.
     *
     * @param array $quote
     * @param array $origin
     * @param array $destination
     *
     */
    public function __construct($quote, $origin, $destination)
    {
        $this->minPrice    = $quote['MinPrice'];
        $this->isDirect    = $quote['Direct'];
        $this->origin      = new Place($origin);
        $this->destination = new Place($destination);
    }

    /**
     * @return Place
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param Place $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return mixed
     */
    public function getIsDirect()
    {
        return $this->isDirect;
    }

    /**
     * @param mixed $isDirect
     */
    public function setIsDirect($isDirect)
    {
        $this->isDirect = $isDirect;
    }

    /**
     * @return mixed
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * @param mixed $minPrice
     */
    public function setMinPrice($minPrice)
    {
        $this->minPrice = $minPrice;
    }

    /**
     * @return Place
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param Place $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
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
