<?php

class Paper extends Option
{
    protected OptionCollection $wins;

    public function __construct()
    {
        $this->wins = new OptionCollection([Rock::class, Spock::class]);
    }
}
