<?php

require_once 'File.php';
require_once 'NumberOperator.php';

$operator = new NumberOperator(File::read('data.txt'));

$number = $operator->getRandomNumber();
$operator->addNumber($number);

File::write('data.txt', $operator->getAllNumbers());

echo 'Number: ' . $number . PHP_EOL;
echo 'Number chain: ' . $operator->getNumberRow() . PHP_EOL;
echo 'AVG: ' . number_format($operator->getAverageNumber(), 2);
