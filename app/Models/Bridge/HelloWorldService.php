<?php

namespace App\Models\Bridge;

class HelloWorldService extends Service
{
    public function get(): string
    {
        return $this->implementation->format('Hello World');
    }
}