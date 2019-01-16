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

$res = array();
for ($i = 1; $i <= $argc; $i++) {
    $res = array_merge($res, ft_split($argv[$i]));
}
sort($res, SORT_STRING);
$i = 0;
foreach ($res as $val) {
    echo $res[$i] . "\n";
    $i++;
}