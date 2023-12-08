<?php

use JetBrains\PhpStorm\Pure;

interface IHumanRegister
{
    public function register(Human $human);
}

class HumanRegister implements IHumanRegister
{
    public function register(Human $human)
    {
        echo "Human with name {$human->getName()} and last name : {$human->getLastName()} registered !\n";
    }
}

class HumanRegisterProxy
{
    private HumanRegister $humanRegister;
    private Human $human;

    #[Pure] public function __construct(Human $human)
    {
        $this->humanRegister = new HumanRegister();
        $this->human = $human;
    }

    public function register()
    {
        if ($this->human->getAge() >= 18) {
            $this->humanRegister->register($this->human);
        } else {
            echo "user are not above 18 years old";
        }
    }
}

class Human
{
    private string $name;
    private string $lastName;
    private string $age;

    public function __construct(string $name, string $lastName, int $age)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->age = $age;
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
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return int|string
     */
    public function getAge(): int|string
    {
        return $this->age;
    }
}

$human = new Human('test','test',19);
$humanProxy = new HumanRegisterProxy($human);
$humanProxy->register();
