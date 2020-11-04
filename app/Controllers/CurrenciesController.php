<?php

namespace App\Controllers;

use App\Models\Currency;
use App\Services\FindCurrencyService;
use App\Services\InsertCurrencyService;
use App\Services\ParseCurrenciesService;
use App\Services\SaveCurrenciesService;
use App\Services\ShowAllCurrenciesService;
use App\Services\UpdateCurrencyService;

class CurrenciesController
{
    private array $currencies;

    public function __construct()
    {
        $this->parse();
        $this->save();

        $currencies = (new ShowAllCurrenciesService())->execute();

        return require_once __DIR__ . '/../Views/CurrenciesRatesView.php';
    }

    private function parse(): void
    {
        $this->currencies = (new ParseCurrenciesService())->execute();
    }

    private function save()
    {
        (new SaveCurrenciesService())->execute($this->currencies);
    }

    public static function find(string $name)
    {
        return (new FindCurrencyService())->execute($name);
    }

    public static function update(Currency $currency): void
    {
        (new UpdateCurrencyService())->execute($currency);
    }

    public static function insert(Currency $currency): void
    {
        (new InsertCurrencyService())->execute($currency);
    }
}