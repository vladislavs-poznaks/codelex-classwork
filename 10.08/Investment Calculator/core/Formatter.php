<?php

class Formatter
{
    public static function formatMoney(int $money): string
    {
        return '$' . number_format($money / 100, 2);
    }
}
