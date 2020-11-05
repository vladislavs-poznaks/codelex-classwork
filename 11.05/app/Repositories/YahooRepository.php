<?php

namespace App\Repositories;

use App\Models\Quote;
use Scheb\YahooFinanceApi\ApiClientFactory;

class YahooRepository
{
    public function getBySymbol(string $symbol): ?Quote
    {
        $client = ApiClientFactory::createApiClient();
        $quoteAPI = $client->getQuote($symbol);

        if($quoteAPI->getSymbol() === $symbol) {
            return new Quote(
                $quoteAPI->getSymbol(),
                $quoteAPI->getRegularMarketPrice(),
                $quoteAPI->getRegularMarketChangePercent(),
                $quoteAPI->getRegularMarketPreviousClose(),
                $quoteAPI->getRegularMarketOpen(),
                $quoteAPI->getRegularMarketDayHigh(),
                $quoteAPI->getRegularMarketDayLow(),
                $quoteAPI->getFiftyTwoWeekHigh(),
                $quoteAPI->getFiftyTwoWeekLow(),
                $quoteAPI->getRegularMarketVolume()
            );
        } else {
            return null;
        }
    }
}