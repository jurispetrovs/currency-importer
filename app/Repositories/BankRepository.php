<?php

namespace App\Repositories;

use App\Models\Currency;
use Sabre\Xml\Service;

class BankRepository
{
    public function getAll(): array
    {
        $data = (new Service())
            ->parse(file_get_contents("https://www.bank.lv/vk/ecb.xml"));

        $currencies = [];

        foreach ($data[1]['value'] as $currency) {
            $currencies[] = new Currency(
                $currency['value'][0]['value'],
                $currency['value'][1]['value']
            );
        }

        return $currencies;
    }
}