<?php

class Person
{
    private string $name;
    private ?string $middle;
    private string $surname;

    public function __construct(string $name, string $surname, string $middle = null)
    {
        $this->name = $name;
        $this->middle = $middle;
        $this->surname = $surname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMiddle(): ?string
    {
        return $this->middle;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

}

$john = new Person('John', 'Doe', 'Albert');
$jane = new Person('Jane', 'Doe', 'Sofia');
$otis = new Person('Otis', 'Otison');

echo $john->getName() . ' ' . ($john->getMiddle() !== null ? $john->getMiddle() . ' ' : '') . $john->getSurname() . PHP_EOL;
echo $jane->getName() . ' ' . ($jane->getMiddle() !== null ? $jane->getMiddle() . ' ' : '') . $jane->getSurname() . PHP_EOL;
echo $otis->getName() . ' ' . ($otis->getMiddle() !== null ? $otis->getMiddle() . ' ' : '') . $otis->getSurname() . PHP_EOL;