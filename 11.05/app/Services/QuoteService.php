<?php

namespace App\Services;

use App\Repositories\DatabaseRepository;

class QuoteService
{
    public function getQuote(string $symbol)
    {
        $repository = new DatabaseRepository();
        return $repository->getBySymbol($symbol);
    }
}