<?php

class Person
{
    private int $id;
    private string $first;
    private string $last;
    private int $pin;

    public function __construct(int $id, string $first, string $last, int $pin)
    {
        $this->id = $id;
        $this->first = $first;
        $this->last = $last;
        $this->pin = $pin;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirst(): string
    {
        return $this->first;
    }

    public function getLast(): string
    {
        return $this->last;
    }

    public function getPin(): int
    {
        return $this->pin;
    }

    public function getFullName(): string
    {
        return $this->first . ' ' . $this->last;
    }
}
