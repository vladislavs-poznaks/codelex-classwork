<?php

class Picture
{
    private string $path;
    private int $likes;

    public function __construct(string $path, int $likes)
    {
        $this->path = $path;
        $this->likes = $likes;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getLikes(): int
    {
        return $this->likes;
    }

    public function like(): void
    {
        $this->likes++;
    }

    public function dislike(): void
    {
        $this->likes--;
    }
}