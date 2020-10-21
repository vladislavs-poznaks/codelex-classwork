<?php

class PersonCollection
{
    /**
     * @var Person[]
     */
    private array $persons = [];
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;

        $this->readFromFile($path);
    }

    public function add(Person $person): void
    {
        $this->persons[] = $person;

        $this->writeToFile($this->path);
    }

    public function getByPin(int $pin): ?Person
    {
        foreach ($this->persons as $person) {
            if ($person->getPin() === $pin) {
                return $person;
            }
        }

        return null;
    }

    public function getById(int $id): Person
    {
        foreach ($this->persons as $person) {
            if ($person->getId() === $id) {
                return $person;
            }
        }
    }

    private function readFromFile($path): void
    {
        $file = fopen($path,'r');
        $line = 1;

        while(! feof($file))
        {
            $person = fgetcsv($file);
            if (is_array($person)) {
                $this->add(new Person($line, $person[0], $person[1], $person[2]));
                $line++;
            }
        }
        fclose($file);
    }

    private function writeToFile($path): void
    {
        $file = fopen($path, 'w');

        foreach ($this->persons as $person) {
            fputcsv($file, $this->toArray($person));
        }

        fclose($file);
    }

    private function toArray(Person $person): array
    {
        return [
            'first' => $person->getFirst(),
            'last' => $person->getLast(),
            'pin' => $person->getPin(),
        ];
    }
}
