<?php

namespace App\Tests\Unit\ValueObject;

use App\ValueObject\Weight;
use LogicException;
use PHPUnit\Framework\TestCase;

class WeightTest extends TestCase
{
    public function dataSetsForTestGetUnit(): array
    {
        return [
            [12.0, 1 , 1],
        ];
    }

    /**
     * @dataProvider dataSetsForTestGetUnit
     */
    public function testGetUnit($value, $unit, $expected)
    {
        $weight = new Weight($value, $unit);
        $unit = $weight->getUnit();

        $this->assertSame($expected, $unit);
    }

    public function dataSetsForTestGetValue(): array
    {
        return [
            [12.0, 1 , 12.0],
        ];
    }

    /**
     * @dataProvider dataSetsForTestGetValue
     */
    public function testGetValue($value, $unit, $expected)
    {
        $weight = new Weight($value, $unit);
        $unit = $weight->getValue();

        $this->assertSame($expected, $unit);
    }

    public function dataSetsForTestGetValueException(): array
    {
        return [
            [-12.0, 1 , 12.0],
        ];
    }

    /**
     * @dataProvider dataSetsForTestGetValueException
     */
    public function testGetValueException($value, $unit)
    {
        $this->expectException(LogicException::class);
        $weight = new Weight($value, $unit);
        $weight->getValue();
    }
}
