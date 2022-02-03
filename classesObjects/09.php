<?php

class BankAccount
{
    public string $username;
    public float $balance;

    public function show_user_name_and_balance(string $username, float $balance): string
    {
        if ($balance < 0) {
            return $username . ", $" . number_format($balance, 2, ".", " ");
        } else {
            return $username . ", $" . $balance ;
        }
    }
}

$ben = new BankAccount();

echo $ben->show_user_name_and_balance("Benson", -17.2);
