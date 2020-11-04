<?php

require_once 'core/models/HasMoneyInterface.php';
require_once 'core/models/HasProductsInterface.php';

require_once 'core/models/TransactionParticipant.php';

require_once 'core/models/Product.php';
require_once 'core/models/ProductCollection.php';
require_once 'core/models/Person.php';
require_once 'core/models/Store.php';
require_once 'core/StoreFront.php';
require_once 'core/File.php';

use Core\{File, StoreFront};
use Core\Models\{Product, Person, Store};

if (! File::fileExists('Store')) {

    $store = new Store('Narvessen');

    $store->getProducts()->addBulk([
        new Product('Snaikers', 99, 10),
        new Product('Merkurs', 120, 5),
        new Product('Bauntijs', 50, 10),
        new Product('Tviriks', 75, 2)
    ]);

    File::store($store);
}

if (! File::fileExists('Person')) {
    $person = new Person('John', 'Doe', 1000);

    File::store($person);
}

/*** @var Store $store*/
$store = File::load('Store');

/*** @var Person $person*/
$person = File::load('Person');

do {
    echo StoreFront::getCommandList() . PHP_EOL;

    do {
        $input = readline('Enter a command > ');
    } while (! ctype_digit($input));

    $input = (int) $input;

    switch ($input) {
        case 1:
            echo '-= Available Products in Shop =-' . PHP_EOL;
            echo $store->getProducts()->getProductsList() . PHP_EOL;
            break;
        case 2:
            echo '-= Person\'s Products =-' . PHP_EOL;
            echo $person->getProducts()->getProductsList(false) . PHP_EOL;
            break;
        case 3:
            $productName = readline('Enter product\'s name > ');
            echo StoreFront::makeTransaction($productName, $store, $person) . PHP_EOL;
            break;
        case 4:
            echo '-= Store\'s Info =-' . PHP_EOL;
            echo $store->getInfo() . PHP_EOL;
            break;
        case 5:
            echo '-= Person\'s Info =-' . PHP_EOL;
            echo $person->getInfo() . PHP_EOL;
            break;
        case 6:
            File::store($store);
            File::store($person);
            echo 'Bye, bye!' . PHP_EOL;
            break;
        default:
            echo 'Sorry, I don\'t understand' . str_repeat(PHP_EOL, 2);
            break;
    }

} while ($input !== 6);
