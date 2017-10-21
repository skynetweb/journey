<?php

namespace Journey\Transport\Factory;

use Journey\Transport\AbstractTransport;

/**
 * Class TransportNamesFactory
 * @package Journey\Transport\Factory
 */
class TransportNamesFactory implements TransportFactoryInterface
{
    /**
     * @var string[]
     */
    private $types;

    /**
     * @param $type
     * @param $class
     */
    public function createTransportType($type, $class)
    {
        $this->types[$type] = $class;
    }

    /**
     * @param string $name
     * @param string|null $identifier
     * @return AbstractTransport
     */
    public function initialize($name, $identifier = null)
    {
        if (!isset($this->types[$name])) {
            throw new \OutOfBoundsException(sprintf('Transporation type %s not found!', $name));
        }

        $transport = new $this->types[$name]($identifier);

        return $transport;
    }

    /**
     * @return string[]
     */
    public function loadAllTransportationTypes()
    {
        return $this->types;
    }
}
