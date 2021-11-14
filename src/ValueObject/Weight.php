<?php

declare(strict_types=1);

namespace App\ValueObject;

use LogicException;

class Weight
{
    private int $unit;
    private float $value;

    function __construct(float $value, int $unit = 0)
    {
        $this->value = $value;
        $this->unit = $unit;
    }

    public function getUnit(): int
    {
        return $this->unit;
    }

    public function getValue(): float
    {
        if ($this->value < 0.0) {
            throw new LogicException("Value can't be less than 0.0");
        }

        return $this->value;
    }
}
