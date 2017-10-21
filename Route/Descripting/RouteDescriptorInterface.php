<?php

namespace Journey\Route\Descripting;

use Journey\Route;

/**
 * Interface RouteDescriptorInterface
 * @package Route\Descriping
 */
interface RouteDescriptorInterface
{
    /**
     * @param Route $route
     * @return RouteDescription
     */
    public function humanReadable(Route $route);

    /**
     * and the seat placement.
     *
     * @param string|object $definitionSource
     */
    public function addDescriptionPattern($definitionSource);

    /**
     * Bulk add a description patterns
     *
     * @see RouteDescriptorInterface::addDescriptionPattern
     *
     * @param $definitionSources
     */
    public function addDescriptionPatterns($definitionSources);
}
