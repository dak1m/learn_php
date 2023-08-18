<?php

// 抽象方法是一个方法声明，不能有具体实现
// 只要某个类至少包含一个抽象方法，他就是抽象类
/*
 * 抽象类本身不能被实例化，只能被子类继承，并且子类需要实现父类中的抽象方法
 */

abstract class Car_
{
    protected $brand;

    /**
     * Car constructor.
     * @param $brand
     */
    public function __construct($brand)
    {
        $this->brand = $brand;
    }

    abstract public function drive();
}

class LynkCo extends Car_
{
    public function __construct()
    {
        $this->brand = '领克01';
        parent::__construct($this->brand);
    }

    public function drive()
    {
        echo "启动{$this->brand}汽车" . PHP_EOL;
    }
}

class LynkCo03 extends Car_
{
    public function __construct()
    {
        $this->brand = '领克03';
        parent::__construct($this->brand);
    }

    public function drive()
    {
        echo "提示：手动档需要踩离合器" . PHP_EOL;
        echo "启动{$this->brand}汽车" . PHP_EOL;
    }
}

class TestCar
{
    public function testDrive(Car_ $car)
    {
        $car->drive();
    }
}

$lynkCo01 = new LynkCo();
$lynkco03 = new LynkCo03();

$testCar = new TestCar();
$testCar->testDrive($lynkCo01);
echo "============================" . PHP_EOL;
$testCar->testDrive($lynkco03);