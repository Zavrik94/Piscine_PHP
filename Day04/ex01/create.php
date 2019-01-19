<?php
    session_start();
    if (!($_POST["login"] && $_POST["passwd"] && $_POST["submit"] === "OK")) {
        echo 'ERROR' . PHP_EOL; die(1);
    }
    $str = file_get_contents("../private/passwd");
    $allpass = unserialize($str);
    $_SESSION["login"] = $_POST["login"];
    $_SESSION["passwd"] = hash("whirlpool", $_POST['passwd']);
    foreach ($allpass as $val) {
        if ($_SESSION["login"] === $val["login"]) {
            echo 'ERROR' . PHP_EOL; die(1);
        }
    }
    $passwd = array("login"=>$_SESSION["login"], "passwd"=>$_SESSION["passwd"]);
    $allpass[count($allpass) + 1] = $passwd;
    $ser = serialize($allpass);
    mkdir("../private", 0744, true);
    file_put_contents("../private/passwd", $ser);
    echo "OK" . PHP_EOL;
    header("Location: index.html");