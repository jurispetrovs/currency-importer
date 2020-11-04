<?php

namespace App\Repositories;

use App\Models\Currency;

class CurrencyRepository
{
    public function getAll(): array
    {
        return query()
            ->select('*')
            ->from('currencies')
            ->orderBy('name', 'ASC')
            ->execute()
            ->fetchAllAssociative();
    }

    public function getByName(string $name)
    {
        return query()->select('*')
            ->from('currencies')
            ->where('name = :name')
            ->setParameter('name', $name)
            ->execute()
            ->fetchAssociative();
    }

    public function insert(Currency $currency): void
    {
        query()->insert('currencies')
            ->values([
                'name' => '?',
                'rate' => '?'
            ])
            ->setParameter(0, $currency->getName())
            ->setParameter(1, $currency->getRate())
            ->execute();
    }

    public function update(Currency $currency): void
    {
        query()->update('currencies')
            ->set('currencies.rate', $currency->getRate())
            ->where('name = :name')
            ->setParameter('name', $currency->getName())
            ->execute();
    }
}