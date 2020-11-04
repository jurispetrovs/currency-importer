<?php

namespace App\Services;

use App\Models\Currency;
use App\Repositories\CurrencyRepository;

class InsertCurrencyService
{
    private CurrencyRepository $currencyRepository;

    public function __construct()
    {
        $this->currencyRepository = new CurrencyRepository();
    }

    public function execute(Currency $currency)
    {
        $this->currencyRepository->insert($currency);
    }
}