<?php

class Investment
{
    private int $investment;
    private float $percentage;
    private int $years;

    public function __construct(int $investment, float $percentage, int $years)
    {
        $this->investment = $investment;
        $this->percentage = $percentage;
        $this->years = $years;
    }

    public function getInvestment(): int
    {
        return $this->investment;
    }

    public function getTotalReturn(): int
    {
        $total = $this->investment;

        for ($i = 1; $i <= $this->years; $i++) {
            $total *= 1 + $this->percentage / 100;
        }

        return $total;
    }
}
