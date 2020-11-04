<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Models\CurrencyCollection;
use Sabre\Xml\Service;

class CurrencyRepository
{
    public function getCurrencies(): CurrencyCollection
    {
        if ($this->isEmpty()) $this->createDB($this->getCurrenciesFromBank());

        $query = query()
            ->select('*')
            ->from('currencies')
            ->execute()
            ->fetchAllAssociative();

        return new CurrencyCollection($query);
    }

    public function updateCurrencies(): void
    {
        $currencies = $this->getCurrenciesFromBank();

        /** @var Currency $currency */
        foreach ($currencies->all() as $currency) {
            query()
                ->update('currencies')
                ->set('rate', $currency->getRate())
                ->where('currency = :currency')
                ->setParameter('currency', $currency->getCurrency())
                ->execute();
        }
    }
    
    private function getCurrenciesFromBank(): CurrencyCollection
    {
        $xml = file_get_contents('https://www.bank.lv/vk/ecb.xml');

        $service = new Service();
        $result = $service->parse($xml);

        $currenciesRaw = $result[1]['value'];

        $data = [];

        foreach ($currenciesRaw as $currencyRaw) {
            $data[] = [
                'currency' => $currencyRaw['value'][0]['value'],
                'rate' => (float) $currencyRaw['value'][1]['value']
            ];
        }

        return new CurrencyCollection($data);
    }
    
    private function isEmpty(): bool
    {
        $query = query()
            ->select('*')
            ->from('currencies')
            ->execute()
            ->fetchAllAssociative();
        
        return count($query) === 0;
    }

    private function createDB(CurrencyCollection $currencies): void
    {
        /** @var Currency $currency */
        foreach ($currencies->all() as $currency) {
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