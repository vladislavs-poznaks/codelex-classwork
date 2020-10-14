<?php

require_once 'core/models/Person.php';
require_once 'core/models/PersonCollection.php';
require_once 'core/models/Message.php';
require_once 'core/models/MessageCollection.php';

session_start();
$persons = new PersonCollection('storage/persons.csv');

if (isset($_POST['pin'])) {
    $auth = $persons->getByPin((int) $_POST['pin']);

    if ($auth !== null) {
        $_SESSION['id'] = $auth->getId();
    }
}

if (isset($_SESSION['id'])) {

    $auth = $persons->getById((int) $_SESSION['id']);

    $messages = new MessageCollection('storage/messages.csv');

    if(isset($_POST['message'])) {
        $messages->add(new Message($auth->getId(), $_POST['message']));
    }

    $messages = $messages->getByUserId($auth->getId());
}

if (isset($_POST['log-out'])) {
    unset($_SESSION['id']);
}

require 'views/index.view.php';
