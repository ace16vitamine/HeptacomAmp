<?php

namespace HeptacomAmp\Components\CssParser\PreTokenizer;

/**
 * Class PreToken
 * @package HeptacomAmp\Components\CssParser\PreTokenizer
 */
class PreToken
{
    /**
     * @var int
     */
    private $depth;

    /**
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @var string
     */
    private $value;

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * PreToken constructor.
     * @param int $depth
     * @param string $value
     */
    public function __construct($depth, $value)
    {
        $this->depth = $depth;
        $this->value = $value;
    }
}