<?php

/*
 * trait扩展功能
 * 支持定义方法和属性，但不能定义构造函数，所以不能实例化
 * 同一个 Trait 可以被多个类复用，从而突破 PHP 单继承机制的限制，有效提升代码复用性和扩展性。
 */

trait PowerTrait
{
    protected function gas()
    {
        return '汽油';
    }

    protected function battery()
    {
        return '电池';
    }
}

class CarTrait
{
    use PowerTrait;

    public function drive()
    {
        echo "动力来源：" . $this->gas() . PHP_EOL;
        echo "汽车启动..." . PHP_EOL;
    }
}

$car = new CarTrait();
$car->drive();

// 可见性
// 和类一样，可以定义可见性设置（private、protected、public），
// 并且即使是 private 级别的方法和属性，依然可以在使用类中调用

trait PowerTrait2
{
    protected $power;

    protected function gas()
    {
        $this->power = '汽油';
    }

    public function battery()
    {
        $this->power = '电池';
    }

    private function water()
    {
        $this->power = '水';
    }

    public function printText()
    {
        echo "动力来源：" . $this->power . PHP_EOL;
    }
}

class CarTrait2
{
    use PowerTrait2;

    public function drive()
    {
        // 设置动力来源
        // 调用自己属性一样，调用trait
        $this->battery();
        echo "动力来源：" . $this->power . PHP_EOL;
        echo "汽车启动..." . PHP_EOL;
    }
}

$car = new CarTrait2();
$car->drive();

// 同名方法重写的优先级依次是：使用 Trait 的类 > Trait > 父类

// 使用多个 Trait
trait Engine
{
    protected $engine;

    protected function three()
    {
        return $this->engine = 3;
    }

    protected function four()
    {
        return $this->engine = 4;
    }

    public function printText()
    {
        echo "发动机个数：" . $this->engine . PHP_EOL;
    }
}

class CarTrait3
{
    use PowerTrait2, Engine {
        // 显示指定调用两个trait中重名的方法（这条是必须得）
        Engine::printText insteadof PowerTrait2;
        // 指定别名
        PowerTrait2::printText as printPower;
        Engine::printText as printEngine;
    }

    public function drive()
    {
        // 设置动力来源
//        echo "动力来源：" . $this->gas() . PHP_EOL;
        echo "发动机：" . $this->four() . PHP_EOL;
        echo "汽车启动..." . PHP_EOL;
        $this->printText();
    }
}

$car = new CarTrait3();
$car->drive();

// Trait 组合
trait Component
{
    use PowerTrait2, Engine {
        Engine::printText insteadof PowerTrait2;
        PowerTrait2::printText as printPower;
        Engine::printText as printEngine;
    }

    protected function init()
    {
        $this->gas();
        $this->four();
    }
}

class CarTrait4
{
    use Component;

    public function drive()
    {
        // 初始化系统
        $this->init();
        $this->printPower();
        $this->printEngine();
        echo "汽车启动..." . PHP_EOL;
    }
}

$car = new CarTrait4();
$car->drive();