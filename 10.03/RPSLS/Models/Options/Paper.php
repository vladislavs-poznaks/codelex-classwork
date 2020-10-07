<?php

class Paper extends Option
{
    public function __construct()
    {
        $this->wins = new OptionCollection([Rock::class, Spock::class]);
    }
}
