<?php

// 兜底方法
class Car
{
    public function __call($name, $arguments)
    {
        echo "调用的成员方法不存在" . PHP_EOL;
    }

    public static function __callStatic($name, $arguments)
    {
        echo "调用的静态方法不存在" . PHP_EOL;
    }
}

(new Car())->drive();
Car::drive();

// __set()、__get()、__isset() 和 __unset()
/*
 * __set() 方法会在给不可访问属性赋值时调用；
 * __get() 方法会在读取不可访问属性值时调用；
 * 当对不可访问属性调用 isset() 或 empty() 时，__isset() 会被调用；
 * 当对不可访问属性调用 unset() 时，__unset() 会被调用。
 */

class Car2
{
    protected $data = [];
    protected $brand;

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }
}

$car = new Car2();
$car->brand = '奔驰';
var_dump($car->brand);

$car->wheels = 4;
var_dump($car->wheels);

// __invoke()
// 会在以函数方式调用对象时执行

class CarInvoke
{
    protected $brand;

    public function __invoke($brand)
    {
        $this->brand = $brand;
        echo "蓝天白云，定会如期而至 -- " . $this->brand . PHP_EOL;
    }
}

$car = new CarInvoke();
$car('宝马');