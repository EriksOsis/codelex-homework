<?php

class Product
{
    public string $name;
    public string $price;
    public string $quantity;

    public function __construct(string $name, float $price, int $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

$x = new Product("Milk", 3.3, 300);
$y = new Product("Bread", 1.50, 150);
$z = new Product("Peanuts", 2, 40);

class Store
{
    public array $inventory = [];

    public function addProduct(Product $product)
    {
        return $this->inventory[] = $product;
    }

    public function totalSum(): int
    {
        $sum = 0;
        foreach ($this->inventory as $product) {
            $sum += $product->price * $product->quantity;
        }
        return $sum;
    }
}

$inventory = new Store();
$inventory->addProduct($x);
$inventory->addProduct($y);
$inventory->addProduct($z);

echo $x->name . " " . $x->price . "$ " . $x->quantity . PHP_EOL;
echo $y->name . " " . $y->price . "$ " . $y->quantity . PHP_EOL;
echo $z->name . " " . $z->price . "$ " . $z->quantity . PHP_EOL;

echo "____________________" . PHP_EOL;

echo "Total: " . $inventory->totalSum() . "$" . PHP_EOL;