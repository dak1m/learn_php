<?php
require 'class.php';

// PHP 遵循单继承机制，即一个子类只能继承自一个父类。
class Benz extends Car
{
    private $customProp = "自定义属性";

    public function __construct($seats = 5, $doors = 4, $engine = 1)
    {
        $this->brand = '奔驰';
        // $this->setBrand('奔驰');  // 也可以通过该方法设置
        parent::__construct($seats, $doors, $engine, $this->brand);
    }

    private function customMethod(): void
    {
        echo "Call custom prop \$customProp: " . $this->customProp . PHP_EOL;
        echo "This is a custom method in Benz Class" . PHP_EOL;
    }
}

$benz = new Benz();
$benz->drive();

// 封装
// 调用者无需关心调用细节

// 反射
// 通过反射访问protected和private的属性和方法
$method = new ReflectionMethod(Benz::class, 'customMethod');
$method->setAccessible(true);

$benz = new Benz();
$method->invoke($benz);

// 多态
// 子类定义和父类相同的方法，覆盖父类的实现
class Bmw extends Car
{
    public function __construct($seats = 5, $doors = 4, $engine = 1)
    {
        $this->brand = '宝马';
        parent::__construct($seats, $doors, $engine, $this->brand);
    }

    public function drive()
    {
        echo "1.启动引擎..." . PHP_EOL;
        echo "2.挂D档..." . PHP_EOL;
        echo "3.放下手刹..." . PHP_EOL;
        echo "4.踩油门,起飞了..." . PHP_EOL;
        printf("5.%s汽车已出发\n", $this->brand);
    }
}

$bmw = new Bmw();
$bmw->drive();

// 类型转化
/*
 * 子类可以传入父类，父类不可以传入子类
 */

class TestCarDrive
{
    public function testDrive(Car $car)
    {
        $car->drive();
    }

    public function testBenzDrive(Benz $benz)
    {
        $benz->drive();
    }
}

// 初始化类对象
$bmw = new Car(1, 2, 3, '宝马');
$benz = new Benz();
$test = new TestCarDrive();

// 测试子类转父类
$test->testDrive($benz);
// 测试父类转子类(error)
//$test->testBenzDrive($bmw);