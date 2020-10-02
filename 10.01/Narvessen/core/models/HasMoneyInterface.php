<?php

namespace Core\Models;

interface HasMoneyInterface
{
    public function getMoney(): int;

    public function hasMoney(int $amount): bool;

    public function reduceMoney(int $amount): void;
    public function increaseMoney(int $amount): void;
}
