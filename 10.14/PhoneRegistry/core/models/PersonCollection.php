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

    public function getByPhone(int $phone): ?Person
    {
        foreach ($this->persons as $person) {
            if ($person->getPhone() === $phone) {
                return $person;
            }
        }

        return null;
    }

    private function readFromFile($path): void
    {
        $file = fopen($path,'r');
        while(! feof($file))
        {
            $person = fgetcsv($file);
            if (is_array($person)) {
                $this->add(new Person($person[0], $person[1], $person[2]));
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
            'phone' => $person->getPhone(),
        ];
    }
}
