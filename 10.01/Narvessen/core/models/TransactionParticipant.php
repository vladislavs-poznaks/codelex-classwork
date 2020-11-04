<?php

namespace Core\Models;

abstract class TransactionParticipant implements HasMoneyInterface, HasProductsInterface
{
    private int $money;
    private ProductCollection $products;

    public function __construct(int $money)
    {
        $this->money = $money;
        $this->products = new ProductCollection();
    }

    abstract public function getName(): string;

    public function getMoney(): int
    {
        return $this->money;
    }

    public function getInfo(): string
    {
        return $this->getName() . ', money: $' . number_format($this->getMoney() / 100, 2) . PHP_EOL;
    }

    public function getProducts(): ProductCollection
    {
        return $this->products;
    }

    public function hasMoney(int $amount): bool
    {
        return $this->money >= $amount;
    }

    public function reduceMoney(int $amount): void
    {
        if ($this->hasMoney($amount)) {
            $this->money -= $amount;
        }
    }

    public function increaseMoney(int $amount): void
    {
        $this->money += $amount;
    }
}
