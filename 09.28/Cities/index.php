<?php

require 'HasMayor.php';
require 'PopulatedArea.php';
require 'Mayor.php';
require 'Town.php';
require 'City.php';
require 'Country.php';

$country = new Country();

$country->add(new City('Cotonou', new Mayor('Luc Atrokpo')));
$country->add(new Town('Kandi'));
$country->add(new City('Porto-Novo', new Mayor('Emmanuel Zossou')));
$country->add(new Town('Ndali'));

foreach ($country->all() as $area) {
    echo 'The populated area - ' . $area->getName()
        . ($area instanceof HasMayor
            ? ' with mayor ' . $area->getMayor()->getName()
            : ' has no mayor...');
    echo PHP_EOL;
}
