<?php

namespace App\Services;

use App\Repositories\CurrencyRepository;

class FindCurrencyService
{
    private CurrencyRepository $currencyRepository;

    public function __construct()
    {
        $this->currencyRepository = new CurrencyRepository();
    }

    public function execute(string $name)
    {
        return $this->currencyRepository->getByName($name);
    }
}