<html><body>
<?php
    session_start();
    if ($_GET["submit"] === "OK" && $_GET["login"] && $_GET["passwd"]) {
        $_SESSION["login"] = $_GET["login"];
        $_SESSION["passwd"] = $_GET["passwd"];
    }
?>
<form>
    Username: <input type="text" name="login" value="<?= $_SESSION["login"] ?>"/>
    <br />
    Password: <input type="password" name="passwd" value="<?= $_SESSION["passwd"] ?>"/>
    <input type="submit" name="submit" value="OK"/>
</form>
</body></html>