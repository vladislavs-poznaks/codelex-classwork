<?php

require_once 'core/models/Person.php';
require_once 'core/models/PersonCollection.php';

$persons = new PersonCollection('storage/persons.csv');
$info = [];

if (array_key_exists('name', $_POST)) {

    $name = ucfirst(strtolower($_POST['name']));

    $info['person'] = $persons->getByName($name)->getInfo();
    $info['resource'] = $persons->getResource();
}

require 'views/index.view.php';
