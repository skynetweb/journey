<?php

namespace Journey\Transport;

use Journey\Route\Descripting\DescriptionPatternInterface;

/**
 * Class AbstractTransport
 * @package Journey\Transport
 */
abstract class AbstractTransport implements DescriptionPatternInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @param string $identifier
     */
    public function __construct($id = null)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setIdentifier($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return static::getTransportName();
    }
}
