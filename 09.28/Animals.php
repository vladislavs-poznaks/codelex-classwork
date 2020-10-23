<?php

interface AnimalInterface
{

}

class AnimalCollection
{
    /**
     * @var AnimalInterface[]
     */
    private array $animals = [];

    public function add(AnimalInterface $animal): void
    {
        $this->animals[] = $animal;
    }

    public function all(): array
    {
        return $this->animals;
    }
}

class Shark implements AnimalInterface
{
    private int $chanceToLive = 70;

    public function getName(): string
    {
        return get_class($this);
    }

    public function survived($choice): bool
    {
        return $choice >= $this->chanceToLive;
    }
}

class Puma implements AnimalInterface
{
    private int $chanceToLive = 70;

    public function getName(): string
    {
        return get_class($this);
    }

    public function survived($choice): bool
    {
        return $choice >= $this->chanceToLive;
    }
}

class Turtle implements AnimalInterface
{
    private int $chanceToLive = 20;

    public function getName(): string
    {
        return get_class($this);
    }

    public function survived($choice): bool
    {
        return $choice >= $this->chanceToLive;
    }
}

class Penguin implements AnimalInterface
{
    private int $chanceToLive = 20;

    public function getName(): string
    {
        return get_class($this);
    }

    public function survived($choice): bool
    {
        return $choice >= $this->chanceToLive;
    }
}

$zoo = new AnimalCollection();

$zoo->add(new Shark());
$zoo->add(new Puma());
$zoo->add(new Turtle());
$zoo->add(new Penguin());

$alive = true;
foreach ($zoo->all() as $animal) {

    $choice = rand(1, 100);

    echo 'Feeding ' . $animal->getName() . '. Wish me luck!' . PHP_EOL;
    switch ($animal->survived($choice)) {
        case true:
            echo 'Hell, yeah! ' . $animal->getName() . ' is fed!' . PHP_EOL;
            break;
        case false:
            echo 'Oh, noooo... ' . $animal->getName() . ' is OVERfed!' . PHP_EOL;
            $alive = false;
            break;
    }

    if (! $alive) break;

}

echo ($alive ? 'Caretaker owns the zoo!' : 'There\'s an accident to report..') . PHP_EOL;