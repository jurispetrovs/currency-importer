<?php

namespace App\Repositories;

use App\Models\Currency;

class CurrencyRepository
{
    public function getAll(): array
    {
        $data = query()
            ->select('*')
            ->from('currencies')
            ->orderBy('symbol', 'ASC')
            ->execute()
            ->fetchAllAssociative();

        $currencies = [];

        foreach ($data as $currency) {
            $currencies[] = Currency::create($currency);
        }

        return $currencies;
    }

    public function save(Currency $currency): void
    {
        $symbol = $this->getBySymbol($currency);

        if ($symbol) {
            $this->update($currency);
        } else {
            echo 2;
            $this->insert($currency);
        }
    }

    private function getBySymbol(Currency $currency)
    {
        return query()
            ->select('*')
            ->from('currencies')
            ->where('symbol = :symbol')
            ->setParameter('symbol', $currency->getSymbol())
            ->execute()
            ->fetchAssociative();
    }

    private function insert(Currency $currency): void
    {
        query()
            ->insert('currencies')
            ->values([
                'symbol' => '?',
                'price' => '?'
            ])
            ->setParameter(0, $currency->getSymbol())
            ->setParameter(1, $currency->getPrice())
            ->execute();
    }

    private function update(Currency $currency): void
    {
        query()
            ->update('currencies')
            ->set('currencies.price', $currency->getPrice())
            ->where('symbol = :symbol')
            ->setParameter('symbol', $currency->getSymbol())
            ->execute();
    }
}