<?php

class FoodOrder
{
    private string $name;
    private int $count;
    private string $size;

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $size
     */
    public function setSize(string $size): void
    {
        $this->size = $size;
    }

    /**
     * @param int $count
     */
    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    public function displayOrder()
    {
        echo "Order is : {$this->name} and size is {$this->size} and count is : {$this->count}";
    }
}

class FoodOrderBuilder
{
    private FoodOrder $foodOrder;

    public function __construct()
    {
        $this->foodOrder = new FoodOrder();
    }

    public function setName(string $name): FoodOrderBuilder
    {
        $this->foodOrder->setName($name);
        return $this;
    }

    public function setSize(string $size): FoodOrderBuilder
    {
        $this->foodOrder->setSize($size);
        return $this;
    }

    public function setCount(int $count): FoodOrderBuilder
    {
        $this->foodOrder->setCount($count);
        return $this;
    }

    public function build(): FoodOrder
    {
        return $this->foodOrder;
    }
}


$foodOrder = new FoodOrderBuilder();
$food = $foodOrder->setName("Pizza")->setSize("Large")->setCount(3)->build();
$food->displayOrder();