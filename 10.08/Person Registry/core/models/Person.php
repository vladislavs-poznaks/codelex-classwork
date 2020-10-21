<?php

class Person
{
    private string $first;
    private string $last;
    private string $code;
    private string $address;

    public function __construct(string $first, string $last, string $code, string $address)
    {
        $this->first = $first;
        $this->last = $last;
        $this->code = $code;
        $this->address = $address;
    }

    public function getFirst(): string
    {
        return $this->first;
    }

    public function getLast(): string
    {
        return $this->last;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
