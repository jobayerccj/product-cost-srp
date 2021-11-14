<?php

declare(strict_types=1);

namespace App\Entity;

use App\ValueObject\Dimension;
use App\ValueObject\Weight;

class Product
{
    private Dimension $dimension;
    private Weight $weight;
    private Seller $seller;

    public function setSeller(Seller $seller): self
    {
        $this->seller = $seller;

        return $this;
    }

    public function getSeller(): Seller
    {
        return $this->seller;
    }

    public function setDimension(Dimension $dimension): self
    {
        $this->dimension = $dimension;

        return $this;
    }

    public function setWeight(Weight $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getDimension(): Dimension
    {
        return $this->dimension;
    }

    public function getWeight(): Weight
    {
        return $this->weight;
    }
}
