<?php

namespace App\Controllers;

use App\Services\QuoteService;

class HomeController
{
    public function index()
    {
        $quote = null;

        return require_once __DIR__ . '/../Views/IndexView.php';
    }

    public function search()
    {
        $service = new QuoteService();
        $quote = $service->getQuote($_GET['symbol']);

        return require_once __DIR__ . '/../Views/IndexView.php';
    }
}