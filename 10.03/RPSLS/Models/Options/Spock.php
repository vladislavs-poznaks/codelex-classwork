<?php

class Spock extends Option
{
    public function __construct()
    {
        $this->wins = new OptionCollection([Scissors::class, Rock::class]);
    }
}
