<?php

declare(strict_types=1);

namespace App\Entity;

class Vat
{
    /**
     * @var int
     */
    private $vat;

    /**
     * @var string
     */
    private $country;

    public function __construct(int $vat, string $country)
    {
        $this->vat = $vat;
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }
}
