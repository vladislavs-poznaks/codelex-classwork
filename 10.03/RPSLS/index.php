<?php

require_once 'Models/Options/Option.php';
require_once 'Models/Options/OptionCollection.php';
require_once 'Models/Options/Rock.php';
require_once 'Models/Options/Paper.php';
require_once 'Models/Options/Scissors.php';
require_once 'Models/Options/Lizard.php';
require_once 'Models/Options/Spock.php';

require_once 'Models/Results/Result.php';
require_once 'Models/Results/Win.php';
require_once 'Models/Results/Loss.php';
require_once 'Models/Results/Tie.php';

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

require 'Views/game.view.php';
