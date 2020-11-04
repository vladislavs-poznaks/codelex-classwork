<?php

namespace App\Services;

use App\Models\CurrencyCollection;
use App\Repositories\CurrencyRepository;

class CurrencyService
{
    public function getAll(): CurrencyCollection
    {
        $repository = new CurrencyRepository();

        return $repository->getCurrencies();
    }

    public function updateAll(): void
    {
        $repository = new CurrencyRepository();

        $repository->updateCurrencies();
    }
}