<?php

require_once 'vendor/autoload.php';

use App\Models\Person;

$person = new Person();

echo 'Person\'s ID: ' . $person->getId();
