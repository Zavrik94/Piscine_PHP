#!/usr/bin/php
<?php

while (true)
{
    echo "Enter a number: ";
    $answer = fgets(STDIN);
    $answer = substr($answer, 0, -1);
    if (!$answer)
        break;
    if (!is_numeric($answer)) {
        echo "'" . $answer . "' is not a number" . PHP_EOL;
    } else if ($answer % 2 == 0) {
        echo "The number $answer is even" . PHP_EOL;
    } else {
        echo "The number $answer is odd" . PHP_EOL;
    }
}