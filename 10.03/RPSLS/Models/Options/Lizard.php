<?php

class Lizard extends Option
{
    public function __construct()
    {
        $this->wins = new OptionCollection([Spock::class, Paper::class]);
    }
}
