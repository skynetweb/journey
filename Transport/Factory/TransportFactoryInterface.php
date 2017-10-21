<?php

namespace Journey\Transport\Factory;

use Journey\Transport\AbstractTransport;

/**
 * Class TransportFactoryInterface
 * @package Journey\Transport\Factory
 */
interface TransportFactoryInterface
{
    /**
     * @param string $name
     * @param string|null $identifier
     * @return AbstractTransport
     */
    public function initialize($name, $identifier = null);

    /**
     * @return string[]
     */
    public function loadAllTransportationTypes();
}
