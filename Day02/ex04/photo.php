#!/usr/bin/php
<?php

if ($argc != 2)
    exit (1);
if ($html = file_get_contents("$argv[1]")) {
    //echo $html;
    $img_arr = preg_match_all("/<img.*?src=\"(.*?)\".*?>/i", $html, $matches);
    //print_r($matches);
    $folder = strchr($argv[1] , '/').PHP_EOL;
    $folder = trim($folder, "/\n");
    mkdir($folder, 0775, true);
    foreach ($matches[1] as $k => $val) {
        if (strpos($val, $argv[1]) === false) {
            if ( ($pic = file_get_contents($argv[1] . $val)) === false ) { continue ; }
        }
        else {
            if ( ($pic = file_get_contents($val)) === false ) { continue ; }
        }
        $name = strrchr($val , '/');
        file_put_contents($folder . '/' . $name, $pic);
    }
}