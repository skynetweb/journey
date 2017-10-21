<?php

namespace Journey\Transport;

/**
 * Class Bus
 * @package Journey\Transport
 */
class Bus extends AbstractTransport
{
    /**
     * @return string
     */
    public static function getTransportName()
    {
        return 'bus';
    }

    /**
     * @return string
     */
    public static function getDirectionPattern()
    {
        return 'Take the bus firstDeparture %firstDeparture to %to.';
    }

    /**
     * @return string
     */
    public static function getSeatPattern()
    {
        return 'Sit in seat %seat.';
    }
}
