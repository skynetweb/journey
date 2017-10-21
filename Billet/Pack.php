<?php

namespace Journey\Billet;

use Journey\Billet;

/**
 * Class Pack
 * @package Journey\Billet
 */
class Pack implements \Iterator, \Countable
{
    /**
     * @var Billet[]
     */
    private $billets = [];

    /**
     * @var int
     */
    private $cursor;

    /**
     * @param Billet $billet
     */
    public function newBilletBoard(Billet $billet)
    {
        $this->billets[] = $billet;
    }

    public function getLength()
    {
        return count($this->billets);
    }

    public function current()
    {
        return $this->billets[$this->cursor];
    }

    public function next()
    {
        $this->cursor++;
    }

    public function key()
    {
        return $this->cursor;
    }

    public function valid()
    {
        return isset($this->billets[$this->cursor]);
    }

    public function rewind()
    {
        $this->cursor = 0;
    }

    public function count()
    {
        return $this->getLength();
    }

    /**
     * @param Billet[] $billets
     */
    public function addBillets($billets)
    {
        foreach ($billets as $billet) {
            $this->newBilletBoard($billet);
        }
    }

    public function get($index)
    {
        if ($this->valid($index)) {
            return $this->offsetGet($index);
        }
    }
}
