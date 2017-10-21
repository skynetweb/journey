<?php

namespace Journey\Billet\Factory;

use Journey\Billet\InvalidTicketException;
use Journey\Billet;

interface TicketFactoryInterface
{
    /**
     * @param $data
     * @throws InvalidTicketException
     * @return Billet
     */
    public function create($data);
}
