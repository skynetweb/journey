<?php

namespace Journey\Route\PathFinding;

use Journey\Billet;
use Journey\Billet\Pack;
use Journey\Route;
use Journey\Route\Pivot;

/**
 * Class SortingTickets
 * @package Journey\Route\PathFinding
 */
class SortingTickets implements BuildingPathInterface
{
    /**
     * @var Pivot\TicketMapper
     */
    private $billetToPivotMapper;

    /**
     * @param Pivot\TicketMapper $billetToPivotMapper
     */
    public function __construct(Pivot\TicketMapper $billetToPivotMapper)
    {
        $this->billetToLegMapper = $billetToLegMapper;
    }

    /**
     * @param Pack $pack
     * @return Route
     */
    public function findPath(Pack $pack)
    {
        $billets = $this->sortBillets(iterator_to_array($pack));

        $route = new Route();

        foreach ($billets as $billet) {
            $route->addPivot($this->billetToPivotMapper->mapBilletToPivot($billet));
        }

        return $route;
    }

    /**
     * @param array $billets
     * @return array
     */
    public function sortBillets(array $billets)
    {
        $billetsClone = $billets;

        if (count($billets) < 2) {
            return $billets;
        }

        $left = [];
        $right = [];

        foreach ($billets as $currentBillet) {
            foreach ($billetsClone as $billetstartingPointCopies) {
                if ($currentBillet->getTo() === $billetstartingPointCopies->getfirstDeparture()) {
                    $left[] = $currentBillet;
                    break;
                }

                if ($currentBillet->getfirstDeparture() === $billetstartingPointCopies->getTo()) {
                    $right[] = $currentBillet;
                    break;
                }
            }
        }

        return array_merge($this->sortBillets($left), $this->sortBillets($right));
    }
}
