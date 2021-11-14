<?php

declare(strict_types=1);

namespace App\Shipping\CostCalculator;

use App\Entity\Product;
use App\Math\Utils;

class DHLCalculator implements CalculatorInterface
{
    private Utils $mathUtils;

    public function __construct(Utils $mathUtils)
    {
        $this->mathUtils = $mathUtils;
    }

    public function supports(string $method, Product $product): bool
    {
        return $method === 'dhl';
    }

    public function getCost(Product $product): float
    {
        return $this->mathUtils->calculateVolume($product->getDimension()) * 3 +
            $product->getWeight()->getValue() * 1.5
        ;
    }
}
