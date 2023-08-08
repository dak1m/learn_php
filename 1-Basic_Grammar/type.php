<?php

# 字符串可以通过单引号或者双引号定义

$name = "Laravel 精品课";
$author = "dakim";

if (is_string($name)) {
    echo '$name 是字符串' . PHP_EOL;
}

if (is_string($author)) {
    echo '$author 也是字符串' . PHP_EOL;
}


# 变量类型
var_dump($name) . PHP_EOL;
var_dump($author) . PHP_EOL;

# 单引号与双引号的区别
if (is_string($name)) {
    echo "$name 是字符串" . PHP_EOL;
}

if (is_string($author)) {
    echo '$author 也是字符串' . PHP_EOL;
}

# int
$publish = 2023;
var_dump($publish);

echo "当前系统 PHP 整形有效值范围：" . PHP_INT_MIN . "~" . PHP_INT_MAX;

# float
$price = 99.00;
var_dump($price);

# bool
$published = false;

echo "----".PHP_EOL;
# 类型转换
$str = "123";
$int = 2020;
$float = 99.0;
$bool = false;

var_dump((int)$str);
var_dump((bool)$str);
var_dump((int)$float);
var_dump((string)$float);
var_dump((string)$bool);
var_dump((int)$bool);


exit();
