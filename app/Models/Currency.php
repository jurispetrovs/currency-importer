<?php

namespace App\Models;

class Currency
{
    private string $symbol;
    private string $price;

    public function __construct(string $symbol, string $price)
    {
        $this->symbol = $symbol;
        $this->price = $price;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public static function create(array $data): self
    {
        return new self(
            $data['symbol'],
            $data['price']
        );
    }
}