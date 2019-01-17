#!/usr/bin/php
<?php
    $arr = preg_split("/(\s)+/",$argv[1]);
    $i = 0;
    foreach ($arr as $val) {
        if ($val == "")
            unset($arr[$i]);
        $i++;
    }
    $i = 0;
    foreach ($arr as $val) {
        if ($i == count($arr) - 1) {
            echo $val . PHP_EOL;
        } else {
            echo $val . " ";
        }
        $i++;
    }