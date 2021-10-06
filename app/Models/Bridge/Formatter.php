<?php

namespace App\Models\Bridge;

interface Formatter
{
    public function format(string $text): string;
}