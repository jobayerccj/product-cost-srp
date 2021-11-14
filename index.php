<?php

declare(strict_types=1);

use App\Entity\Product;
use App\Entity\Seller;
use App\Math\Utils;
use App\Shipping\CostCalculator;
use App\Shipping\CostCalculator\DHLCalculator;
use App\Shipping\CostCalculator\FedexCalculator;
use App\Shipping\CostCalculator\PathaoOverweightCalculator;
use App\Shipping\CostCalculator\PathaoUnderweightCalculator;
use App\ValueObject\Dimension;
use App\ValueObject\Weight;

require_once __DIR__ . '/vendor/autoload.php';

$mathUtils = new Utils();
$calculators = [
    new DHLCalculator($mathUtils),
    new FedexCalculator($mathUtils),
    new PathaoOverweightCalculator(),
    new PathaoUnderweightCalculator(),
];

$costCalculator = new CostCalculator($calculators);

$selectedShippingMethod = 'pathao';
$product = (new Product())
    ->setDimension(new Dimension(2, 4, 1))
    ->setWeight(new Weight(7))
    ->setSeller(
        (new Seller())->setDistrict('Chattogram')
    )
;

$cost = $costCalculator->calculate($selectedShippingMethod, $product);

echo $cost . PHP_EOL;