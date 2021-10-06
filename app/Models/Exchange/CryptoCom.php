<?php

namespace App\Models\Exchange;

class CryptoCom implements ExchangeInterface 
{
    public function name()
    {
        return 'crypto.com';
    }

    public function last()
    {
        return 3100;
    }
}
