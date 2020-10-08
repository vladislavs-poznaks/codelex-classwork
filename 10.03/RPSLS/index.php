<?php

require_once 'models/options/Option.php';
require_once 'models/options/OptionCollection.php';
require_once 'models/options/Rock.php';
require_once 'models/options/Paper.php';
require_once 'models/options/Scissors.php';
require_once 'models/options/Lizard.php';
require_once 'models/options/Spock.php';

require_once 'models/results/Result.php';
require_once 'models/results/Win.php';
require_once 'models/results/Loss.php';
require_once 'models/results/Tie.php';

$options = new OptionCollection([
    new Rock(),
    new Paper(),
    new Scissors(),
    new Lizard(),
    new Spock()
]);

if (array_key_exists('choice', $_POST)) {
    $pl = $options->getByName($_POST['choice']);
    $pc = $options->getRandom();
}

require 'views/game.view.php';
