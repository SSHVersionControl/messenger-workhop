<?php

declare(strict_types=1);

namespace App\Entity;

class Order
{
    /**
     * @var Uuid
     */
    private $uuid;

    /**
     * @var OrderPrice
     */
    private $orderPrice;

    /**
     * @var array
     */
    private $orderPrices;

    public function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return Uuid
     */
    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    /**
     * @return OrderPrice
     */
    public function getOrderPrice(): OrderPrice
    {
        return $this->orderPrice;
    }

    /**
     */
    public function setOrderPrices(array $orderPrices): void
    {
        $this->orderPrices = $orderPrices;
    }

    /**
     * @return array
     */
    public function getOrderPrices(): array
    {
        return $this->orderPrices;
    }

    /**
     * @param OrderPrice $orderPrice
     */
    public function setOrderPrice(OrderPrice $orderPrice): void
    {
        $this->orderPrice = $orderPrice;
    }
}
