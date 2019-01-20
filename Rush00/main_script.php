<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', 'root', 'store');
    $err = false;

    // Root path to the rush00 folder, must end with '/' character!
    define(ROOT, '/Rush00/');

    function debug($var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
