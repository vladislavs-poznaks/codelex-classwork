<?php

require_once 'core/models/Person.php';
require_once 'core/models/PersonCollection.php';

$persons = new PersonCollection('storage/persons.csv');

if (isset($_POST['first']) && isset($_POST['last']) && isset($_POST['phone'])) {
    // create validation step
    $persons->add(new Person($_POST['first'], $_POST['last'], (int) $_POST['phone']));
}

if (isset($_POST['search-phone'])) {
    // create validation step
    $searchResult = $persons->getByPhone((int) $_POST['search-phone']);
}

require 'views/index.view.php';
