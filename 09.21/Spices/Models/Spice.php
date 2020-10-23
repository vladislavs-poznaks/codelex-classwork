<?php

namespace App\Models;

abstract class Spice
{
    abstract function getSaying(): string;

    public function getName(): string
    {
        $path = explode('\\', get_class($this));
        return end($path);
    }
}
