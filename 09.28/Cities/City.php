<?php

class City implements PopulatedArea, HasMayor
{
    private string $name;
    private Mayor $mayor;

    public function __construct(string $name, Mayor $mayor)
    {
        $this->name = $name;
        $this->mayor = $mayor;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMayor(): Mayor
    {
        return $this->mayor;
    }
}
