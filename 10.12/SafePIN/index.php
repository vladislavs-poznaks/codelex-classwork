<?php

require_once 'models/PinCode.php';

$pin = new PinCode('storage/pin.txt', '1234');

if (isset($_POST['number'])) {
    $pin->addNumber($_POST['number']);
}

$feedback = $pin->getResult();

require 'views/index.view.php';
