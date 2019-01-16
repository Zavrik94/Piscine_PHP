#!/usr/bin/php
<?php
function ft_split($str) {
    $res = array();
    $res = preg_split("/[\s]+/", $str);
    $i = 0;
    foreach ($res as $val) {
        if ($val == "") {
            unset($res[$i]);
        }
        $i++;
    }
    return ($res);
}

$res = array();
for ($i = 1; $i <= $argc; $i++) {
    $res = array_merge($res, ft_split($argv[$i]));
}
if (count($res) != 3)
    echo "Incorrect Parameters" . PHP_EOL;
else if (!is_numeric($res[0]) || !is_numeric($res[2]))
    echo "Incorrect Parameters" . PHP_EOL;
else {
    if ($res[1] == '+') {
        echo $res[0] + $res[2] . PHP_EOL;
    } else if ($res[1] == '-') {
        echo $res[0] - $res[2] . PHP_EOL;
    } else if ($res[1] == '*') {
        echo $res[0] * $res[2] . PHP_EOL;
    } else if ($res[1] == '/') {
        echo $res[0] / $res[2] . PHP_EOL;
    } else if ($res[1] == '%') {
        echo $res[0] % $res[2] . PHP_EOL;
    } else {
        echo "Incorrect Parameters" . PHP_EOL;
    }
}
