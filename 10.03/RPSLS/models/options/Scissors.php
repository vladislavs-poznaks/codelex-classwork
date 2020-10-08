<?php

class Scissors extends Option
{
    public function __construct()
    {
        $this->wins = new OptionCollection([Paper::class, Lizard::class]);
    }
}
