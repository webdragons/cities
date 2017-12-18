<?php

namespace bulldozer\cities\common\entities;

class Phone
{
    /**
     * @var string
     */
    private $value;

    /**
     * Phone constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}