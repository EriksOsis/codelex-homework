<?php

class SavingsAccount
{
    public float $interestRateA;
    public float $balance;
    public float $startingBalance;
    public float $interestRateM;


    public function __construct(float $balance, float $interestRateA)
    {
        $this->balance = $balance;
        $this->interestRateA = $interestRateA;
    }

    public function printSavings()
    {
        return $this->startingBalance;
    }

    public function monthlyInterest(float $interestRateA)
    {
        return $interestRateM = $interestRateA / 12;
    }

    public function subtractingTheAmountOfWithdrawal(float $balance, float $withdrawal)
    {
        $balance = $balance - $withdrawal;
    }

    public function addingTheAmountOfDeposit(float $balance, int $deposit)
    {
        $balance += $balance + $deposit;
    }

    public function addingTheAmountOfMonthlyInterestToTheBalance(float $balance, float $interestRateM)
    {
        return $balance += $balance * $interestRateM;
    }

    public function annualUpdate(float $balance, float $interestRateA)
    {
        return $balance += $balance * $interestRateA;
    }

}

$newBalance = readline("Enter balance: ");
$annualInterest = readline("Enter annual interest: ");
$openPeriod = readline("For how many months the account has been open: ");

$SavingsAccount = new SavingsAccount($newBalance, $annualInterest);
$interestRateM = $SavingsAccount->monthlyInterest($annualInterest);
$timePeriod = ($openPeriod * $interestRateM) * $newBalance + $newBalance;

echo "Monthly interest: " . $SavingsAccount->monthlyInterest($annualInterest);
echo PHP_EOL;
echo "Balance after 1 month: " . $SavingsAccount->addingTheAmountOfMonthlyInterestToTheBalance($newBalance, $interestRateM);
echo PHP_EOL;
//echo "Annual balance: " . $SavingsAccount->annualUpdate($newBalance, $annualInterest);
//echo PHP_EOL;
//echo "Account has been open for $openPeriod months and has grown to: ".$timePeriod.PHP_EOL;

$withdrawalAmount = 0;
$depositAmount = 0;


for ($i = 1; $i <= $openPeriod; $i++) {
    $withdrawal = readline("How much would you like to withdraw for month $i: ");
    $withdrawalAmount->subtractingTheAmountOfWithdrawal($newBalance, $withdrawal);
    $deposit = readline("How much would you like to deposit for month $i: ");
}

//$withdrawalAmount->subtractingTheAmountOfWithdrawal($newBalance, $withdrawal);
//$depositAmount->addingTheAmountOfDeposit($newBalance, $deposit);
//todo nesapratu kā izpildīt loopu :(