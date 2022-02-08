<?php

class Account
{
    public string $acc;
    public float $bal;

    public function __construct(string $acc, float $bal)
    {
        $this->acc = $acc;
        $this->bal = $bal;
    }

    public function deposit(int $deposited): float
    {
        return $this->bal += $deposited;
    }

    public function withdrawal(int $withdrawal): float
    {
        return $this->bal -= $withdrawal;
    }

    public function balance(): float
    {
        return $this->bal;
    }

    public function printAcc(): string
    {
        return $this->acc . ": " . $this->bal . PHP_EOL;
    }

    static function transfer(Account $from, Account $to, int $howMuch): int
    {
        return $from->withdrawal($howMuch) . $to->deposit($howMuch);
    }
}

//todo 1st
/*
$bartos_account = new Account("Barto's account", 100.00);
$bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state" . PHP_EOL;
echo $bartos_account->printAcc();
echo $bartos_swiss_account->printAcc();

$bartos_account->withdrawal(20);
echo "Barto's account balance is now: " . $bartos_account->balance() . PHP_EOL;
$bartos_swiss_account->deposit(200);
echo "Barto's Swiss account balance is now: " . $bartos_swiss_account->balance() . PHP_EOL;

echo "Final state" . PHP_EOL;
echo $bartos_account->printAcc();
echo $bartos_swiss_account->printAcc();
*/
//todo 2nd
/*
$mattsAccount = new Account("Matss`s account", 1000.00);
$myAccount = new Account("My account", 0);

echo "Initial state" . PHP_EOL;
echo $mattsAccount->printAcc();
echo $myAccount->printAcc();

$mattsAccount->withdrawal(100);
$myAccount->deposit(100);

echo "After transfer" . PHP_EOL;
echo $mattsAccount->printAcc();
echo $myAccount->printAcc();
*/
//todo 3rd
$A = new Account("A", 100);
$B = new Account("B", 0);
$C = new Account("C", 0);

Account::transfer($A, $B, 50);
Account::transfer($A, $C, 20);
echo $A->printAcc();
echo $B->printAcc();
echo $C->printAcc();