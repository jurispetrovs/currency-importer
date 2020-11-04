<?php

namespace App\Services;

use App\Controllers\CurrenciesController;
use App\Models\Currency;
use App\Repositories\CurrencyRepository;

class SaveCurrenciesService
{
    private CurrencyRepository $currencyRepository;

    public function __construct()
    {
        $this->currencyRepository = new CurrencyRepository();
    }

    public function execute(array $currencies)
    {
        /** @var Currency $currency */
        foreach ($currencies as $currency) {
            $result = CurrenciesController::find($currency->getName());
            if ($result) {
                CurrenciesController::update($currency);
            } else {
                CurrenciesController::insert($currency);
            }
        }
    }
}