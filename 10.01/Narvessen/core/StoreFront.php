<?php

namespace Core;

use Core\Models\HasMoneyInterface;
use Core\Models\HasProductsInterface;
use Core\Models\TransactionParticipant;
use Core\Models\Product;

class StoreFront
{
    public static function getCommandList(): string
    {
        return '-= Available Store Options =-' . PHP_EOL
            . '1. List all products in store ... (1)' . PHP_EOL
            . '2. List all products on person .. (2)' . PHP_EOL
            . '3. Buy a product by name ........ (3)' . PHP_EOL
            . '4. Show store\'s info ............ (4)' . PHP_EOL
            . '5. Show person\'s info ........... (5)' . PHP_EOL
            . '6. Exit store ................... (6)' . PHP_EOL;
    }

    public static function makeTransaction(
        string $productName,
        TransactionParticipant $seller,
        TransactionParticipant $buyer
    ): string {
        if ($seller->getProducts()->hasProduct($productName)) {

            $product = $seller->getProducts()->getProductByName($productName);

            if ($buyer->hasMoney($product->getPrice())) {
                // Make transactions
                self::transferMoney($product->getPrice(), $buyer, $seller);
                self::transferProduct($product->getName(), $seller, $buyer);

                return $buyer->getName() . ' just bought a ' . $product->getName() . '!' . PHP_EOL;
            } else {
                return $buyer->getName() . ' doesn\'t have enough money to buy ' . $product->getName() . '..' . PHP_EOL;
            }
        } else {
            return $seller->getName() . ' doesn\'t have a ' . $productName . '..' . PHP_EOL;
        }
    }

    private static function transferMoney(
        int $amount,
        HasMoneyInterface $donor,
        HasMoneyInterface $recipient
    ): void {
        if ($donor->hasMoney($amount)) {
            $donor->reduceMoney($amount);
            $recipient->increaseMoney($amount);
        }
    }

    private static function transferProduct(
        string $productName,
        HasProductsInterface $donor,
        HasProductsInterface $recipient
    ): void {
        if ($donor->getProducts()->hasProduct($productName)) {

            $product = $donor->getProducts()->getProductByName($productName);

            $donor->getProducts()->getProductByName($productName)->reduceCount();
            $recipient->getProducts()->add(new Product($product->getName(), $product->getPrice(), 1));
        }
    }
}
