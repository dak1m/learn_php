<?php

/*
 * 1、Program to an interface, not an implementation（面向接口编程，而不是具体的实现）
 * 2、Favor object composition over class inheritance（优先使用对象组合而不是类继承的方式实现代码复用）
 */

/*
 * 类继承是垂直（纵向）扩展类功能，对象组合则是水平（横向）扩展类功能
 */

interface CarContract
{
    public function drive();

//    public function power(Gas $gas);
}

abstract class BaseCar implements CarContract
{
    protected $brand;
    protected $power;

    public function __construct(Power $power, $brand)
    {
        $this->brand = $brand;
        $this->power = $power;
    }

    abstract public function drive();

//    abstract public function power(Gas $gas);
}

class LynkCo01 extends BaseCar
{
    public function __construct(Power $power)
    {
        parent::__construct($power, '领克01');
    }

    public function drive()
    {
        echo "启动{$this->brand}汽车" . PHP_EOL;
        echo "动力来源：" . $this->power->power() . PHP_EOL;
    }

}

class Gas
{
    // 该方法会在打印对象时调用，这样就可以将其返回结果作为打印字符串输出
    public function __toString()
    {
        return "汽油";
    }
}

//$l = new LynkCo01();
//$gas = new Gas();
//$l->power($gas);

// 通过接口解除对具体类的依赖
interface Power
{
    public function power();
}

class GasI implements Power
{

    public function power()
    {
        return "汽油";
    }
}

class Battery implements Power
{

    public function power()
    {
        return "电池";
    }
}

$battery = new Battery();
$lynk01 = new LynkCo01($battery);
$lynk01->drive();
echo "电力不足，自动切换为使用汽油作为动力来源..." . PHP_EOL;
$gas = new GasI();
$lynk01 = new LynkCo01($gas);
$lynk01->drive();