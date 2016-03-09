<?php

namespace SkyRoutes\Domain;

class RouteQuoteCollection extends \ArrayObject {

    const maxFlightsToShow = 10;
    /**
     * @param array $routeQuotes
     * @param array $places
     */
    public function __construct($routeQuotes, $places)
    {
        $destinationsList = array();
        foreach ($routeQuotes as $key => $quote) {
            $keyOfExistentDestination = $this->existsDestination($destinationsList, $quote['OutboundLeg']['DestinationId']);
            if ($keyOfExistentDestination !== false) {
                $this->compareExistentRouteAndChange($keyOfExistentDestination, $quote, $places);
            } else {
                $origin      = $this->getPlaceName($places, $quote['OutboundLeg']['OriginId']);
                $destination = $this->getPlaceName($places, $quote['OutboundLeg']['DestinationId']);
                $this->append(new RouteQuote($quote, $origin, $destination));
                $destinationsList[] = $quote['OutboundLeg']['DestinationId'];
            }
        }
        $this->sort();
        $this->filterNumRoutes();
    }

    /**
     * @param array $places
     * @param int $idPlace
     *
     * @return mixed
     */
    private function getPlaceName($places, $idPlace) {
        $key = array_search($idPlace, array_column($places, 'PlaceId'));
        return $places[$key];
    }

    /**
     * @param array $destinationsList
     * @param string $destination
     *
     * @return bool
     */
    private function existsDestination($destinationsList, $destination)
    {
        $key = array_search($destination, $destinationsList);
        if (false !== $key) {
            return $key;
        }
        return false;
    }

    /**
     * @param $keyOfExistentDestination
     * @param $quote
     * @param $places
     */
    private function compareExistentRouteAndChange($keyOfExistentDestination, $quote, $places)
    {
        /** @var RouteQuote $existentRoute */
        $existentRoute   = $this->offsetGet($keyOfExistentDestination);
        if ($existentRoute->getMinPrice() > $quote['MinPrice']) {
            $origin      = $this->getPlaceName($places, $quote['OutboundLeg']['OriginId']);
            $destination = $this->getPlaceName($places, $quote['OutboundLeg']['DestinationId']);
            $this->offsetSet($keyOfExistentDestination, new RouteQuote($quote, $origin, $destination));
        }
    }

    private function filterNumRoutes()
    {
        $numFlights = $this->count() - 1;
        while ($numFlights >= self::maxFlightsToShow) {
            $this->offsetUnset($numFlights);
            $numFlights = $this->count() - 1;
        }
    }

    public function sort(){
        $this->uasort(function($a, $b) {
            if ($a->getMinPrice() == $b->getMinPrice()) {
                return 0;
            } else {
                return $a->getMinPrice() < $b->getMinPrice() ? -1 : 1;
            }
        });
    }

    function getJsonData(){
        $arrayCopy = [];
        $iterator = $this->getIterator();

        while($iterator->valid()) {
            $arrayCopy[] = $iterator->current()->getJsonData();
            $iterator->next();
        }
        return $arrayCopy;
    }
}
