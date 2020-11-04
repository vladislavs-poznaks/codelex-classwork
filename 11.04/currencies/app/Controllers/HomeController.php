<?php

namespace App\Controllers;

use App\Services\CurrencyService;

class HomeController
{
    public function index()
    {

        $service = new CurrencyService();
        $service->createDB();

        $currencies = $service->getAll();

        return require_once __DIR__  . '/../Views/HomeIndexView.php';
    }

    public function update()
    {
        $service = new CurrencyService();
        $service->updateDB();

        return header('Location: /');
    }
}