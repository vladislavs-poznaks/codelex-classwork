<?php

namespace App\Controllers;

use App\Services\CurrencyService;

class HomeController
{
    public function index()
    {
        $service = new CurrencyService();
        $currencies = $service->getAll();

        return require_once __DIR__  . '/../Views/HomeIndexView.php';
    }

    public function update()
    {
        $service = new CurrencyService();
        $service->updateAll();

        return header('Location: /');
    }
}