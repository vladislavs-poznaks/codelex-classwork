<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Quote;

class DatabaseRepository
{
    public function getBySymbol(string $symbol)
    {
        //Search for records
        $data = query()
            ->select('*')
            ->from('quotes')
            ->where('symbol = :symbol')
            ->setParameter('symbol', $symbol)
            ->execute()
            ->fetchAssociative();

        //In case the record does not exist, create a record
        if (! $data) {
            $quote = (new YahooRepository())->getBySymbol($symbol);
            $this->createRecord($quote);
            return $quote;
        }

        //In case the record is outdated, update record
        if (Carbon::now()->diffInMinutes($data['created_at']) > 10) {
            $quote = (new YahooRepository())->getBySymbol($symbol);
            $this->updateRecord($quote);

            return $quote;
        }

        return Quote::create($data);
    }

    public function createRecord(Quote $quote): void
    {
        query()
            ->insert('quotes')
            ->values([
                'symbol' => ':symbol',
                'regular_price' => ':regular_price',
                'regular_change_percent' => ':regular_change_percent',
                'regular_previous_close' => ':regular_previous_close',
                'regular_open' => ':regular_open',
                'regular_day_high' => ':regular_day_high',
                'regular_day_low' => ':regular_day_low',
                'fifty_two_week_high' => ':fifty_two_week_high',
                'fifty_two_week_low' => ':fifty_two_week_low',
                'regular_volume' => ':regular_volume',
                'created_at' => ':created_at'
            ])
            ->setParameters([
                'symbol' => $quote->getSymbol(),
                'regular_price' => $quote->getRegularPrice(),
                'regular_change_percent' => $quote->getRegularChangePercent(),
                'regular_previous_close' => $quote->getRegularChangePercent(),
                'regular_open' => $quote->getRegularOpen(),
                'regular_day_high' => $quote->getRegularDayHigh(),
                'regular_day_low' => $quote->getRegularDayLow(),
                'fifty_two_week_high' => $quote->getFiftyTwoWeekHigh(),
                'fifty_two_week_low' => $quote->getFiftyTwoWeekLow(),
                'regular_volume' => $quote->getRegularVolume(),
                'created_at' => Carbon::now()->format('Y-m-d h:i:s')
            ])
            ->execute();
    }

    public function updateRecord(Quote $quote): void
    {
        query()
            ->update('quotes')
            ->set('symbol', ':symbol')
            ->set('regular_price', ':regular_price')
            ->set('regular_change_percent', ':regular_change_percent')
            ->set('regular_previous_close', ':regular_previous_close')
            ->set('regular_open', ':regular_open')
            ->set('regular_day_high', ':regular_day_high')
            ->set('regular_day_low', ':regular_day_low')
            ->set('fifty_two_week_high', ':fifty_two_week_high')
            ->set('fifty_two_week_low', ':fifty_two_week_low')
            ->set('regular_volume', ':regular_volume')
            ->set('created_at', ':created_at')
            ->setParameters([
                'regular_price' => $quote->getRegularPrice(),
                'regular_change_percent' => $quote->getRegularChangePercent(),
                'regular_previous_close' => $quote->getRegularChangePercent(),
                'regular_open' => $quote->getRegularOpen(),
                'regular_day_high' => $quote->getRegularDayHigh(),
                'regular_day_low' => $quote->getRegularDayLow(),
                'fifty_two_week_high' => $quote->getFiftyTwoWeekHigh(),
                'fifty_two_week_low' => $quote->getFiftyTwoWeekLow(),
                'regular_volume' => $quote->getRegularVolume(),
                'created_at' => Carbon::now()->format('Y-m-d h:i:s')
            ])
            ->where('symbol = :symbol')
            ->setParameter('symbol', $quote->getSymbol())
            ->execute();
    }
}