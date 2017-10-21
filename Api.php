<?php

namespace Journey;

use Journey\Billet\Factory\TicketFactoryInterface;
use Journey\Billet\Pack;
use Journey\Route\Descripting\{RouteDescription, RouteDescriptorInterface};
use Journey\Route\PathFinding\BuildingPathInterface;
use Journey\Transport\Factory\TransportFactoryInterface;

/**
 * Class Api
 * @package Journey
 */
class Api
{
    /**
     * @var TicketFactoryInterface
     */
    private $ticketFactory;

    /**
     * @var BuildingPathInterface
     */
    private $buildingPath;

    /**
     * @var RouteDescriptorInterface
     */
    private $descriptor;

    /**
     * @param TicketFactoryInterface $billetFactory
     * @param BuildingPathInterface $buildingPath
     * @param RouteDescriptorInterface $routeDescriptor
     */
    public function __construct(
        TicketFactoryInterface $ticketFactory,
        BuildingPathInterface $buildingPath,
        RouteDescriptorInterface $routeDescriptor
    ) {
        $this->ticketFactory = $ticketFactory;
        $this->buildingPath = $buildingPath;
        $this->descriptor = $routeDescriptor;
    }

    /**
     * Create a new group of objects instances
     *
     * @param $data
     * @return Pack
     */
    public function createNewGroup($data)
    {
        $pack = new Pack();

        foreach ($data as $obj) {
            $pack->newBilletBoard($this->ticketFactory->create($obj));
        }

        return $pack;
    }

    /**
     * @param Pack $pack
     * @return Track
     */
    public function findTrack(Pack $pack)
    {
        return $this->buildingPath->findPath($pack);
    }

    /**
     * @param Route $route
     * @return RouteDescription
     */
    public function humanReadable(Route $route)
    {
        return $this->descriptor->humanReadable($route);
    }
}
