<?php

namespace Journey\Route\Descripting;

/**
 * Interface DescriptionPatternInterface
 * @package Journey\Route\Descripting
 */
interface DescriptionPatternInterface
{
    /**
     * @return string
     */
    public static function getTransportName();

    /**
     * @return string
     */
    public static function getDirectionPattern();

    /**
     * @return string
     */
    public static function getSeatPattern();
}
