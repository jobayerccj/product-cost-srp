<?php

declare(strict_types=1);

namespace App\Shipping;

use App\Entity\Product;
use App\Shipping\CostCalculator\CalculatorInterface;
use InvalidArgumentException;

class CostCalculator
{
    /**
     * @var CalculatorInterface[]
     */
    private array $calculators;

    /**
     * @param CalculatorInterface[] $calculators
     */
    public function __construct(array $calculators)
    {
        $this->calculators = $calculators;
    }

    public function calculate(string $shippingMethod, Product $product): float
    {
        foreach ($this->calculators as $calculator) {
            if ($calculator->supports($shippingMethod, $product)) {
                return $calculator->getCost($product);
            }
        }

        throw new InvalidArgumentException('');
    }
}
