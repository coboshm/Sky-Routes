<?php

namespace SkyRoutes\Resources;

use SkyRoutes\Application\SearchTickets;
use Symfony\Component\HttpFoundation\Request;

class SearchTicketsController
{

    public $searchTickets;

    /**
     * @param SearchTickets $searchTickets
     */
    public function __construct(SearchTickets $searchTickets)
    {
        $this->searchTickets = $searchTickets;
    }

    public function indexAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        return $this->searchTickets->searchTickets($data);
    }
}
