<?php

interface IPaymentCalculationStrategy
{
    public function calcAmount(float $amount): float;
}

class NormalPaymentCalc implements IPaymentCalculationStrategy
{
    public function calcAmount(float $amount): float
    {
        return $amount;
    }
}

class Discount50PaymentCalc implements IPaymentCalculationStrategy
{
    public function calcAmount(float $amount): float
    {
        return $amount * 0.5;
    }
}

class Discount20PaymentCalc implements IPaymentCalculationStrategy
{
    public function calcAmount(float $amount): float
    {
        return $amount * 0.8;
    }
}

class PaymentProcessor
{
    private IPaymentCalculationStrategy $paymentStrategy;

    public function __construct(IPaymentCalculationStrategy $paymentCalculationStrategy)
    {
        $this->paymentStrategy = $paymentCalculationStrategy;
    }

    public function processPayment($amount):float
    {
        return $finalAmount = $this->paymentStrategy->calcAmount($amount);
    }
}

$normalPayment = new NormalPaymentCalc();
$discount20PaymentProcess = new Discount20PaymentCalc();
$discount50PaymentProcess = new Discount50PaymentCalc();


$paymentProcessor = new PaymentProcessor($discount50PaymentProcess);


$amount = 100;



$res = $paymentProcessor->processPayment($amount);
echo $res;