<?php

class Scissors extends Option
{
    protected OptionCollection $wins;

    public function __construct()
    {
        $this->wins = new OptionCollection([Paper::class, Lizard::class]);
    }
}
