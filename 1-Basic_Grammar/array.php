<?php
$nums = [2, 4, 8, 11, 13];
$lans = ['PHP', 'GO', 'PYTHON'];

var_dump($nums);
var_dump($lans);

print_r($nums);
print_r($lans);

# crud
$fruits = [];
$fruits[] = 'Apple';
$fruits[] = 'Orange';
$fruits[] = 'Pear';

# get
$fruit = $fruits[0];
# update
$fruits[2] = 'Banana';
# delete
# 不会自动排列
unset($fruits[1]);
# 排列
$fruits = array_values($fruits);
# 全部删除
unset($fruits); # $fruits 变为null

# 动态类型
$book = [
    'Laravel精品课',
    '学院君',
    2020,
    99.0,
    false
];
# false 会被转化为空字符串，true 会被转化为 1
# 浮点型数字也会被转化为对应的字符串格式
print_r($book);

# 关联数组
$book = [
    'name' => 'Laravel精品课',
    'author' => '学院君',
    'publish_at' => 2020,
    'price' => 99.0,
    'published' => true
];
print_r($book);

# 部分指定
$book = [
    'name' => 'Laravel精品课',
    'author' => '学院君',
    'publish_at' => 2020,
    'price' => 99.0,
    'published' => true,
    '掌握 Laravel 和 Vue 技术栈，成为合格的 PHP 全栈工程师！',
    'https://xueyuanjun.com/books/master-laravel',
];

# crud
$book = [];
$book['name'] = 'Laravel精品课';
$book['author'] = '学院君';
$book['publish_at'] = 2020;
$book['price'] = 99.0;
$book['published'] = false;
$book['desc'] = '掌握 Laravel 和 Vue 技术栈，成为合格的 PHP 全栈工程师！';
$book['url'] = 'https://xueyuanjun.com/books/master-laravel';

$name = $book['name'];
$book['price'] = 199.0;
unset($book['url']);
print_r($book);