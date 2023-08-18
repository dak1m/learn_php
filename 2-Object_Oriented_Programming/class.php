<?php
if (class_exists('Car')) {
    echo "class Car exists." . PHP_EOL;
} else {
    echo "class Car not exists." . PHP_EOL;
}

/**
 * Class Car
 */
class Car
{
    /**
     * @param $seats
     * @param $doors
     * @param $engine
     * @param $brand
     */
    public function __construct($seats, $doors, $engine, $brand = 3)
    {
        $this->seats = $seats;
        $this->doors = $doors;
        $this->engine = $engine;
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * @param mixed $seats
     */
    public function setSeats($seats): void
    {
        $this->seats = $seats;
    }

    /**
     * @return mixed
     */
    public function getDoors()
    {
        return $this->doors;
    }

    /**
     * @param mixed $doors
     */
    public function setDoors($doors): void
    {
        $this->doors = $doors;
    }

    /**
     * @return mixed
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * @param mixed $engine
     */
    public function setEngine($engine): void
    {
        $this->engine = $engine;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }

    const WHEELS = 4;   // 汽车都是4个轮子
    var $seats;         // 座位
    var $doors;         // 门
    var $engine;        // 发动机
    var $brand;         // 品牌

    public function drive()
    {
        echo "1.启动引擎..." . PHP_EOL;
        echo "2.挂D档..." . PHP_EOL;
        echo "3.放下手刹..." . PHP_EOL;
        echo "4.踩油门,出发..." . PHP_EOL;
        printf("5.%s汽车已出发\n", $this->brand);
    }

    public function close()
    {
        echo "1.踩刹车..." . PHP_EOL;
        echo "2.挂P档..." . PHP_EOL;
        echo "3.拉起手刹..." . PHP_EOL;
        echo "4.关闭引擎..." . PHP_EOL;
        printf("5.%s汽车已熄火\n", $this->brand);
    }
}

# 实例化
$car = new Car(1, 4, 3);
var_dump(Car::WHEELS);

$car->seats = 5;
var_dump($car->seats);

$car->setBrand("奔驰");
var_dump($car->getBrand());

// 方法调用
$car->drive();
$car->close();

// 对于通过 public 声明的属性和方法，在类以外和继承类中均可见；
// 对于通过 protected 声明的属性和方法，仅在继承类（支持多个层级）中可见，在类以外不可见；
// 对于通过 private 声明的属性和方法，仅在当前类内部可见，在继承类和类之外不可见。