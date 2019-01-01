<?php

declare(strict_types=1);

namespace App\Entity;

class OrderPrice
{
    /**
     * @var Price
     */
    private $price;

    /**
     * @var Vat
     */
    private $vat;

    public function __construct(Price $price, Vat $vat)
    {
        $this->price = $price;
        $this->vat = $vat;
    }

    /**
     * @return Price
     */
    public function getPrice(): Price
    {
        return $this->price;
    }

    /**
     * @return Vat
     */
    public function getVat(): Vat
    {
        return $this->vat;
    }
}
