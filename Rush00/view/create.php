<?php
    include_once("../main_script.php");
    include_once(ROOT . "backend/auth.php");
    if ($_SESSION['cur_user']) {
        header("Location: " . ROOT . "view/main.php");
    }

    function createAccount(&$err, $conn, $post) {
        $login = $post['login'];
        $answer = mysqli_query($conn, "SELECT * FROM `users` WHERE `login`='$login'");
        if ($answer->num_rows != 0) {
            $err = 'User with same login exists, so please, change it!';
            return ;
        }
        $passwd = hash('whirlpool', $post['passwd']);
        $mail = $post['mail'];
        $number = $post['number'];
        $sql = "INSERT INTO `users`(`login`, `passwd`, `mail`, `number`) VALUES ('$login','$passwd','$mail','$number')";
        $answer = mysqli_query($conn, $sql);
        if (!$answer) {
            $err = 'Internal server error, please try later...';
            return ;
        }
        header("Location: " . ROOT . "view/login.php");
    }
    if ($_POST) {
        if (!$_POST["login"]) {
            $err = 'Pleace, enter the login!';
        } else if (!$_POST["passwd"]) {
            $err = 'Pleace, enter the password!';
        } else if (!$_POST["mail"]) {
            $err = 'Pleace, enter the e-mail!';
        } else if (!$_POST["number"]) {
            $err = 'Pleace, enter the telephone number!';
        } else {
            createAccount($err, $conn, $_POST);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>42 Music</title>
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/form.css">
    </head>
    <body>
        <ul class="navigation">
            <li class="nav-item"><a href=<?= ($_SESSION['cur_user']) ? "'main.php'" : "'../index.php'"; ?>><img src="../img/home.png" class="menu_img">Home</a></li>
            <li class="nav-item"><a href="login.php"><img src="../img/login_png_81208.jpg" class="menu_img">Login</a></li>
            <li class="nav-item"><a href="create.php"><img src="../img/download.jpeg" class="menu_img">Create Account</a></li>
            <li class="nav-item"><a href="shop.php"><img src="../img/images.png" class="menu_img">Shop</a></li>
            <li class="nav-item"><a href="cart.php"><img src="../img/cart2.png" class="menu_img">Cart</a></li>
            <li class="nav-item"><a href="contacts.php"><img src="../img/download.png" class="menu_img">Contacts</a></li>
        </ul>

        <input type="checkbox" id="nav-trigger" class="nav-trigger" />
        <label for="nav-trigger"></label>
        <div class="site-wrap">
            <form class="login" action="create.php" method="post">
                <p class="text_login">Create Account</p>
                <input type="text" name="login" value="" placeholder="Login" autofocus><br />
                <input type="password" name="passwd" value="" placeholder="Password"><br />
                <input type="email" name="mail" value="" placeholder="E-Mail"><br />
                <input type="tel" name="number" value="" placeholder="Telephone"><br />
                <button type="submit" name="submit" value="OK">OK</button>
            </form>
            <?php if ($err) { ?>
                <script>alert('<?= $err ?>');</script>
            <?php } $err = false; ?>
        </div>
    </body>
</html>
