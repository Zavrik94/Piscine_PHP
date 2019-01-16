#!/usr/bin/php
<?php

function check_arr($arr) {
    if (count($arr) != 5)
        return 0;
    if (!is_numeric($arr[1]) || !is_numeric($arr[3]))
        return 0;
    if (strlen($arr[3]) != 4)
        return 0;
    return 1;
}

function check_time($arr) {
    if (count($arr) != 3)
        return 0;
    if (strlen($arr[0]) != 2 || strlen($arr[1]) != 2 || strlen($arr[2]) != 2)
        return 0;
    if (!is_numeric($arr[0]) || !is_numeric($arr[1]) || !is_numeric($arr[2]))
        return 0;
    if ($arr[0] > 23 || $arr[0] < 0)
        return 0;
    if ($arr[1] > 59 || $arr[1] < 0)
        return 0;
    if ($arr[2] > 59 || $arr[2] < 0)
        return 0;
    return 1;
}

function check_day_of_week($day) {
    $day = ucfirst($day);
    switch ($day) {
        case "Lundi" : return "Mon";
        case "Mardi" : return "Tue";
        case "Mercredi" : return "Wed";
        case "Jeudi" : return "Thu";
        case "Vendredi" : return "Fri";
        case "Samedi" : return "Sat";
        case "Dimanche" : return "Sun";
        default : return 0;
    }
}

function get_month($month) {
    $month = ucfirst($month);
    switch ($month) {
        case "Janvier" : return "Jan";
        case "Fevrier" : return "Feb";
        case "Mars" : return "Mar";
        case "Avril" : return "Apr";
        case "Mai" : return "May";
        case "Juin" : return "Jun";
        case "Juillet" : return "Jul";
        case "Aout" : return "Aug";
        case "Septembre" : return "Sep";
        case "Octobre" : return "Oct";
        case "Novembre" : return "Nov";
        case "Decembre" : return "Dec";
        default : return "";
    }
}

function get_month_int($month) {
    $month = ucfirst($month);
    switch ($month) {
        case "Janvier" : return 1;
        case "Fevrier" : return 2;
        case "Mars" : return 3;
        case "Avril" : return 4;
        case "Mai" : return 5;
        case "Juin" : return 6;
        case "Juillet" : return 7;
        case "Aout" : return 8;
        case "Septembre" : return 9;
        case "Octobre" : return 10;
        case "Novembre" : return 11;
        case "Decembre" : return 12;
        default : return 0;
    }
}

if ($argc != 2)
    exit (0);
$arr = preg_split("/\s/", $argv[1]);
if (!check_arr($arr)) {
    echo "Wrong Format" . PHP_EOL;
    exit (0);
}
$day = check_day_of_week($arr[0]);
if (!$day) {
    echo "Wrong Format" . PHP_EOL;
    exit (0);
}
$time_int = preg_split("/:/", $arr[4]);
if (!check_time($time_int)) {
    echo "Wrong Format" . PHP_EOL;
    exit (0);
}
$month = get_month_int($arr[2]);
$month_str = get_month($arr[2]);
if ($month == 0) {
    echo "Wrong Format" . PHP_EOL;
    exit (0);
}
$date = array($arr[1] + 0, $month, $arr[3] + 0);
$time = array($time_int[0] + 0, $time_int[1] + 0, $time_int[2] + 0);
/*if (!checkdate($date[1], $date[0], $date[2])) {
    echo "Wrong Format5" . PHP_EOL;
    exit (0);
}*/
date_default_timezone_set('Europe/Paris');
if ($day != strftime("%a", strtotime("$date[2]-$date[1]-$date[0]"))) {
    echo "Wrong Format" . PHP_EOL;
    exit (0);
}
$res = mktime($time[0], $time[1], $time[2], $date[1], $date[0], $date[2]);
//echo get_day_of_week(mktime(0,1,0)).PHP_EOL;
/*if (get_day_of_week($res) != check_day_of_week($arr[0])) {
    echo "Wrong Format" . PHP_EOL;
    exit (0);
}*/
if ($res > 0) {
    echo $res . PHP_EOL;
} else {
    echo "Wrong Format" . PHP_EOL;
    exit (0);
}
