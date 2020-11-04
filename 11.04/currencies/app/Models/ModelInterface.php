<?php

namespace App\Models;

interface ModelInterface
{
    public static function create(array $data): ModelInterface;
}