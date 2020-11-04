<?php

namespace Core\Models;

class Store extends TransactionParticipant
{
    private string $name;

    public function __construct(string $name, int $money = 0)
    {
        parent::__construct($money);

        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
