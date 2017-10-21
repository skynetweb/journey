<?php

namespace Journey\Transport;

/**
 * Class Flight
 * @package Journey\Transport
 */
class Flight extends AbstractTransport
{
    /**
     * @return string
     */
    public static function getTransportName()
    {
        return 'flight';
    }

    /**
     * @return string
     */
    public static function getDirectionPattern()
    {
        return 'firstDeparture %firstDeparture, take flight %identifier to %to.';
    }

    /**
     * @return string
     */
    public static function getSeatPattern()
    {
        return 'Gate %gate, seat %seat.';
    }
}
