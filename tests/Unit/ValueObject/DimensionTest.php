<?php

declare(strict_types=1);

namespace App\Tests\Unit\ValueObject;

use App\ValueObject\Dimension;
use LogicException;
use PHPUnit\Framework\TestCase;

class DimensionTest extends TestCase
{
    public function dataSetsForTestGetWidth(): array
    {
        return [
            [1.0, 2.0, 1.0, 1.0],
        ];
    }

    /**
     * @dataProvider dataSetsForTestGetWidth
     */
    public function testGetWidth($width, $height, $length, $expecetd)
    {
        $dimension = new Dimension($width, $height, $length);
        $this->assertSame($expecetd, $dimension->getWidth());
    }

    public function dataSetsForTestGetWidthWithException(): array
    {
        return [
            [-1.0, 2.0, 1.0, 1.0],
        ];
    }

    /**
     * @param $width
     * @param $height
     * @param $length
     * @dataProvider dataSetsForTestGetWidthWithException
     */
    public function testGetWidthWithException($width, $height, $length)
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage("Width can't be less than 0.0");
        $dimension = new Dimension($width, $height, $length);
        $dimension->getWidth();
    }
}
