<?php
    include_once("../main_script.php");

    function modifyAccount(&$err, $post, $sess) {
        global $conn;

        $login = $_SESSION['cur_user'];
        $answer = mysqli_query($conn, "SELECT * FROM `users` WHERE `login`='$login'");
        if ($answer->num_rows == 0) {
            $err = "No such user";
            return (false);
        }
        $res = mysqli_fetch_assoc($answer);

        if (hash('whirlpool', $post['oldpw']) != $res['passwd']) {
            $err = "Wrong old password!";
            return (false);
        } else {
            $newhash = hash('whirlpool', $post['newpw']);
            $sql = "UPDATE `users` SET `passwd`='$newhash' WHERE `login`='$login'";
            $answer = mysqli_query($conn, $sql);
            if (!$answer) {
                $err = "Cannot change password. Try later.";
                return (false);
            }
            return (true);
        }
    }

    if ($_POST) {
        if (!$_SESSION['cur_user']) {
            header("Location: " . ROOT . "view/create.php");
        } else if (!$_POST["oldpw"]) {
            $err = 'Pleace, enter the old password!';
        } else if (!$_POST["newpw"]) {
            $err = 'Pleace, enter the new password!';
        } else if (modifyAccount($err, $_POST, $_SESSION)) {
            header("Location: ". ROOT . "view/main.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Index</title>
    <title>42 Music</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>
<ul class="navigation">
        <li class="nav-item"><a href="<?php
        if ($_SESSION['cur_user'])
            echo "main.php";
        else
            echo "../index.php"; ?>"><img src="../img/home.png" class="menu_img">Home</a></li>
        <li class="nav-item"><a href="modif.php"><img src="../img/login_png_81208.jpg" class="menu_img">Modify Account</a></li>
        <li class="nav-item"><a href="shop.php"><img src="../img/images.png" class="menu_img">Shop</a></li>
        <li class="nav-item"><a href="cart.php"><img src="../img/cart2.png" class="menu_img">Cart</a></li>
        <li class="nav-item"><a href="contacts.php"><img src="../img/download.png" class="menu_img">Contacts</a></li>
        <?php
            if ($_SESSION['cur_user'] == 'admin')
                echo "<li class=\"nav-item\"><a href=\"change_goods.php\"><img src=\"../img/admin.png\" class=\"menu_img\">Admin Panel</a></li>" 
        ?>
        <li class="nav-item"><a href="../backend/logout.php"><img src="../img/logout.png" class="menu_img">Logout</a></li>
    </ul>
</ul>

<input type="checkbox" id="nav-trigger" class="nav-trigger" />
<label for="nav-trigger"></label>
<div class="site-wrap">
    <form class="login" action="modif.php" method="post">
        <p class="text_login">Change Password</p>
        <input type="password" name="oldpw" value="" placeholder="Old Password" autofocus><br />
        <input type="password" name="newpw" value="" placeholder="New Password"><br />
        <button type="submit" name="submit" value="OK">OK</button>
    </form>

    <?php if ($err) { ?>
        <script>alert('<?= $err ?>');</script>
    <?php } $err = false; ?>
</div>
</body>
</html>