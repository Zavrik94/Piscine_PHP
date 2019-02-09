<?php
    include_once ("../main_script.php");
    if ($_SESSION['cur_user']) {
        header("Location: " . ROOT . "view/main.php");
    }
    include_once("../main_script.php");
    function auth($login, $passwd) {
        $conn = mysqli_connect('localhost', 'root', 'root', 'store');
        $answer = mysqli_query($conn, "SELECT * FROM `users` WHERE `login`='$login'");
        $res = mysqli_fetch_assoc($answer);
        return $res['passwd'] == hash('whirlpool',$passwd);
    }

    if ($_POST) {
        if ($_POST["login"] && $_POST["passwd"] && auth($_POST['login'], $_POST['passwd'])) {
            $_SESSION['cur_user'] = $_POST['login'];
            if ($_POST['path']) {
                header("Location:" . $_POST['path']);
            }
            else {
                header("Location: " . ROOT . "view/main.php");
            }
        } else if (!$_POST["login"]) {
            $err = 'Pleace, enter the login!';
        } else if (!$_POST["passwd"]) {
            $err = 'Pleace, enter the password!';
        } else {
            $err = 'Bad login password pair';
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
            <form class="login" action="login.php" method="post">
                <p class="text_login">Login</p>
                <input type="hidden" name="path" value="<?= $_GET['path'] ?>">
                <input type="text" name="login" value="<?= $_POST['login'] ?>" placeholder="Username" autofocus><br />
                <input type="password" name="passwd" value="" placeholder="Password"><br />
                <button type="submit" name="submit" value="OK">OK</button>
            </form>

            <?php if ($err) { ?>
                <script>alert('<?= $err ?>');</script>
            <?php } $err = false; ?>
        </div>
    </body>
</html>
