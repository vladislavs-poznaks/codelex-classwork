<?php

class PersonCollection
{
    /**
     * @var Person[]
     */
    private array $persons = [];
    private string $path;
    private string $resource;

    public function __construct(string $path)
    {
        $this->path = $path;

        $this->readFromFile($path);
    }

    public function getResource(): string
    {
        return $this->resource;
    }

    public function add(Person $person): void
    {
        $this->persons[] = $person;
    }

    public function getByName(string $name): Person
    {
        foreach ($this->persons as $person) {
            if ($person->getName() === ucfirst(strtolower($name))) {
                $this->resource = 'CSV';
                return $person;
            }
        }

        return $this->createByAPI($name);
    }

    private function createByAPI(string $name): Person
    {
        $path = 'https://api.agify.io/?name=' . $name;
        $response = json_decode(file_get_contents($path), true);

        $person = new Person($response['name'], $response['age'], $response['count']);

        $this->add($person);
        $this->writeToFile($this->path);

        $this->resource = 'agify.io';

        return $person;
    }

    private function readFromFile($path): void
    {
        $file = fopen($path,'r');
        while(! feof($file))
        {
            $person = fgetcsv($file);
            if (is_array($person)) {
                $this->add(new Person($person[0], (int) $person[1], (int) $person[2]));
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
            'name' => $person->getName(),
            'age' => $person->getAge(),
            'count' => $person->getCount(),
        ];
    }
}
