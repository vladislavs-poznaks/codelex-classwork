<?php

namespace App\Models;

class Curry extends Spice
{

    function getSaying(): string
    {
        return 'Is it chicken today?!';
    }
}
