<?php
    $db = 'sss';

    $conn = mysqli_connect('localhost', 'root', 'root');
    $answer = mysqli_query($conn, "CREATE DATABASE IF NOT EXIST `$db`");

    shell_exec("\$HOME/MAMP/mysql/bin/mysql -u root -proot $db < store.sql");
