<?php

class Car
{
    private string $name;
    private string $model;
    private int $buildYear;

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param int $buildYear
     */
    public function setBuildYear(int $buildYear): void
    {
        $this->buildYear = $buildYear;
    }

    public function show()
    {
        echo "Car is : {$this->name} model {$this->model} for {$this->buildYear}";
    }
}

class CarBuilder
{
    private Car $car;

    public function __construct()
    {
        $this->car = new Car();
    }

    public function setName(string $name): CarBuilder
    {
        $this->car->setName($name);
        return $this;
    }

    public function setModel(string $model): CarBuilder
    {
        $this->car->setModel($model);
        return $this;
    }

    public function setBuildYear(int $buildYear): CarBuilder
    {
        $this->car->setBuildYear($buildYear);
        return $this;
    }

    public function build():Car
    {
        return $this->car;
    }
}

$car = new CarBuilder();
$dodge = $car->setName('Dodge')->setModel("Challenger")->setBuildYear(1969)->build();
$dodge->show();