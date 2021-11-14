<?php

declare(strict_types=1);

namespace App\ValueObject;

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
        return $this->value;
    }
}
