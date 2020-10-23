<?php

require_once 'Models/Spice.php';

foreach (glob('Models/*.php') as $path) {
    require_once $path;
}

use App\Models\{SpiceCollection, Salt, Pepper, Curry, Cinnamon};

$spices = new SpiceCollection();
$spices->add(new Salt());
$spices->add(new Pepper());
$spices->add(new Curry());
$spices->add(new Cinnamon());

foreach ($spices->all() as $spice) {
    echo 'The spice "' . $spice->getName() . '" with saying - "' . $spice->getSaying() . '"' . PHP_EOL;
}
