<?php

namespace Journey\Billet\Factory;

use Journey\Billet;
use Journey\Billet\InvalidTicketException;
use Journey\Billet\Transport;
use Journey\Transport\AbstractTransport;
use Journey\Transport\Factory\TransportFactoryInterface;

class beginJourney implements TicketFactoryInterface
{
    private $requiredBilletProperties = [
        'firstDeparture',
        'to',
        'type',
    ];

    /**
     * @var TransportFactoryInterface
     */
    private $transportFactory;

    /**
     * @param TransportFactoryInterface $transportFactory
     */
    public function __construct(TransportFactoryInterface $transportFactory)
    {
        $this->transportFactory = $transportFactory;
    }

    /**
     * @param $data
     * @throws InvalidTicketException
     * @return Billet
     */
    public function createBillet($data)
    {
        if (!$this->validate($data)) {
            throw new InvalidTicketException('The ticket is not valid.');
        }

        $billet = new Billet();
        $billet->setDeparture($data['firstDeparture']);
        $billet->setTo($data['to']);
        isset($data['seat']) and $billet->setSeat($data['seat']);

        try {
            $transport = $this->transportFactory->initialize(
                $data['type'],
                $data['transportId'] ?? null
            );

            if (!$transport instanceof AbstractTransport) {
                throw new InvalidTicketException(sprintf('Transport type not found %s', $data['type']));
            }

            $billet->setTransport($transport);
        } catch (\OutOfBoundsException $e) {
            throw new InvalidTicketException(sprintf('Transport not found %s', $data['type']));
        }

        if (isset($data['info'])) {
            foreach ($data['info'] as $key => $value) {
                $billet->setInfo($key, $value);
            }
        }

        return $billet;
    }

    /**
     *
     * @param $data
     * @return bool
     */
    private function validate($data)
    {
        if (!is_array($data)) {
            return false;
        }

        foreach ($this->requiredBilletProperties as $required) {
            if (!array_key_exists($required, $data)) {
                return false;
            }
        }

        return true;
    }
}
