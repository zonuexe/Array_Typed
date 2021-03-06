<?php

if (is_readable('vendor/autoload.php')) {
    require 'vendor/autoload.php';
} else {
    require_once 'Array/Uint8.php';
    require_once 'Array/Sint16.php';
}

$prev_mem = $prev_time = null;

$arraySize = 1024 * 1024;

function perf_begin()
{
    global $prev_mem, $prev_time;
    $prev_mem = memory_get_usage();
    $prev_time = microtime(true);
}

function perf_end()
{
    global $prev_mem, $prev_time;
    echo '  memory:'.(memory_get_usage() - $prev_mem).PHP_EOL;
    echo '  time:'.(microtime(true)    - $prev_time).PHP_EOL;
    echo PHP_EOL;
}

echo "# array() // $arraySize".PHP_EOL;
perf_begin();
$arr = [];
foreach (range(0, $arraySize - 1) as $i) {
    $arr[] = 255;
}
perf_end();
$arr = null;

echo "# SplFixedArray($arraySize)".PHP_EOL;
perf_begin();
$arr = new SplFixedArray($arraySize);
foreach (range(0, $arraySize - 1) as $i) {
    $arr[$i] = 255;
}
perf_end();
$arr = null;

echo "# Array_Uint8($arraySize)".PHP_EOL;
perf_begin();
$arr = new Array_Uint8($arraySize);
foreach (range(0, $arraySize - 1) as $i) {
    $arr[$i] = 255;
}
perf_end();
$arr = null;

echo "# Array_Sint16($arraySize)".PHP_EOL;
perf_begin();
$arr = new Array_Sint16($arraySize);
foreach (range(0, $arraySize - 1) as $i) {
    $arr[$i] = -255;
}
perf_end();
$arr = null;
