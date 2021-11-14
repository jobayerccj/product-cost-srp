<?php

declare(strict_types=1);

namespace App\Shipping\CostCalculator;

use App\Entity\Product;

class PathaoUnderweightCalculator implements CalculatorInterface
{
    public function supports(string $method, Product $product): bool
    {
        return $method === 'pathao' && $product->getWeight()->getValue() <= 5;
    }

    public function getCost(Product $product): float
    {
        return $product->getSeller()->getDistrict() === 'Dhaka' ? 100 : 150;
    }
}
