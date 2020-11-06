<?php

namespace App\Services;

use App\Repositories\BankRepository;
use App\Repositories\CurrencyRepository;

class ImportCurrenciesService
{
    private CurrencyRepository $currencyRepository;
    private BankRepository $bankRepository;

    public function __construct()
    {
        $this->currencyRepository = new CurrencyRepository();
        $this->bankRepository = new BankRepository();
    }

    public function execute(): void
    {
        $currencies = $this->bankRepository->getAll();

        foreach ($currencies as $currency) {
            $this->currencyRepository->save($currency);
        }
    }
}