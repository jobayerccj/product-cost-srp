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
    public function testGetCost(){
        //mocking product

        //mocking mathUtils
        $mathUtils = $this->getMockBuilder(Utils::class)->getMock();
        $product = $this->getMockBuilder(Product::class)
            ->disableOriginalConstructor()
            ->getMock();

        $dimension = $this->getMockBuilder(Dimension::class)
            ->disableOriginalConstructor()
            ->getMock();

        $weight = $this->getMockBuilder(Weight::class)
            ->disableOriginalConstructor()
            ->getMock();

        $product->method('getDimension')->willReturn($dimension);
        $product->method('getWeight')->willReturn($weight);

        //dd($product->getWeight()->getValue());
        //$dhlCalculator = new DHLCalculator($mathUtils);
        //calculate cost
    }
}