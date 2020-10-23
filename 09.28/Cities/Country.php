<?php

class Country
{
    /**
     * @var PopulatedArea[]
     */
    private array $populatedAreas = [];

    public function add(PopulatedArea $area): void
    {
        $this->populatedAreas[] = $area;
    }

    public function all(): array
    {
        return $this->populatedAreas;
    }
}
