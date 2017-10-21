<?php

namespace Journey;

use Journey\Route\Pivot;

/**
 * Class Route
 * @package Journey
 */
class Route implements \ArrayAccess
{
    /**
     * @var Pivot[]
     */
    private $pivots;

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->pivots[$offset]);
    }

    /**
     * @param mixed $offset
     * @return Pivot
     */
    public function offsetGet($offset)
    {
        return $this->pivots[$offset];
    }

    /**
     * @param mixed $offset
     * @param Pivot $value
     */
    public function offsetSet($offset, $value)
    {
        if (!$value instanceof Pivot) {
            throw new \InvalidArgumentException('Not an instance of Pivot');
        }

        $this->pivots[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->pivots[$offset]);
    }

    /**
     * @return string|null
     */
    public function getDeparture()
    {
        if (count($this->pivots) > 0) {
            return $this->pivots[0]->getfirstDeparture();
        }
    }

    /**
     * @return string|null
     */
    public function getArrivalLocation()
    {
        if (count($this->pivots) > 0) {
            return $this->pivots[count($this->pivots)-1]->getTo();
        }
    }

    /**
     * @param Pivot $pivot
     */
    public function addPivot(Pivot $pivot)
    {
        $this->pivots[] = $pivot;
    }

    /**
     * @param $index
     * @return Pivot
     */
    public function getPivot($index)
    {
        return $this->offsetGet($index);
    }

    /**
     * @return Route\Pivot[]
     */
    public function getAllPivots()
    {
        return $this->pivots;
    }
}
