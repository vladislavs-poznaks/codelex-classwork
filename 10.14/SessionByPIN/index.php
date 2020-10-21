<?php

require_once 'core/models/Person.php';
require_once 'core/models/PersonCollection.php';

session_start();
$persons = new PersonCollection('storage/persons.csv');

if (isset($_SESSION['id'])) {
    $auth = $persons->getById((int) $_SESSION['id']);
}

if (isset($_POST['log-out'])) {
    unset($_SESSION['id']);
}

if (isset($_POST['pin'])) {
    $auth = $persons->getByPin((int) $_POST['pin']);

    $_SESSION['id'] = $auth->getId();
}

require 'views/index.view.php';
