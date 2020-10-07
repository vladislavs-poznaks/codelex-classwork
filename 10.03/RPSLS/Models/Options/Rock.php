<?php

class Rock extends Option
{
    protected OptionCollection $wins;

    public function __construct()
    {
        $this->wins = new OptionCollection([Scissors::class, Lizard::class]);
    }
}
