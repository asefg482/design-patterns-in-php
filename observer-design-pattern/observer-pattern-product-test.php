<?php

interface Observer
{
    public function update(Product $product);
}

class Logger implements Observer
{
    public function update(Product $product)
    {
        echo "Log: this product name is '{$product->getName()}'";
    }
}

class Product
{
    private string $name;
    private float $price;
    private array $observers = [];

    /**
     * @param string $name
     * @param float $price
     */
    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function attachObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detachObserver(Observer $observer)
    {
        $key = array_search($observer, $this->observers);
        if($key !== false)
        {
            unset($this->observers[$key]);
        }
    }

    public function notifyObserver()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

}

$product = new Product("Pen",120000);
$logger = new Logger();

$product->attachObserver($logger);

$product->notifyObserver();