<?php
    session_start();
    unset($_SESSION['cur_user']);
    unset($_SESSION['cart']);
    header('Location: ../index.php');
