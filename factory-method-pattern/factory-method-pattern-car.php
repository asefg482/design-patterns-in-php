<?php

use JetBrains\PhpStorm\Pure;

interface ICar
{
    public function getName(): string;
}

class Banz implements ICar
{
    public function getName(): string
    {
        return 'Mercedes Banz';
    }
}

class Bmw implements ICar
{
    public function getName(): string
    {
        return "BMW";
    }
}

class Dodge implements ICar
{
    public function getName(): string
    {
        return "Dodge";
    }
}


interface CarFactory
{
    public function createCar(): ICar;
}

class BanzFactory implements CarFactory
{
    #[Pure] public function createCar(): ICar
    {
        return new Banz();
    }
}

class BmwFactory implements CarFactory
{
    #[Pure] public function createCar(): ICar
    {
        return new Bmw();
    }
}

class DodgeFactory implements CarFactory
{
    #[Pure] public function createCar(): ICar
    {
        return new Dodge();
    }
}


$dodgeFactory = new DodgeFactory();
$dodge = $dodgeFactory->createCar();
echo $dodge->getName();