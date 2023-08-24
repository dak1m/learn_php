<?php
// 排除warning错误
//error_reporting(E_ALL ^ E_WARNING);

//$content = file_get_contents('https://mrsnake.top/error');
//echo $content;

// 自定义错误处理器
set_error_handler("myErrorHandler");
$content = file_get_contents('https://mrsnake.top/error');
echo $content;

/**
 * 自定义错误处理器
 * @param $errno int 错误级别
 * @param $errstr string 错误信息
 * @param $errfile string 错误文件
 * @param $errline  int   错误行号
 */
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    // 该级别错误不报告的话退出
    if (!(error_reporting() & $errno)) {
        return;
    }

    $logDir = __DIR__ . DIRECTORY_SEPARATOR . 'logs';
    $logFile = $logDir . DIRECTORY_SEPARATOR . 'err.log';

    switch ($errno) {
        case E_ERROR:
            error_log("致命错误类型: [$errno] $errstr\n", 3, $logFile);
            break;
        case E_WARNING:
            error_log("警告错误类型: [$errno] $errstr\n", 3, $logFile);
            break;
        case E_NOTICE:
            error_log("一般错误类型: [$errno] $errstr\n", 3, $logFile);
            break;
        default:
            error_log("未知错误类型: [$errno] $errstr\n", 3, $logFile);
            break;
    }
}

//ini_set('display_errors', 1);
// Error 异常
try {
    $content = file_get_contents('https://mrsnake.top/catch');
} catch (Error $error) {
    echo "catch";
    var_dump($error);
}
var_dump($content);

// display_startup_errors，表示是否显示 PHP 启动过程中的错误信息
// 建议在线上环境将这两个配置值都设置为 0