<?php

namespace Core\Models;

class Product
{
    private string $name;
    private int $price;
    private int $count;

    public function __construct(string $name, int $price, int $count)
    {
        $this->name = $name;
        $this->price = $price;
        $this->count = $count;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function isAvailable(): bool
    {
        return $this->count > 0;
    }

    public function getInfo($showPrice = true, $showCount = true): string
    {
        return 'Product: '
            . $this->name
            . ($showPrice ? ', price: $' . number_format($this->price / 100, 2) : '')
            . ($showCount ? ', ' . $this->count . ' pcs.' : '');
    }

    public function reduceCount(): void
    {
        if ($this->count > 0) {
            $this->count--;
        }
    }

    public function increaseCount(): void
    {
        $this->count++;
    }
}
