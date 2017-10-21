<?php

namespace Journey;

use Journey\Transport\AbstractTransport;

/**
 * Class Ticket
 * @package Journey
 */
class Ticket
{
    /**
     * @var string
     */
    private $firstDeparture;

    /**
     * @var string
     */
    private $to;

    /**
     * @var string
     */
    private $seat;

    /**
     * @var AbstractTransport
     */
    private $transport;

    /**
     * @var string[]
     */
    private $info = [];

    /**
     * Ticket constructor.
     * @param string $firstDeparture
     * @param string $to
     * @param string $seat
     * @param AbstractTransport $transport
     */
    public function __construct($firstDeparture = null, $to = null, $seat = null, AbstractTransport $transport = null)
    {
        $this->firstDeparture = $firstDeparture;
        $this->to = $to;
        $this->seat = $seat;
        $this->transport = $transport;
    }

    /**
     * @return string
     */
    public function getfirstDeparture()
    {
        return $this->firstDeparture;
    }

    /**
     * @param string $firstDeparture
     */
    public function setDeparture($firstDeparture)
    {
        $this->firstDeparture = $firstDeparture;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @param string $seat
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;
    }

    /**
     * @return AbstractTransport
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param AbstractTransport $transport
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
    }

    /**
     * @param $name
     * @return bool
     */
    public function getInfo($name)
    {
        return isset($this->info[$name]) ? $this->info[$name] : null;
    }

    /**
     * @param $name
     * @param $value
     */
    public function setInfo($name, $value)
    {
        $this->info[$name] = $value;
    }

    /**
     * @return \string[]
     */
    public function getAllInformations()
    {
        return $this->info;
    }
}
