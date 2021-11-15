<?php

namespace App\Tests\Unit\Shipping;

use App\Entity\Product;
use App\Shipping\CostCalculator;
use App\Shipping\CostCalculator\DHLCalculator;
use App\Shipping\CostCalculator\FedexCalculator;
use PHPUnit\Framework\TestCase;

class CostCalculatorTest extends TestCase
{
    public function testCalculate()
    {
        $dhlCalculator = $this->getMockBuilder(DHLCalculator::class)
            ->disableOriginalConstructor()
            ->getMock()
            ;

        $dhlCalculator->method('supports')->willReturn(true);
        $dhlCalculator->method('getCost')->willReturn(21.0);

        $fedexCalculator = $this->getMockBuilder(FedexCalculator::class)
            ->disableOriginalConstructor()
            ->getMock();

        $calculators = [
            $dhlCalculator,
            $fedexCalculator,
        ];

        $costCalculator = new CostCalculator($calculators);

        $product = $this->getMockBuilder(Product::class)->getMock();
        $calculatedCost = $costCalculator->calculate('dhl', $product);

        $this->assertSame(21.0, $calculatedCost);
    }

    public function testCalculateException()
    {
        $dhlCalculator = $this->getMockBuilder(DHLCalculator::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $fedexCalculator = $this->getMockBuilder(FedexCalculator::class)
            ->disableOriginalConstructor()
            ->getMock();

        $calculators = [
            $dhlCalculator,
            $fedexCalculator,

        ];

        $costCalculator = new CostCalculator($calculators);

        $product = $this->getMockBuilder(Product::class)->getMock();
        $calculatedCost = $costCalculator->calculate('dhl', $product);

    }
}