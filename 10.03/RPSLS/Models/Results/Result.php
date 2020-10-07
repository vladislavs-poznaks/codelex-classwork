<?php

abstract class Result
{
    protected array $results = [
        'Rock' => [
            'Lizard' => 'crushes',
            'Scissors' => 'crushes'
        ],
        'Paper' => [
            'Rock' => 'covers',
            'Spock' => 'disproves'
        ],
        'Scissors' => [
            'Paper' => 'cuts',
            'Lizard' => 'decapitates'
        ],
        'Lizard' => [
            'Paper' => 'eats',
            'Spock' => 'poisons'
        ],
        'Spock' => [
            'Rock' => 'vaporizes',
            'Scissors' => 'smashes'
        ],
    ];

    protected Option $player;
    protected Option $opponent;

    public function __construct(Option $player, Option $opponent)
    {
        $this->player = $player;
        $this->opponent = $opponent;
    }

    abstract public function getMessage(): string;
}