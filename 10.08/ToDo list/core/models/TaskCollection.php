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

    public function getById(int $id): Task
    {
        foreach ($this->tasks as $task) {
            if ($task->getId() === $id) {
                return $task;
            }
        }
    }

    public function update(): void
    {
        $this->writeToFile($this->path);
    }

    private function readFromFile($path): void
    {
        $file = fopen($path,'r');
        while(! feof($file))
        {
            $task = fgetcsv($file);
            if (is_array($task)) {
                $this->add(new Task($task[0], $task[1], $task[2], $task[3]));
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
            'id' => $task->getId(),
            'title' => $task->getTitle(),
            'description' => $task->getDescription(),
            'completed' => $task->isCompleted()
        ];
    }
}
