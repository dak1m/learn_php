<?php
$a = 3;
$b = 5;

$a += $b;  // 等价于 $a = $a + $b;
printf("%d\n", $a);
$a -= $b;  // 等价于 $a = $a - $b;
printf("%d\n", $a);
$a *= $b;  // 等价于 $a = $a * $b;
printf("%d\n", $a);
$a /= $b;  // 等价于 $a = $a / $b;
printf("%d\n", $a);
$a %= $b;  // 等价于 $a = $a % $b;
printf("%d\n", $a);

# 自增/自减运算符
$a = 32;  // 将 $a 恢复为 32
$a++;  // 等价于 $a += 1;
$b--;  // 等价于 $b -= 1;
printf("a, b = %d, %d\n", $a, $b);

# ++/-- 自增运算符放到变量之前
# 原值不变
$a = 32;
$b = 5;
$n1 = $a++;
$n2 = $b--;
printf("%d,%d,%d,%d\n", $a, $b, $n1, $n2);

# 原值变化
$a = 32;
$b = 5;
$n1 = ++$a;
$n2 = --$b;
printf("%d,%d,%d,%d\n", $a, $b, $n1, $n2);

# 比较运算符
$a = 32;
$b = 8;
var_dump($a == $b);  // false
var_dump($a != $b);  // true
var_dump($a > $b);   // true

# 严格比较
# 比较值和类型
$c = 32;
$d = 32.0;
var_dump($c == $d);  // true
var_dump($c != $d);  // false
var_dump($c === $d); // false
var_dump($c !== $d); // true
var_dump($a == $c);  // true
var_dump($a === $c); // true

# 逻辑运算符
if ($a > $b && $a >= $c) {
    // do something...
}

if ($a > $b || $a >= $c) {
    // do something...
}

if (!($a < $b)) {
    // do something...
}

# 被认为FALSE的值
/*
1. 布尔值本身
2. 整型0
3. 浮点型值0.0
4. 空字符串和字符串"0"
5. 不包括任何元素的数组
6. 特殊类型null（包括尚未复制的变量）
7. 从空标记生成的SimpleXML对象
 */

# 其他运算符
# 运算符优先级（https://www.php.net/manual/zh/language.operators.precedence.php）