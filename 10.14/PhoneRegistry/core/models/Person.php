<?php

class Person
{
    private string $first;
    private string $last;
    private int $phone;

    public function __construct(string $first, string $last, int $phone)
    {
        $this->first = $first;
        $this->last = $last;
        $this->phone = $phone;
    }

    public function getFirst(): string
    {
        return $this->first;
    }

    public function getLast(): string
    {
        return $this->last;
    }

    public function getPhone(): int
    {
        return $this->phone;
    }

    public function getFullInfo(): string
    {
        return $this->first . ' ' . $this->last . ', phone number: ' . $this->phone;
    }
}
