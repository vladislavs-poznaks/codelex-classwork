<?php

class Task
{
    private string $title;
    private string $description;
    private bool $completed;

    public function __construct(string $title, string $description, bool $completed)
    {
        $this->title = $title;
        $this->description = $description;
        $this->completed = $completed;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isCompleted(): bool
    {
        return $this->completed;
    }

    public function complete(): void
    {
        $this->completed = true;
    }
}
