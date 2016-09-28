<?php

namespace SkyRoutes\Domain;

class Flight {

    /** @var  int $price */
    private $price;
    /** @var  string $agent */
    private $agent;
    /** @var string $agentImg */
    private $agentImg;
    /** @var  string $departureTimeDate */
    private $departureTimeDate;
    /** @var  string $departureFromCity */
    private $departureFromCity;
    /** @var  string $departureToCity */
    private $departureToCity;
    /** @var  string $departureAirline */
    private $departureAirline;
    /** @var  string $departureAirlineImg */
    private $departureAirlineImg;
    /** @var  string $returnTimeDate */
    private $returnTimeDate;
    /** @var  string $returnFromCity */
    private $returnFromCity;
    /** @var  string $returnToCity */
    private $returnToCity;
    /** @var  string $returnAriline */
    private $returnAriline;
    /** @var  string $returnAirlineImg */
    private $returnAirlineImg;
    /** @var  string $urlBooking */
    private $urlBooking;

    /**
     * Flight constructor.
     *
     * @param $flightData
     */
    public function __construct($flightData)
    {
        $this->price                = $flightData['price'];
        $this->agent                = $flightData['agent'];
        $this->agentImg             = $flightData['agentImg'];
        $this->departureTimeDate    = $flightData['departureTimeDate'];
        $this->departureFromCity    = $flightData['departureFromCity'];
        $this->departureToCity      = $flightData['departureToCity'];
        $this->departureAirline     = $flightData['departureAirline'];
        $this->departureAirlineImg  = $flightData['departureAirlineImg'];
        $this->returnTimeDate       = $flightData['returnTimeDate'];
        $this->returnFromCity       = $flightData['returnFromCity'];
        $this->returnToCity         = $flightData['returnToCity'];
        $this->returnAriline        = $flightData['returnAriline'];
        $this->returnAirlineImg     = $flightData['returnAirlineImg'];
        $this->urlBooking           = $flightData['urlBooking'];
    }

    /**
     * @return string
     */
    public function getDepartureAirlineImg()
    {
        return $this->departureAirlineImg;
    }

    /**
     * @param string $departureAirlineImg
     */
    public function setDepartureAirlineImg($departureAirlineImg)
    {
        $this->departureAirlineImg = $departureAirlineImg;
    }

    /**
     * @return string
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * @param string $agent
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;
    }

    /**
     * @return mixed
     */
    public function getAgentImg()
    {
        return $this->agentImg;
    }

    /**
     * @param mixed $agentImg
     */
    public function setAgentImg($agentImg)
    {
        $this->agentImg = $agentImg;
    }

    /**
     * @return string
     */
    public function getDepartureAirline()
    {
        return $this->departureAirline;
    }

    /**
     * @param string $departureAirline
     */
    public function setDepartureAirline($departureAirline)
    {
        $this->departureAirline = $departureAirline;
    }

    /**
     * @return string
     */
    public function getDepartureFromCity()
    {
        return $this->departureFromCity;
    }

    /**
     * @param string $departureFromCity
     */
    public function setDepartureFromCity($departureFromCity)
    {
        $this->departureFromCity = $departureFromCity;
    }

    /**
     * @return string
     */
    public function getReturnToCity()
    {
        return $this->returnToCity;
    }

    /**
     * @param string $returnToCity
     */
    public function setReturnToCity($returnToCity)
    {
        $this->returnToCity = $returnToCity;
    }

    /**
     * @return string
     */
    public function getUrlBooking()
    {
        return $this->urlBooking;
    }

    /**
     * @param string $urlBooking
     */
    public function setUrlBooking($urlBooking)
    {
        $this->urlBooking = $urlBooking;
    }

    /**
     * @return string
     */
    public function getReturnTimeDate()
    {
        return $this->returnTimeDate;
    }

    /**
     * @param string $returnTimeData
     */
    public function setReturnTimeData($returnTimeData)
    {
        $this->returnTimeData = $returnTimeData;
    }

    /**
     * @return string
     */
    public function getReturnFromCity()
    {
        return $this->returnFromCity;
    }

    /**
     * @param string $returnFromCity
     */
    public function setReturnFromCity($returnFromCity)
    {
        $this->returnFromCity = $returnFromCity;
    }

    /**
     * @return string
     */
    public function getReturnAirlineImg()
    {
        return $this->returnAirlineImg;
    }

    /**
     * @param string $returnAirlineImg
     */
    public function setReturnAirlineImg($returnAirlineImg)
    {
        $this->returnAirlineImg = $returnAirlineImg;
    }

    /**
     * @return string
     */
    public function getReturnAriline()
    {
        return $this->returnAriline;
    }

    /**
     * @param string $returnAriline
     */
    public function setReturnAriline($returnAriline)
    {
        $this->returnAriline = $returnAriline;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getDepartureToCity()
    {
        return $this->departureToCity;
    }

    /**
     * @param string $departureToCity
     */
    public function setDepartureToCity($departureToCity)
    {
        $this->departureToCity = $departureToCity;
    }

    /**
     * @return string
     */
    public function getDepartureTimeDate()
    {
        return $this->departureTimeDate;
    }

    /**
     * @param string $departureTimeDate
     */
    public function setDepartureTimeDate($departureTimeDate)
    {
        $this->departureTimeDate = $departureTimeDate;
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
