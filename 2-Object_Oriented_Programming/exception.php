<?php

function getItemFromBook($book, $key)
{
    if (empty($book) || !key_exists($key, $book)) {
        throw new InvalidArgumentException("数组索引为空或者对应索引不存在！");
    }
    $book[$key];
}

$book = [
    'title' => '大金',
    'summary' => '金',
    'author' => '学院君',
    'price' => 99.0,
    'website' => 'https://mrsnake.top',
    'created_at' => '2023',
    'is_published' => false
];

$val = "";
try {
    $val = getItemFromBook($book, 'desc');
} catch (InvalidArgumentException $exception) {
    echo $exception->getMessage();
}
var_dump($val);

// 多种异常
function getItemFromBook2($book, $key)
{
    if (empty($book)) {
        throw new InvalidArgumentException("数组为空！");
    }
    if (!key_exists($key, $book)) {
        throw new OutOfBoundsException("对应索引不存在！");
    }
    return $book[$key];
}

$a = [];
$val2 = "";
try {
    $val2 = getItemFromBook2($a, '');
} catch (InvalidArgumentException|OutOfBoundsException $exception) {
    // 异常上抛
//    throw $exception;
    echo $exception->getMessage();
} finally {
    // 不管怎么样，都会执行
    echo "done" . PHP_EOL;
}
var_dump($val2);

// 全局异常处理器
// 处理这些未被捕获和处理的异常
function myExceptionHandler(Exception $exception)
{
    echo 'Uncaught Exception [' . get_class($exception) . ']: ' . $exception->getMessage() . PHP_EOL;
    echo 'Thrown in ' . $exception->getFile() . ' on line ' . $exception->getLine() . PHP_EOL;
}

set_exception_handler('myExceptionHandler');

function throwError()
{
    global $book;
    try {
        $val = getItemFromBook2($book, 'desc');
    } catch (InvalidArgumentException $exception) {
        throw $exception;
    } catch (OutOfBoundsException $exception) {
        throw $exception;
    } finally {
        if (isset($val)) {
            var_dump($val);
        } else {
            echo '异常将通过全局异常处理器处理...' . PHP_EOL;
        }
    }
}

throwError();

// 自定义异常类
// final 还可以用于修饰类，通过 final 修饰的类将不能被子类继承。
class IndexNotExistsException extends LogicException
{

}