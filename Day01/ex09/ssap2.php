#!/usr/bin/php
<?php

function ft_split($str) {
    $res = array();
    $res = explode(' ', $str);
    $i = 0;
    foreach ($res as $val) {
        if ($val == "") {
            unset($res[$i]);
        }
        $i++;
    }
    sort($res, SORT_STRING);
    return ($res);
}

function check_char($c1, $c2) {
    if ($c1 >= 'A' && $c1 <= 'Z') {
        $type1 = 3;
    } else if ($c1 >= 'a' && $c1 <= 'z') {
        $type1 = 3;
        $c1 = strtoupper($c1);
    } else if ($c1 >= '0' && $c1 <= '9') {
        $type1 = 2;
    } else {
        $type1 = 1;
    }
    if (($c2 >= 'A' && $c2 <= 'Z')) {
        $type2 = 3;
    } else if ($c2 >= 'a' && $c2 <= 'z') {
        $type2 = 3;
        $c2 = strtoupper($c2);
    } else if ($c2 >= '0' && $c2 <= '9') {
        $type2 = 2;
    } else {
        $type2 = 1;
    }
    if ($type1 == $type2) {
        if ($c1 == $c2) {
            return 0;
        } else if ($c1 > $c2) {
            return -1;
        } else {
            return 1;
        }
    } else if ($type1 > $type2) {
        return 1;
    } else {
        return -1;
    }
}

function comp($str1, $str2) {
    $i = 0;
    while ($i < strlen($str1) && $i < strlen($str2)) {
        $comp = check_char($str1[$i], $str2[$i]);
        if ($comp != 0)
            return $comp;
        $i++;
    }
    if ($i == strlen($str1) && $i == strlen($str2)) {
        return 0;
    } else if ($i == strlen($str1) && $i < strlen($str2)) {
        return 1;
    } else if ($i < strlen($str1) && $i == strlen($str2))
        return -1;

}

function check_arr($arr) {
    $i = 0;
    foreach ($arr as $val) {
        if ($i != count($arr) - 1) {
            if (comp($arr[$i], $arr[$i + 1]) == -1) {
                return 0;
            }
        }
        $i++;
    }
    return (1);
}

function ft_sort($arr) {
    $i = 0;
    while (!check_arr($arr)) {
        if ($i == count($arr) - 1) {
            $i = 0;
        }
        if (comp($arr[$i], $arr[$i + 1]) == -1) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$i + 1];
            $arr[$i + 1] = $temp;
        }
        $i++;
    }
    return $arr;
}

$res = array();
for ($i = 1; $i <= $argc; $i++) {
    $res = array_merge($res, ft_split($argv[$i]));
}
$res = ft_sort($res);
$i = 0;
foreach ($res as $val) {
    echo $res[$i] . "\n";
    $i++;
}