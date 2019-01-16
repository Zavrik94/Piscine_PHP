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
    sort($res, SORT_STRING);
    return ($res);
}