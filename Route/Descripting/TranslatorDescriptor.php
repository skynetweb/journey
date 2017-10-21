<?php

namespace Journey\Route\Descripting;

use Journey\Route;
use Journey\Exception\InvalidTransportException;

/**
 * Class TranslatorDescriptor
 * @package Route\Descriping
 */
class TranslatorDescriptor implements RouteDescriptorInterface
{
    private $patterns = [
        'directions' => [],
        'seat' => []
    ];

    /**
     * This method iterates over a route Pivots and converts to human readable text.
     *
     * @param Route $route
     * @return RouteDescription
     */
    public function humanReadable(Route $route)
    {
        $description = new RouteDescription();

        foreach ($route->getAllPivots() as $pivot) {
            $transportName = $pivot->getTransport()->getName();

            if (!isset($this->patterns['directions'][$transportName]) || !(isset($this->patterns['seat'][$transportName]))) {
                throw new InvalidTransportException(
                    sprintf('Transport not found %s', $transportName)
                );
            }

            $directionString = $this->patterns['directions'][$transportName];
            $seatString = ($pivot->getSeat()) ? $this->patterns['seat'][$transportName] : 'No seat assignment.';

            $describedPivot = new DescribedPivot();
            $describedPivot->setMainLine(
                $this->translate(
                    $directionString.' '.$seatString,
                    [
                        'firstDeparture' => $pivot->getfirstDeparture(),
                        'to'             => $pivot->getTo(),
                        'identifier'     => $pivot->getTransport()->getId(),
                        'seat'           => $pivot->getSeat(),
                        'gate'           => $pivot->getInfo('gate')
                    ]
                )
            );

            if (!empty($pivot->getInfo('note'))) {
                $describedPivot->setSecondLine($pivot->getInfo('note'));
            }

            $description->addDescribedPivot($describedPivot);
        }

        return $description;
    }

    /**
     * Parses a template and populates with data.
     *
     * @param $string
     * @param array $data
     * @return string
     */
    private function translate($string, array $data)
    {
        foreach ($data as $k => $v) {
            $string = str_replace('%'.$k, $v, $string);
        }

        return $string;
    }

    /**
     * and the seat placement.
     *
     * @param string|object $definitionSource
     */
    public function addDescriptionPattern($definitionSource)
    {
        if (is_string($definitionSource)) {
            if (!(new \ReflectionClass($definitionSource))->implementsInterface('Journey\Route\Descripting\DescriptionPatternInterface')) {
                throw new \InvalidArgumentException(
                    'Given class or object is not am implementation of DescriptionPatternInterface (' . $definitionSource . ').'
                );
            }
        } elseif (is_object($definitionSource)) {
            if (!(new \ReflectionObject($definitionSource))->implementsInterface('Journey\Route\Descripting\DescriptionPatternInterface')) {
                throw new \InvalidArgumentException(
                    'Given class or object is not am implementation of DescriptionPatternInterface (' . get_class($definitionSource) . ').'
                );
            }
        }

        $this->patterns['directions'][$definitionSource::getTransportName()] = $definitionSource::getDirectionPattern();
        $this->patterns['seat'][$definitionSource::getTransportName()] = $definitionSource::getSeatPattern();
    }

    /**
     * @param array $definitionSources
     */
    public function addDescriptionPatterns($definitionSources)
    {
        foreach ($definitionSources as $definitionSource) {
            $this->addDescriptionPattern($definitionSource);
        }
    }
}
