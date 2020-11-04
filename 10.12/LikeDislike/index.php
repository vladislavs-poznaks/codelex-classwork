<?php

require_once 'models/Picture.php';
require_once 'models/PictureCollection.php';

$pictures = new PictureCollection('storage/pictures.csv');

if (isset($_POST['id'])) {
    $pictures->updateLikesById($_POST['id'], trim($_SERVER['REQUEST_URI'], '/'));
}

require 'views/index.view.php';
