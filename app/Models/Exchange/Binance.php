<?php

namespace App\Models\Exchange;

class Binance implements ExchangeInterface
{
    public function name()
    {
        return 'binance';
    }
}
