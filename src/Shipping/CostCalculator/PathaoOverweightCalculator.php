<?php

declare(strict_types=1);

namespace App\Shipping\CostCalculator;

use App\Entity\Product;

class PathaoOverweightCalculator implements CalculatorInterface
{
    public function supports(string $method, Product $product): bool
    {
        return $method === 'pathao' && $product->getWeight()->getValue() > 5;
    }

    public function getCost(Product $product): float
    {
        $baseCost = $product->getSeller()->getDistrict() === 'Dhaka' ? 100 : 150;

        return $baseCost + ($product->getWeight()->getValue() - 5) * 70;
    }
}
