<?php

interface Observer {
    public function update(Product $product);
}

class Logger implements Observer {
    public function update(Product $product) {
        echo "Log: Product '{$product->getName()}' quantity updated to {$product->getQuantity()}\n";
    }
}

class Notifier implements Observer {
    public function update(Product $product) {
        echo "Notification: Product '{$product->getName()}' quantity is now {$product->getQuantity()}\n";
    }
}


class Product {
    private $name;
    private $quantity;
    private $observers = [];

    public function __construct($name, $quantity) {
        $this->name = $name;
        $this->quantity = $quantity;
    }

    public function getName() {
        return $this->name;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        $this->notifyObservers();
    }

    public function attachObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detachObserver(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

$product = new Product("Laptop", 10);

$logger = new Logger();
$notifier = new Notifier();

$product->attachObserver($logger);
$product->attachObserver($notifier);

$product->setQuantity(8);
