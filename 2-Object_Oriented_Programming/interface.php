<?php

/*
 * 接口中的方法都应该被其他类实现，所以定义的方法用过都是public
 */

/*
 * 接口与抽象类一样，不能实例化，只能被其他类实现
 * 但是接口不包含任何的属性和方法
 */

interface CarContract
{
    public function drive();
}

// 中间类，定义具体实现类的共有属性，抽象类实现接口，提高代码复用
abstract class BaseCar implements CarContract
{
    protected $brand;

    public function __construct($brand)
    {
        $this->brand = $brand;
    }

    // 将接口方法声明为抽象方法，让子类去实现
    abstract public function drive();
}

// 实现了某个接口的类必须实现接口声明的所有方法
class LynkCo01 extends BaseCar
{
    protected $brand;

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


class LynkCo03 extends BaseCar
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
    public function testDrive(CarContract $car)
    {
        $car->drive();
    }
}

$lynkCo01 = new LynkCo01();
$lynkco03 = new LynkCo03();

$testCar = new TestCar();
$testCar->testDrive($lynkCo01);
echo "============================" . PHP_EOL;
$testCar->testDrive($lynkco03);

// 类型运算符 instanceof
// 用于判断某个对象实例是否实现了某个接口，或者是某个父类/抽象类的子类实例

var_dump($lynkCo01 instanceof CarContract);
var_dump($lynkco03 instanceof BaseCar);
var_dump($testCar instanceof CarContract);
var_dump($testCar instanceof BaseCar);