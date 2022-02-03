<?php

class Product
{
    public string $name;
    public float $startPrice;
    public int $amount;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getPrice(): float
    {
        return $this->startPrice;
    }

    public function setPrice(float $startPrice): void
    {
        $this->startPrice = $startPrice;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function printProduct()
    {
        return $this->name;
    }
}

$mouse = new Product("Logitech mouse");
$iphone = new Product("iPhone 5s");
$epson = new Product("Epson EB-U05");

$mouse->setPrice(70.00);
$iphone->setPrice(999.99);
$epson->setPrice(440.46);

$mouse->setAmount(14);
$iphone->setAmount(3);
$epson->setAmount(1);

echo $mouse->printProduct() . ", " . $mouse->getPrice() . " EUR, " . $mouse->getAmount() . PHP_EOL;
echo $iphone->printProduct() . ", " . $iphone->getPrice() . " EUR, " . $iphone->getAmount() . PHP_EOL;
echo $epson->printProduct() . ", " . $epson->getPrice() . " EUR, " . $epson->getAmount() . PHP_EOL;