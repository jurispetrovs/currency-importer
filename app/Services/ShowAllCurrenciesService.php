<?php

namespace App\Services;

use App\Repositories\CurrencyRepository;

class ShowAllCurrenciesService
{
    private CurrencyRepository $currencyRepository;

    public function __construct()
    {
        $this->currencyRepository = new CurrencyRepository();
    }

    public function execute(): array
    {
        return $this->currencyRepository->getAll();
    }
}