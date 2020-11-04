<?php

namespace Core\Models;

class Person extends TransactionParticipant
{
    private string $first;
    private string $last;

    public function __construct(string $first, string $last, int $money)
    {
        parent::__construct($money);

        $this->first = $first;
        $this->last = $last;
    }

    public function getName(): string
    {
        return $this->first . ' ' . $this->last;
    }
}
