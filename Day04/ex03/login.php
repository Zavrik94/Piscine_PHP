<?php
session_start();
include "auth.php";
if (!($_GET["login"] && $_GET["passwd"])) {
    echo 'ERROR' . PHP_EOL; die(1);
}
if (auth($_GET['login'], $_GET['passwd'])) {
    $_SESSION['loggued_on_user'] = $_GET['login'];
    echo "OK" . PHP_EOL;
} else {
    echo 'ERROR' . PHP_EOL; die(1);
}