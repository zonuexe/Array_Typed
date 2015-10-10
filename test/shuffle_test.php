<?php

if (is_readable('vendor/autoload.php')) {
    require 'vendor/autoload.php';
} else {
    require_once 'Array/Uint8.php';
}

$a = Array_Uint8::fromArray(range(0, 9));
$a->shuffle();
var_dump($a);
var_dump($a->toArray());
