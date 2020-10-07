<?php

class Lizard extends Option
{
    protected OptionCollection $wins;

    public function __construct()
    {
        $this->wins = new OptionCollection([Spock::class, Paper::class]);
    }
}
