<?php

interface ISalaryStrategy
{
    public function calcSalary(float $salary): float;
}

class JuniorDeveloperSalary implements ISalaryStrategy
{
    public function calcSalary(float $salary): float
    {
        return $salary * 0.4;
    }
}

class MidLevelDeveloperSalary implements ISalaryStrategy
{
    public function calcSalary(float $salary): float
    {
        return $salary * 0.7;
    }
}

class SeniorDeveloperSalary implements ISalaryStrategy
{
    public function calcSalary(float $salary): float
    {
        return $salary;
    }
}

class DeveloperPayment
{
    private ISalaryStrategy $salaryStrategy;

    public function __construct(ISalaryStrategy $salaryStrategy)
    {
        $this->salaryStrategy = $salaryStrategy;
    }

    public function pay(float $salary): float
    {
        return $this->salaryStrategy->calcSalary($salary);
    }

}

$seniorDeveloperPay = new SeniorDeveloperSalary();
$MidLevelDeveloperPay = new MidLevelDeveloperSalary();
$juniorDeveloperPay = new JuniorDeveloperSalary();


$seniorDeveloperPayment = new DeveloperPayment($seniorDeveloperPay);
$midLevelDeveloperPayment = new DeveloperPayment($MidLevelDeveloperPay);
$juniorDeveloperPayment = new DeveloperPayment($juniorDeveloperPay);

$salary = 1000000;

echo $seniorDeveloperPayment->pay($salary);
echo $midLevelDeveloperPayment->pay($salary);
echo $juniorDeveloperPayment->pay($salary);
