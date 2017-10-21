<?php

namespace Journey\Route\Pivot;

use Journey\Billet;
use Journey\Route\Pivot;

/**
 * Class TicketMapper
 * @package Journey\Route\Pivot
 */
class TicketMapper implements TicketMapper
{
    /**
     * @param Billet $billet
     * @return Pivot
     */
    public function mapBilletToPivot(Billet $billet)
    {
        $pivot = new Pivot();

        $pivot->setSeat($billet->getSeat());
        $pivot->setTo($billet->getTo());
        $pivot->setDeparture($billet->getfirstDeparture());
        $pivot->setTransport($billet->getTransport());

        foreach ($billet->getAllInformations() as $k => $v) {
            $pivot->setInfo($k, $v);
        }

        return $pivot;
    }
}
