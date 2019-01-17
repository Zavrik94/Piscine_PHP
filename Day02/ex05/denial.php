#!/usr/bin/php
<?php
if ($argc != 3) {
    exit (1);
}
$fd = fopen($argv[1], "r");
$csv_arr = array();

$i = 0;
if ($fd) {
    while ($arr = fgetcsv($fd, 0, ';')) {
        if ($i == 0 && !in_array($argv[2], $arr)) {
            exit (4);
        } else if ($i == 0) {
            $head = $arr;
            $index = array_search($argv[2], $arr);
        } else {
            $last_name["$arr[$index]"] = $arr[0];
            $name["$arr[$index]"] = $arr[1];
            $nickname["$arr[$index]"] = $arr[5];
            $IP["$arr[$index]"] = $arr[3];
            $mail["$arr[$index]"] = $arr[2];
        }
        $i++;
    }
}
echo "Enter your command: ";
while ($command = fgets(STDIN)) {
    substr($command, 0, -1);
    try {
        eval("$command");
    } catch (Throwable $t) {
        echo "PHP Parse error:  syntax error, unexpected T_STRING in [....]\n";
    }
    echo "Enter your command: ";
}
echo "^D" . PHP_EOL;
