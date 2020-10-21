<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;

class Person
{
    private string $id;

    public function __construct()
    {
        $this->id = Uuid::uuid4()->toString();
    }

    public function getId(): string
    {
        return $this->id;
    }
}
