<?php

interface IObserver
{
    public function update(ICar $car);
}

class LoggerObserver implements IObserver
{
    public function update(ICar $car)
    {
        echo "Car Log: this name is '{$car->getName()}' and model is '{$car->getModel()}'";
    }
}

interface ICar
{
    public function getName(): string;

    public function getModel(): string;
}

class Dodge implements ICar
{
    private string $name;
    private string $model;
    private array $observers;

    public function __construct(string $name, string $model)
    {
        $this->name = $name;
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function attachObserver(IObserver $observer)
    {
        $this->observers[] = $observer;
    }

    public function detachObserver(IObserver $observer)
    {
        $key = array_search($observer,$this->observers);
        if($key !==false)
        {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

$car = new Dodge("Challenger","SS 1969");
$car->setModel("1968");

$logger = new LoggerObserver();

$car->attachObserver($logger);

$car->notifyObservers();