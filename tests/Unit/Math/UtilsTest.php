<?php

declare(strict_types=1);

namespace App\Tests\Unit\Math;

use App\Math\Utils;
use App\ValueObject\Dimension;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{

    public function dataSetsForTestCalculateVolume(){
        return [
            [2.0, 4.0, 1.0, 8.0],
            [0.0, 4.0, 1.0, 0.0],
            [2.0, 0.0, 1.0, 0.0],
        ];
    }

    /**
     * @dataProvider dataSetsForTestCalculateVolume
     */
    public function testCalculateVolume($width, $height, $length, $expected)
    {
        $utils = new Utils();
        $dimension = $this->getMockBuilder(Dimension::class)
            ->disableOriginalConstructor()
            ->getMock();
        $dimension->method('getWidth')->willReturn($width);
        $dimension->method('getHeight')->willReturn($height);
        $dimension->method('getLength')->willReturn($length);

        $volume = $utils->calculateVolume($dimension);
        $this->assertSame($expected, $volume);
    }
}
