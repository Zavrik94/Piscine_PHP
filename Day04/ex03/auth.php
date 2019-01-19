<?php
function auth($login, $passwd) {
    $str = file_get_contents(realpath('../private/passwd'));
    $allpass = unserialize($str);
    foreach ($allpass as $val) {
        if ($val["login"] === $login) {
            return ($val["passwd"] == hash("whirlpool", $passwd));
        }
    }
    return false;
}