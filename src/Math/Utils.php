<?php

declare(strict_types=1);

namespace App\Math;

use App\ValueObject\Dimension;

class Utils
{
    public function calculateVolume(Dimension $dimension): float
    {
        return $dimension->getHeight() * $dimension->getLength() * $dimension->getWidth();
    }
}