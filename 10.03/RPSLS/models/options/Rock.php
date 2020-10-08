<?php

class Rock extends Option
{
    public function __construct()
    {
        $this->wins = new OptionCollection([Scissors::class, Lizard::class]);
    }
}
