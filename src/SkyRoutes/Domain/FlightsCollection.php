<?php

namespace SkyRoutes\Domain;

class FlightsCollection extends \ArrayObject {

    /**
     * FlightsCollection constructor.
     *
     * @param array|null|object $itineraries
     * @param int $legs
     * @param string $carriers
     * @param $agents
     * @param $places
     */
    public function __construct($itineraries, $legs, $carriers, $agents, $places)
    {
        $this->addRoutes($itineraries, $legs, $carriers, $agents, $places);
    }

    /**
     * @param $itineraries
     * @param $legs
     * @param $carriers
     * @param $agents
     */
    public function addRoutes($itineraries, $legs, $carriers, $agents, $places)
    {
        foreach ($itineraries as $key => $itinerary) {
            $outboundLeg        = $this->getRelationItem($legs, $itinerary['OutboundLegId'], 'Id');
            $inboundLeg         = $this->getRelationItem($legs, $itinerary['InboundLegId'], 'Id');
            $placeDeparture     = $this->getRelationItem($places, $outboundLeg['OriginStation'], 'Id');
            $placeDepartureGo   = $this->getRelationItem($places, $outboundLeg['DestinationStation'], 'Id');
            $placeReturn        = $this->getRelationItem($places, $inboundLeg['OriginStation'], 'Id');
            $placeReturnGo      = $this->getRelationItem($places, $inboundLeg['DestinationStation'], 'Id');
            $carrierDeparture   = $this->getRelationItem($carriers, $outboundLeg['Carriers'][0], 'Id');
            $carrierReturn      = $this->getRelationItem($carriers, $inboundLeg['Carriers'][0], 'Id');
            $agentPerItinerary  = $this->getRelationItem($agents, $itinerary['PricingOptions'][0]['Agents'][0], 'Id');

            if (empty($outboundLeg['Stops']) && empty($inboundLeg['Stops'])) {
                $itineraryData = [];

                $itineraryData['price']                 = $itinerary['PricingOptions'][0]['Price'];
                $itineraryData['urlBooking']            = $itinerary['PricingOptions'][0]['DeeplinkUrl'];
                $itineraryData['agent']                 = $agentPerItinerary['Name'];
                $itineraryData['agentImg']              = $agentPerItinerary['ImageUrl'];
                $itineraryData['departureTimeDate']     = $outboundLeg['Departure'];
                $itineraryData['departureFromCity']     = $placeDeparture['Name'];
                $itineraryData['departureToCity']       = $placeDepartureGo['Name'];
                $itineraryData['departureAirline']      = $carrierDeparture['Name'];
                $itineraryData['departureAirlineImg']   = $carrierDeparture['ImageUrl'];
                $itineraryData['returnTimeData']        = $inboundLeg['Departure'];
                $itineraryData['returnFromCity']        = $placeReturn['Name'];
                $itineraryData['returnToCity']          = $placeReturnGo['Name'];
                $itineraryData['returnAriline']         = $carrierReturn['Name'];
                $itineraryData['returnAirlineImg']      = $carrierReturn['ImageUrl'];


                $this->append(new Flight($itineraryData));
            }
        }
        $this->sort();
    }

    /**
     * @param $relationedArray
     * @param $valueToRelation
     * @param $fieldToRelation
     *
     * @return mixed
     */
    private function getRelationItem($relationedArray, $valueToRelation, $fieldToRelation) {
        $key = array_search($valueToRelation, array_column($relationedArray, $fieldToRelation));
        return $relationedArray[$key];
    }

    private function sort(){
        $this->uasort(function($a, $b) {
            if ($a->getPrice() == $b->getPrice()) {
                return 0;
            } else {
                return $a->getPrice() < $b->getPrice() ? -1 : 1;
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
