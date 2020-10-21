<?php

require_once 'core/models/Task.php';
require_once 'core/models/TaskCollection.php';

$tasks = new TaskCollection('storage/tasks.csv');

if (
    array_key_exists('title', $_POST)
    && array_key_exists('description', $_POST)
) {
    $tasks->add(new Task(
        $_POST['title'],
        $_POST['description'],
        false
    ));
}

if (array_key_exists('id', $_POST)) {
    $tasks->destroyById((int) $_POST['id']);
}

require 'views/index.view.php';
