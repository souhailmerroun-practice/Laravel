<?php

namespace App\Models\Exchange;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exchange\ExchangeInterface;

class Exchange extends Model
{
    use HasFactory;

    private $exchangeInterface;

    public function __construct(ExchangeInterface $exchangeInterface)
    {
        $this->exchangeInterface = $exchangeInterface;
    }

    public function name()
    {
        return $this->exchangeInterface->name();
    }
}
