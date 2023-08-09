<?php
$add = function (int $a, int $b): int {
    return $a + $b;
};

// 调用
$a = 1;
$b = 2;
$sum = $add($a, $b);
echo "$a + $b = $sum" . PHP_EOL;

var_dump($add);
$sum = call_user_func($add, $a, $b);
print($sum) . PHP_EOL;

// 可变数量的参数列表
# function call_user_func ($function, ...$parameter) {}

// 默认参数
$add = function (int $a, int $b = 2): int {
    return $a + $b;
};

$n1 = 1;
$n2 = 2;
$sum = $add($n1);
echo "$n1 + $n2 = $sum" . PHP_EOL;

// 可变函数
function multi(int $a, int $b): int
{
    return $a * $b;
}

// 会调用multi函数
$add = 'multi';
printf("%d", $add(5, 6)) . PHP_EOL;

// 作用域
// use 关键字传递当前上下文中的变量
// 计算两数相加
$add = function () use ($n1, $n2) {
    return $n1 + $n2;
};

// 计算两数相乘
$multi = function () use ($n1, $n2) {
    return $n1 * $n2;
};

// 调用匿名函数
$sum = $add();
echo "$n1 + $n2 = $sum" . PHP_EOL;
$product = $multi();
echo "$n1 x $n2 = $product" . PHP_EOL;

// 通过 global 声明全局变量
// 全局变量存在于一个全局的范围，无论当前在执行的是哪个函数
function add1($n1, $n2)
{
    return function () use ($n1, $n2) {
        return $n1 + $n2;
    };
}

function add2()
{
    return function () {
        global $n1, $n2, $n3;
        return $n1 + $n2 + $n3;
    };
}

$n1 = 1;
$n2 = 3;
$n3 = 4;
$add = add1($n1, $n2);
$sum = $add();
echo "$n1 + $n2 = $sum" . PHP_EOL;

$add = add2();
$sum = $add();
echo "$n1 + $n2 + $n3 = $sum" . PHP_EOL;