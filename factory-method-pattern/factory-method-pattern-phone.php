<?php

use JetBrains\PhpStorm\Pure;

interface IPhone
{
    public function getBrand(): string;
}


class Galaxy implements IPhone
{
    public function getBrand(): string
    {
        // TODO: Implement getBrand() method.
        return "Galaxy";
    }
}


interface PhoneFactory
{
    public function create(): IPhone;
}

class GalaxyFactory implements PhoneFactory
{
    #[Pure] public function create(): IPhone
    {
        return new Galaxy();
    }
}

$galaxyFactory = new GalaxyFactory();
$galaxy = $galaxyFactory->create();
echo $galaxy->getBrand();