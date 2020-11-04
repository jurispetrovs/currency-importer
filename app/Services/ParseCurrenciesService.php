<?php

namespace App\Services;

use App\Models\Currency;
use App\Repositories\CurrencyRepository;
use Sabre\Xml\Service;

class ParseCurrenciesService
{
    private CurrencyRepository $currencyRepository;

    public function __construct()
    {
        $this->currencyRepository = new CurrencyRepository();
    }

    public function execute(): array
    {
        $source = (new Service())
            ->parse(file_get_contents("https://www.bank.lv/vk/ecb.xml"));

        $currencies = [];

        foreach ($source[1]['value'] as $currency) {
            $currencies[] = new Currency(
                $currency['value'][0]['value'],
                $currency['value'][1]['value']
            );
        }

        return $currencies;
    }
}