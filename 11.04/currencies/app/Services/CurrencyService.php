<?php

namespace App\Services;

use App\Models\Currency;
use Sabre\Xml\Service;

class CurrencyService
{
    public function getFromBank()
    {
        $xml = file_get_contents('https://www.bank.lv/vk/ecb.xml');

        $service = new Service();
        $result = $service->parse($xml);

        $currenciesData = $result[1]['value'];

        $currencies = [];

        foreach ($currenciesData as $currency) {
            $currencies[] = Currency::createFromXML($currency);
        }

        return $currencies;
    }

    public function createDB(): void
    {
        $currenciesQuery = query()
            ->select('*')
            ->from('currencies')
            ->execute()
            ->fetchAllAssociative();

        if (count($currenciesQuery) === 0) {
            $currencies = $this->getFromBank();
            /**
             * @var Currency $currency
             */
            foreach ($currencies as $currency) {
                query()
                    ->insert('currencies')
                    ->values([
                        'currency' => ':currency',
                        'rate' => ':rate'
                    ])
                    ->setParameters([
                        'currency' => $currency->getCurrency(),
                        'rate' => $currency->getRate(),
                    ])
                    ->execute();
            }
        }
    }

    public function updateDB(): void
    {
        $currencies = $this->getFromBank();

        /**
         * @var Currency $currency
         */
        foreach ($currencies as $currency) {
            query()
                ->update('currencies')
                ->set('rate', $currency->getRate())
                ->where('currency = :currency')
                ->setParameter('currency', $currency->getCurrency())
                ->execute();
        }
    }

    public function getAll(): array
    {
        $currencies = [];

        $currenciesQuery = query()
            ->select('*')
            ->from('currencies')
            ->execute()
            ->fetchAllAssociative();

        foreach ($currenciesQuery as $currency) {
            $currencies[] = Currency::create($currency);
        }

        return $currencies;
    }
}