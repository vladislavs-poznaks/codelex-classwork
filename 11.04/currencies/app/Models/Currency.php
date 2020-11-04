<?php

namespace App\Models;

class Currency implements ModelInterface
{
    private string $currency;
    private float $rate;

    public function __construct(string $currency, float $rate)
    {
        $this->currency = $currency;
        $this->rate = $rate;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public static function create(array $data): Currency
    {
        return new self(
            $data['currency'],
            (float) $data['rate']
        );
    }
}