<?php

namespace Journey\Transport;

/**
 * Class Train
 * @package Journey\Transport
 */
class Train extends AbstractTransport
{
    /**
     * @return string
     */
    public static function getTransportName()
    {
        return 'train';
    }

    /**
     * @return string
     */
    public static function getDirectionPattern()
    {
        return 'Take train %identifier firstDeparture %firstDeparture to %to.';
    }

    /**
     * @return string
     */
    public static function getSeatPattern()
    {
        return 'Sit in seat %seat.';
    }
}
