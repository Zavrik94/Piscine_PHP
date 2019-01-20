<!DOCTYPE html>
<html lang="en">
<head>
    <title>42 Music</title>
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <ul class="navigation">
        <li class="nav-item"><a href="<?php
        session_start();
        if ($_SESSION['cur_user'])
            echo "view/main.php";
        else
            echo "index.php"; ?>"><img src="img/home.png" class="menu_img">Home</a></li>
        <li class="nav-item"><a href="view/login.php"><img src="img/login_png_81208.jpg" class="menu_img">Login</a></li>
        <li class="nav-item"><a href="view/create.php"><img src="img/download.jpeg" class="menu_img">Create Account</a></li>
        <li class="nav-item"><a href="view/shop.php"><img src="img/images.png" class="menu_img">Shop</a></li>
        <li class="nav-item"><a href="view/cart.php"><img src="img/cart2.png" class="menu_img">Cart</a></li>
        <li class="nav-item"><a href="#"><img src="img/download.png" class="menu_img">Contacts</a></li>
    </ul>

    <input type="checkbox" id="nav-trigger" class="nav-trigger" />
    <label for="nav-trigger"></label>
    <div class="site-wrap">
        <?php
            foreach ($goods as $key => $val) {
                
            }
        ?>
    </div>

</body>
</html>
