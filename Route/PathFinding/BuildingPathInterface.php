<?php

namespace Journey\Route\PathFinding;

use Journey\Billet\Pack;
use Journey\Route;

/**
 * This interface represents both a creation and sorting algorithm for a Route.
 *
 * Interface BuildingPathInterface
 * @package Journey\Route\PathFinding
 */
interface BuildingPathInterface
{
    /**
     * @param Pack $pack
     * @return Route
     */
    public function findPath(Pack $pack);
}
