<?php

namespace App\Services;

use App\Models\Currency;
use App\Repositories\CurrencyRepository;

class UpdateCurrencyService
{
    private CurrencyRepository $currencyRepository;

    public function __construct()
    {
        $this->currencyRepository = new CurrencyRepository();
    }

    public function execute(Currency $currency)
    {
        $this->currencyRepository->update($currency);
    }
}