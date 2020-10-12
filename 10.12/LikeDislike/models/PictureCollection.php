<?php

class PictureCollection
{
    /**
     * @var Picture[]
     */
    private array $pictures = [];
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;

        $this->readFromFile($path);
    }

    public function add(Picture $picture): void
    {
        $this->pictures[] = $picture;

        $this->writeToFile($this->path);
    }

    public function all(): array
    {
        return $this->pictures;
    }

    public function updateLikesById(int $id, string $method): void
    {
        $this->pictures[$id]->$method();

        $this->writeToFile($this->path);
    }

    private function readFromFile($path): void
    {
        $file = fopen($path,'r');
        while(! feof($file))
        {
            $picture = fgetcsv($file);
            if (is_array($picture)) {
                $this->add(new Picture($picture[0], (int) $picture[1]));
            }
        }
        fclose($file);
    }

    private function writeToFile($path): void
    {
        $file = fopen($path, 'w');

        foreach ($this->pictures as $picture) {
            fputcsv($file, $this->toArray($picture));
        }

        fclose($file);
    }

    private function toArray(Picture $picture): array
    {
        return [
            'path' => $picture->getPath(),
            'likes' => $picture->getLikes(),
        ];
    }
}
