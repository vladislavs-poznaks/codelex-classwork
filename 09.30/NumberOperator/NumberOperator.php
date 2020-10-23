<?php

class NumberOperator
{
    private array $numbers;

    private int $min;
    private int $max;

    public function __construct(array $numbers, int $min = 1, int $max = 1000)
    {
        $this->numbers = $numbers;
        $this->min = $min;
        $this->max = $max;
    }

    public function getRandomNumber(): int
    {
        return rand($this->min, $this->max);
    }

    public function addNumber(int $number): void
    {
        $this->numbers[] = $number;
    }

    public function getAllNumbers(): array
    {
        return $this->numbers;
    }

    public function getAverageNumber(): float
    {
        return array_sum($this->numbers) / count($this->numbers);
    }

    public function getNumberRow(): string
    {
        return implode(' ', $this->numbers);
    }
}
