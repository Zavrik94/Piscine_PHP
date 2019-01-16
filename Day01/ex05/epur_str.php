#!/usr/bin/php
<?php

function    ft_split($str) {
    $res = array();
    $res = explode(' ', $str);
    $i = 0;
    foreach ($res as $val) {
        if ($val == "") {
            unset($res[$i]);
        }
        $i++;
    }
    $res = array_values($res);
    return ($res);
}

$res = ft_split($argv[1]);
$i = 0;
foreach ($res as $val) {
    if ($i < count($res) - 1)
        echo $res[$i] . " ";
    else
        echo $res[$i] . "\n";
    $i++;
}