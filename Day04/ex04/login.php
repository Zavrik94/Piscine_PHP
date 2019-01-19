<?php
    session_start();
    include "auth.php";
    if (!($_POST["login"] && $_POST["passwd"])) {
        echo 'ERROR' . PHP_EOL; die(1);
    }
    if (auth($_POST['login'], $_POST['passwd'])) {
        $_SESSION['cur_user'] = $_POST['login'];
        echo "OK" . PHP_EOL;
        header("Location: chat.html");
    } else {
        echo 'ERROR' . PHP_EOL; die(1);
    }
