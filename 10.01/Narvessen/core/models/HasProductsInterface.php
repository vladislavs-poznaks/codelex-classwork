<?php

namespace Core\Models;

interface HasProductsInterface
{
    public function getProducts(): ProductCollection;
}
