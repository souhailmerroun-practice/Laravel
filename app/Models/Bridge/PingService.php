<?php

namespace App\Models\Bridge;

class PingService extends Service
{
    public function get(): string
    {
        return $this->implementation->format('pong');
    }
}