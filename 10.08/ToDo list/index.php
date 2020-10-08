<?php

require_once 'core/models/Task.php';
require_once 'core/models/TaskCollection.php';

$tasks = new TaskCollection('storage/tasks.csv');

if (
    array_key_exists('title', $_POST)
    && array_key_exists('description', $_POST)
) {
    $tasks->add(new Task(
        count($tasks->all()) + 1,
        $_POST['title'],
        $_POST['description'],
        false
    ));
}

if (array_key_exists('id', $_POST)) {
    $tasks->getById((int) $_POST['id'])->complete();
    $tasks->update();
}

require 'views/index.view.php';
