<?php

namespace App\Tests\Unit\Shipping\CostCalculator;

use App\Entity\Product;
use App\Math\Utils;
use App\Shipping\CostCalculator\DHLCalculator;
use App\ValueObject\Dimension;
use App\ValueObject\Weight;
use PHPUnit\Framework\TestCase;

class DHLCalculatorTest extends TestCase
{
    public function dataSetsForTestSupports(): array
    {
        return [
            ['dhl', true],
            ['ahl', false]
        ];
    }

    /**
     * @param $method
     * @param $expected
     * @dataProvider dataSetsForTestSupports
     */
    public function testSupports($method, $expected)
    {
        $mathUtils = $this->getMockBuilder(Utils::class)->getMock();
        $dhlCalculator = new DHLCalculator($mathUtils);

        $product = $this->getMockBuilder(Product::class)
            ->disableOriginalConstructor()
            ->getMock();

        $supportResult = $dhlCalculator->supports($method, $product);

        $this->assertSame($expected, $supportResult);
    }

    public function dataSetsForTestGetCost(): array
    {
        return [
            [6.0, 2.0, 21.0],
            [7.0, 3.0, 25.5],
        ];
    }

    /**
     * @param $calculatedVolume
     * @param $weightValue
     * @param $expectedCost
     * @dataProvider dataSetsForTestGetCost
     */
    public function testGetCost($calculatedVolume, $weightValue, $expectedCost)
    {
        $mathUtils = $this->getMockBuilder(Utils::class)->getMock();
        $mathUtils->method('calculateVolume')->willReturn($calculatedVolume);

        $product = $this->getMockBuilder(Product::class)
            ->disableOriginalConstructor()
            ->getMock();

        $dimension = $this->getMockBuilder(Dimension::class)
            ->disableOriginalConstructor()
            ->getMock();

        $weight = $this->getMockBuilder(Weight::class)
            ->disableOriginalConstructor()
            ->getMock();
        $weight->method('getValue')->willReturn($weightValue);

        $product->method('getDimension')->willReturn($dimension);
        $product->method('getWeight')->willReturn($weight);

        $dhlCalculator = new DHLCalculator($mathUtils);
        $calculatedCost = $dhlCalculator->getCost($product);

        $this->assertSame($expectedCost, $calculatedCost);
    }
}
