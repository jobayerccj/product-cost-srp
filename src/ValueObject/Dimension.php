<?php

declare(strict_types=1);

namespace App\ValueObject;

use LogicException;

class Dimension
{
    private float $width;
    private float $height;
    private float $length;

    function __construct(float $width, float $height, float $length)
    {
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
    }

    public function getWidth(): float
    {
        if($this->width < 0.0) {
            throw new LogicException("Width can't be less than 0.0");
        }

        return $this->width;
    }

    public function getHeight(): float
    {
        if($this->height < 0.0) {
            throw new LogicException("Height can't be less than 0.0");
        }

        return $this->height;
    }

    public function getLength(): float
    {
        if($this->length < 0.0) {
            throw new LogicException("Length can't be less than 0.0");
        }

        return $this->length;
    }
}
