#!/usr/bin/php
<?php

function ft_is_sort($arr) {
    $arr_for_sort = $arr;
    $arr_for_rsort = $arr;
    sort($arr_for_sort);
    rsort($arr_for_rsort);
    if ($arr_for_sort == $arr || $arr_for_rsort == $arr)
        return true;
    else
        return false;
}