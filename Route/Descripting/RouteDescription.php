<?php

namespace Journey\Route\Descripting;

use Journey\Route;

/**
 * Class RouteDescription
 * @package Route\Descriping
 */
class RouteDescription
{
    /**
     * @var DescribedPivot[]
     */
    private $describedPivots = [];

    /**
     * @return string
     *
     */
    public function getAsFullText()
    {
        return implode(PHP_EOL, $this->describedPivots);
    }

    /**
     * @param DescribedPivot $describedPivot
     */
    public function addDescribedPivot(DescribedPivot $describedPivot)
    {
        $this->describedPivot[] = $describedPivot;
    }

    /**
     * @return DescribedPivot[]
     */
    public function getDescribedPivots()
    {
        return $this->describedPivots;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getAsFullText();
    }
}
