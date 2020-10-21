<?php

class TaskCollection
{
    /**
     * @var Task[]
     */
    private array $tasks = [];
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->readFromFile($path);
    }

    /**
     * @return Task[]
     */
    public function all(): array
    {
        return $this->tasks;
    }

    public function add(Task $task): void
    {
        $this->tasks[] = $task;
        $this->writeToFile($this->path);
    }

    public function destroyById(int $id): void
    {
        foreach ($this->tasks as $key => $task) {
            if ($key === $id) {
                unset($this->tasks[$key]);
                $this->writeToFile($this->path);
            }
        }
    }

    private function readFromFile($path): void
    {
        $file = fopen($path,'r');
        while(! feof($file))
        {
            $task = fgetcsv($file);
            if (is_array($task)) {
                $this->add(new Task($task[0], $task[1], $task[2]));
            }
        }
        fclose($file);
    }

    private function writeToFile($path): void
    {
        $file = fopen($path, 'w');

        foreach ($this->tasks as $task) {
            fputcsv($file, $this->toArray($task));
        }

        fclose($file);
    }

    private function toArray(Task $task): array
    {
        return [
            'title' => $task->getTitle(),
            'description' => $task->getDescription(),
            'completed' => $task->isCompleted()
        ];
    }
}
