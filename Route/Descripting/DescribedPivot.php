<?php

namespace Journey\Route\Descripting;

use Journey\Route;

/**
 * Class DescribedPivot
 * @package Route\Descriping
 */
class DescribedPivot
{
    /**
     * @var string
     */
    private $mainLine;

    /**
     * @var string
     */
    private $secondLine;

    /**
     * DescribedPivot constructor.
     * @param string $mainLine
     * @param string $secondLine
     */
    public function __construct($mainLine = null, $secondLine = null)
    {
        $this->mainLine = $mainLine;
        $this->secondLine = $secondLine;
    }

    /**
     * @return string
     */
    public function getMainLine()
    {
        return $this->mainLine;
    }

    /**
     * @param string $mainLine
     */
    public function setMainLine($mainLine)
    {
        $this->mainLine = $mainLine;
    }

    /**
     * @return string
     */
    public function getSecondLine()
    {
        return $this->secondLine;
    }

    /**
     * @param string $secondLine
     */
    public function setSecondLine($secondLine)
    {
        $this->secondLine = $secondLine;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $line = $this->mainLine;

        if ($this->secondLine) {
            $line .= PHP_EOL.$this->secondLine;
        }

        return $line;
    }
}
