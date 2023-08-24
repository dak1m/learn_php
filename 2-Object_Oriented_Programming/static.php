<?php

class Car
{
    public static $WHEELS = 4;

    public static function getWheels()
    {
        return self::$WHEELS;
    }
}

// 静态属性和方法可以直接通过类引用（无需实例化，即可使用）
echo "WHEELS:" . Car::$WHEELS . PHP_EOL;
echo "getWheels:" . Car::getWheels() . PHP_EOL;

// 设置静态属性变量名
// 作用域是整个类，而不是某个对象
Car::$WHEELS = 8;
echo "getWheels:" . Car::getWheels() . PHP_EOL;

// 调用另一个类中的静态方法
class Gas
{
    public static $POWER = '汽油';
}

class Car2
{
    protected static $WHEELS = 4;

    public static function getWheels()
    {
        return self::$WHEELS;
    }

    public static function printCar()
    {
        printf("这辆车有 %d 个轮子，使用 %s 作为动力来源\n", self::$WHEELS, Gas::$POWER);
    }
}

Car2::printCar();

// 在非静态方法中调用静态属性/方法（因为静态方法实例化也不影响调用）
// 静态方法不可调用非静态方法（因为非静态方法需要实例化）
class Car3
{
    protected static $WHEELS = 4;

    public static function printCar()
    {
        return sprintf("这辆车有 %d 个轮子，使用 %s 作为动力来源\n", self::$WHEELS, Gas::$POWER);
    }

    public function __toString()
    {
        return self::printCar();
    }
}

$car3 = new Car3();
echo $car3;

// 静态方法的继承和重写

class parent_
{

    public static function getClassName(): string
    {
        return __CLASS__;
    }

    public static function who(): void
    {
        echo self::getClassName() . PHP_EOL;
    }
}

class children extends parent_
{
    public static function getClassName(): string
    {
        return __CLASS__;
    }

}

echo parent_::getClassName() . PHP_EOL;
echo children::getClassName() . PHP_EOL;

parent_::who();
children::who();

// 后期静态绑定
// static 在定义它的类中调用，则指向当前类
class parent_2
{

    public static function getClassName(): string
    {
        return __CLASS__;
    }

    public static function who(): void
    {
        echo static::getClassName() . PHP_EOL;
    }
}

class children2 extends parent_2
{
    public static function getClassName(): string
    {
        return __CLASS__;
    }

}

parent_2::who();
children2::who();

// self::class 则始终指向的是定义它的类