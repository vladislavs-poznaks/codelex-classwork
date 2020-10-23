<?php

namespace App\Models;

class SpiceCollection
{
    private array $spices = [];

    public function add(Spice $spice): void
    {
        $this->spices[] = $spice;
    }

    /**
     * @return Spice[]
     */
    public function all(): array
    {
        return $this->spices;
    }
}
