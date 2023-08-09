<?php
/*
顺序结构
选择结构
循环结构
跳转结构
 */
# 顺序结构
define("A", "优秀");
define("B", "良好");
define("C", "合格");
define("D", "不合格");
define("YUWEN", '1');
define("SHUXUE", '2');
define("JISUANJI", '3');

$data = [
    '1' => [
        YUWEN => 88,
        SHUXUE => 99,
        JISUANJI => 96
    ],
    '2' => [
        YUWEN => 77,
        SHUXUE => 58,
        JISUANJI => 63
    ],
    '3' => [
        YUWEN => 93,
        SHUXUE => 85,
        JISUANJI => 72
    ],
];

# 选择结构
# 单分支结构
$studentId = '1';
$score = $data[$studentId][YUWEN];
if ($score >= 80 && $score < 90) {
    printf("学生 %d 的语文分数: %0.1f, 对应等级是: %s\n", $studentId, $score, A);
}

# 双分支结构
$studentId = '2';
$score = $data[$studentId][YUWEN];
if ($score >= 80 && $score < 90) {
    printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, A);
} else {
    printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, "其他等级");
}

# 多分支结构
$studentId = '2';
$score = $data[$studentId][YUWEN];
if ($score >= 90) {
    printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, A);
} else if ($score >= 80 && $score < 90) {
    printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, B);
} else if ($score >= 60 && $score < 80) {
    printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, C);
} else if ($score < 60) {
    printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, D);
} else {
    printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, "其他等级");
}

# switch 分支语句

$studentId = '2';
$score = $data[$studentId][YUWEN];
$level = match ($score) {
    $score >= 90 => A,
    $score >= 80 && $score < 90 => B,
    $score >= 60 && $score < 80 => C,
    $score < 60 => D,
    default => "其他等级",
};
printf("学生 %d 的语文分数: %0.1f, 对应等级: %s\n", $studentId, $score, $level);

# 循环结构
$total = count($data);
$i = 1;
while ($i <= $total) {
    echo "第 $i 个学生的成绩信息：\n";
    print_r($data[$i]);
    $i++;
}

# 不常见
do {
    echo "第 $i 个学生的成绩信息：\n";
    print_r($data[$i]);
    $i++;
} while ($i <= $total);

# for
for ($i = 1; $i <= $total; $i++) {
    echo "第 $i 个学生的成绩信息：\n";
    print_r($data[$i]);
}

# foreach
foreach ($data as $id => $score) {
    echo "第 {$id} 个学生的成绩信息：\n";
    print_r($score);
}

# break vs. continue
foreach ($data as $id => $score) {
    echo "第 {$id} 个学生的成绩信息：\n";
    print_r($score);
    if ($id == 2) {
        break;
    }
}
foreach ($data as $id => $score) {
    if ($id == 1) {
        continue;
    }
    echo "第 {$id} 个学生的成绩信息：\n";
    print_r($score);
    if ($id == 2) {
        break;
    }
}

# 跳转结构
# goto
