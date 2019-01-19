<?php
    session_start();
    if (!($_POST["login"] && $_POST["oldpw"] && $_POST["newpw"] && $_POST["submit"] === "OK")) {
        echo 'ERROR' . PHP_EOL; die(1);
    }
    $str = file_get_contents("../private/passwd");
    $allpass = unserialize($str);
    foreach ($allpass as $key => $val) {
        if ($val["login"] === $_POST["login"]) {
            if ($val["passwd"] == hash("whirlpool", $_POST["oldpw"])) {
                $allpass[$key]["passwd"] = hash("whirlpool", $_POST["newpw"]);
                break ;
            } else {
                echo 'ERROR' . PHP_EOL; die(1);
            }
        }
    }
    $ser = serialize($allpass);
    mkdir("../private");
    file_put_contents("../private/passwd", $ser);
    echo "OK" . PHP_EOL;
    header("Location: index.html");