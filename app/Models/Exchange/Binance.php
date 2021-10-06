<?php

namespace App\Models\Exchange;

class Binance implements ExchangeInterface
{
    public function name()
    {
        return 'binance';
    }

    public function last()
    {
        return 3000;
    }
}
