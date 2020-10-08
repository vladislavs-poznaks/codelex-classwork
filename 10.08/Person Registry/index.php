<?php

require_once 'core/models/Person.php';
require_once 'core/models/PersonCollection.php';

$persons = new PersonCollection('storage/persons.csv');
$info = [];

if (
    array_key_exists('first', $_POST)
    && array_key_exists('last', $_POST)
    && array_key_exists('code', $_POST)
    && array_key_exists('address', $_POST)
) {
    $persons->add(new Person(
        $_POST['first'],
        $_POST['last'],
        $_POST['code'],
        $_POST['address']
    ));
}

if (array_key_exists('search-code', $_POST)) {
    $matchingPersons = $persons->getByCode($_POST['search-code']);
}

require 'views/index.view.php';
