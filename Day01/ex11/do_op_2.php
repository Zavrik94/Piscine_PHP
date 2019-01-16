#!/usr/bin/php
<?php
function ft_split($str) {
    $op = array("+", "-", "*", "/", "%");
    for ($i = 0; $i < count($op); $i++) {
        $pos = strpos($str, $op[$i]);
        if ($pos)
            break;
    }
    if (!$pos)
        return 0;
    $res = explode($str[$pos], $str);
    if (count($res) != 2)
        return 0;
    $res[0] = str_replace(" ","",$res[0]);
    $res[0] = str_replace("\t","",$res[0]);
    $res[1] = str_replace(" ","",$res[1]);
    $res[1] = str_replace("\t","",$res[1]);
    $res[2] = $res[1];
    $res[1] = $str[$pos];
    $res = array_values($res);
    return ($res);
}

$res = ft_split($argv[1]);
if ($argc != 2)
    echo "Incorrect Parameters" . PHP_EOL;
else if ($res == 0)
    echo "Syntax Error" . PHP_EOL;
else if (count($res) != 3)
    echo "Syntax Error" . PHP_EOL;
else if (!is_numeric($res[0]) || !is_numeric($res[2]))
    echo "Syntax Error" . PHP_EOL;
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