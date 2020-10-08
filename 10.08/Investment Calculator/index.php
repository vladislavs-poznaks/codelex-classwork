<?php

require_once 'core/models/Investment.php';
require_once 'core/Formatter.php';

if (
    array_key_exists('investment', $_POST)
    && array_key_exists('percentage', $_POST)
    && array_key_exists('years', $_POST)
) {
    $investment = new Investment(
        ((int) $_POST['investment']) * 100,
        (float) $_POST['percentage'],
        (int) $_POST['years']
    );
}

require 'views/index.view.php';
