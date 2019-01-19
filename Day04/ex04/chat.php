<?php
    session_start();
    date_default_timezone_set('Europe/Kiev');
    if (!$_SESSION['cur_user']) {
        echo '<a href="index.html" target="_blank">Login</a> before chat!'; die(1);
    }
    if ( !($file = file_get_contents('../private/chat')) ) {
        file_put_contents('../private/chat', '');
        $file = '';
    }
    $arr = unserialize($file);
    foreach ($arr as $key => $val) {
        echo date("[h:i]", $val['time']) . " <b>" . $val['login'] . "</b>: " . $val['msg'] . "<br />";
    }
