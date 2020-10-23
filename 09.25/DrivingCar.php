<?php

class Car
{
    private string $make;
    private string $numberPlate;
    private int $fuelCapacity;
    private int $pin;

    private int $fuelLeft;
    private int $mileage;
    private bool $hasFuel;

    public function __construct($make, $numberPlate, $fuelCapacity, $pin) {
        $this->make = $make;
        $this->numberPlate = $numberPlate;
        $this->fuelCapacity = $fuelCapacity;
        $this->pin = $pin;

        $this->fuelLeft = $fuelCapacity;
        $this->mileage = 0;
        $this->hasFuel = true;
    }

    public function getMake(): string
    {
        return $this->make;
    }

    public function getNumberPlate(): string
    {
        return $this->numberPlate;
    }

    public function getFuelCapacity(): int
    {
        return $this->fuelCapacity;
    }

    public function getFuel(): string
    {
        return $this->fuelLeft;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function getPin(): int
    {
        return $this->pin;
    }

    public function checkPin($pin): bool
    {
        return $pin === $this->pin;
    }

    public function hasFuel(): bool
    {
        return $this->hasFuel;
    }

    public function burnFuel(): void
    {
        if ($this->fuelLeft > 0) {
            $this->fuelLeft--;
        } else {
            $this->hasFuel = false;
        }
    }

    public function addMileage($km): void
    {
        $this->mileage += $km;
    }
}

// App
$cars = [
    new Car("Audi", "MM-3939", 65, 111),
    new Car("KIA", "AA-1111", 45, 222),
    new Car("Opel", "PM-45", 75, 333),
    ];

// Car List
echo "Available cars" . PHP_EOL;
foreach ($cars as $car) {
    echo $car->getMake()
        . ", number plate "
        . $car->getNumberPlate()
        . ", fuel capacity "
        . $car->getFuelCapacity()
        . " l. PIN code: "
        . $car->getPin()
        . PHP_EOL;
}

// Choosing car
do {
    $chosenMake = readline("Choose car make: ");
} while (! isMake($chosenMake, $cars));

$car = getChosenCar($chosenMake, $cars);

// Entering PIN
$pinCount = 0;
do {
    $pin = (int) readline("Enter PIN: ");
    $pinCount++;
    echo ($car->checkPin($pin) ? "PIN correct!" : "PIN incorrect, " . (3 - $pinCount) . " tries remaining.") . PHP_EOL;
} while (! $car->checkPin($pin) && $pinCount < 3);

if ($pinCount > 2) {
    echo "PIN incorrect 3x." . PHP_EOL;
    $distance = 0;
} else {
    $distance = (int) readline("Enter distance: ");
}

// Driving :)
$driven = 0;
while ($distance > 0 && $car->hasFuel()) {
    $driven += 10;
    $car->addMileage(10);

    $distance -= 10;
    $car->burnFuel();

    echo "Car " . $car->getMake(), ", number plate " . $car->getNumberPlate() . ", driven $driven km." . PHP_EOL;
    echo "Odometer: " . $car->getMileage() . " km." . PHP_EOL;
    echo "Distance remaining: $distance km. Fuel remaining: " . $car->getFuel() . " l." . PHP_EOL;

    sleep(1);
}

// Helper functions
function isMake($make, $cars): bool
{
    foreach ($cars as $car) {
        if (strtolower($car->getMake()) === strtolower($make)) {
            return true;
        }
    }
    return false;
}

function getChosenCar($make, $cars): Car
{
    foreach ($cars as $car) {
        if (strtolower($car->getMake()) === strtolower($make)) {
            return $car;
        }
    }
}
