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
$i = 1;
while ($i <= count($res) - 1) {
    echo $res[$i] . " ";
    $i++;
}
if (count($res) > 0)
    echo $res[0] . "\n";