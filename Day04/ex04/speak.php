<?php
    session_start();
    if (!$_SESSION['cur_user']) {
        die(1);
    }
    if ($_POST['msg']) {
        $cur_msg = array("login" => $_SESSION['cur_user'], "time" => time(), "msg" => $_POST['msg']);
        if ( ($res = fopen('../private/chat', 'r+'))
        && flock($res, LOCK_EX) ) {
            $str = file_get_contents("../private/chat");
            $all_msg = unserialize($str);
            $all_msg[] = $cur_msg;
            $str = serialize($all_msg);
            file_put_contents('../private/chat', $str);
            flock($res, LOCK_UN);
            fclose($res);
        } else {
            header('HTTP/1.0 503 Internal Server error: Could not lock!'); die(1);
        }
    }
?>

<form action="speak.php" method="POST" style="margin: 0">
    <input type="text" name="msg" style="
        width: 100%;
        height: 33px;
        font-size: 20px;
    " />
</form>
