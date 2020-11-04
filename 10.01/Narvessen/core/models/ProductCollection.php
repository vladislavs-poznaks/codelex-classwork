<?php

namespace Core\Models;

class ProductCollection
{
    /**
     * @var Product[]
     */
    private array $products = [];

    public function add(Product $product): void
    {
        if ($this->hasProduct($product->getName())) {
            $this->getProductByName($product->getName())->increaseCount();
        } else {
            $this->products[] = $product;
        }
    }

    public function addBulk(array $products): void
    {
        foreach ($products as $product) {
            $this->add($product);
        }
    }

    public function hasProduct(string $productName): bool
    {
        foreach ($this->products as $product) {
            if (strtolower($product->getName()) === strtolower($productName) && $product->isAvailable()) {
                return true;
            }
        }

        return false;
    }

    public function getProductByName(string $name): Product
    {
        foreach ($this->products as $product) {
            if (strtolower($product->getName()) === strtolower($name)) {
                return $product;
            }
        }
    }

    public function getProductsList($showPrice = true, $showCount = true): string
    {
        $list = '';

        foreach ($this->products as $product) {
            $list .= $product->getInfo($showPrice, $showCount) . PHP_EOL;
        }

        return ($list === '' ? 'Nothing to show...' . PHP_EOL : $list);
    }
}
