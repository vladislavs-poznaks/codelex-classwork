<?php

class Car
{
    private string $make;
    private int $fuelTankCapacity;

    public function __construct(string $make, int $fuelTankCapacity)
    {
        $this->make = $make;
        $this->fuelTankCapacity = $fuelTankCapacity;
    }

    public function getMake(): string
    {
        return $this->make;
    }

    public function getFuelCapacity(): int
    {
        return $this->fuelTankCapacity;
    }

    public function honk(): string
    {
        return "Beep!";
    }

}

class Audi extends Car
{
    public function __construct($fuelTankCapacity)
    {
        parent::__construct("Audi", $fuelTankCapacity);
    }

    public function driveFast(): string
    {
        return "Whooosh and it's gone!";
    }
}

class BMW extends Car
{
    public function __construct($fuelTankCapacity)
    {
        parent::__construct("BMW", $fuelTankCapacity);
    }

    public function showTurnSignal(): string
    {
        return "It's a MIRACLE!";
    }
}

class Opel extends Car
{
    public function __construct($fuelTankCapacity)
    {
        parent::__construct("Opel", $fuelTankCapacity);
    }

    public function rust(): string
    {
        return "Shhhh, I can hear it rusting!";
    }
}

$cars = [
    new Car('Mustang', 100),
    new Audi(75),
    new BMW(65),
    new Opel(45)
];

foreach ($cars as $car) {
    echo "Car make: " . $car->getMake() . " with fuel tank capacity - " . $car->getFuelCapacity() . " l." . PHP_EOL;

    switch (get_class($car)) {
        case "Audi":
            echo $car->driveFast();
            break;
        case "BMW":
            echo $car->showTurnSignal();
            break;
        case "Opel":
            echo $car->rust();
            break;
        default:
            echo $car->honk();
    }

    echo PHP_EOL;
}

