<?php

namespace App\Controllers;

use App\Services\ImportCurrenciesService;
use App\Services\ShowAllCurrenciesService;

class CurrenciesController
{
    public function index()
    {
        $currencies = (new ShowAllCurrenciesService())->execute();

        return require_once __DIR__ . '/../Views/CurrenciesRatesView.php';
    }

    public function update()
    {
        (new ImportCurrenciesService())->execute();

        header('Location: /');
    }
}