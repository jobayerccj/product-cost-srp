<?php

declare(strict_types=1);

namespace App\Entity;

class Seller
{
    private string $district;

    public function setDistrict(string $district): self
    {
        $this->district = $district;

        return $this;
    }

    public function getDistrict(): string
    {
        return $this->district;
    }
}