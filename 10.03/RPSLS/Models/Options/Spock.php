<?php

class Spock extends Option
{
    protected OptionCollection $wins;

    public function __construct()
    {
        $this->wins = new OptionCollection([Scissors::class, Rock::class]);
    }
}
