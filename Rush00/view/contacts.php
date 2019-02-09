<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>42 Music</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        table {
            margin: 0px 300px;
            padding: auto;
        }
        th {
            width: 800px;
        }
    </style>
</head>
<body>
    <ul class="navigation">
        <li class="nav-item"><a href="<?php
        if ($_SESSION['cur_user'])
            echo "main.php";
        else
            echo "../index.php"; ?>"><img src="../img/home.png" class="menu_img">Home</a></li>
        <li class="nav-item"><a href="shop.php"><img src="../img/images.png" class="menu_img">Shop</a></li>
        <li class="nav-item"><a href="cart.php"><img src="../img/cart2.png" class="menu_img">Cart</a></li>
        <li class="nav-item"><a href="contacts.php"><img src="../img/download.png" class="menu_img">Contacts</a></li>
        <?php
            if ($_SESSION['cur_user'] == 'admin')
                echo "<li class=\"nav-item\"><a href=\"change_goods.php\"><img src=\"../img/admin.png\" class=\"menu_img\">Admin Panel</a></li>" 
        ?>
        <?php
            if ($_SESSION['cur_user'])
                echo "<li class=\"nav-item\"><a href=\"../backend/logout.php\"><img src=\"../img/logout.png\" class=\"menu_img\">Logout</a></li>"
        ?>
    </ul>

    <input type="checkbox" id="nav-trigger" class="nav-trigger" />
    <label for="nav-trigger"></label>
    <div class="site-wrap">
        <table>
            <tr>
                <th>
                    <h1 style="margin: auto">Artem Zavrazhyn</h1>
                    <IMG src="https://cdn.intra.42.fr/users/azavrazh.jpg">
                    <h3 style="margin: auto">azavrazh@student.unit.ua</h3>
                    <h4 style="margin: auto">066-285-10-33</h4>
                </th>
                <th>
                    <h1 style="margin: auto">Maksym Petrunok</h1>
                    <img src="https://cdn.intra.42.fr/users/mpetruno.jpg">
                    <h3 style="margin: auto">mpetruno@student.unit.ua</h3>
                    <h4 style="margin: auto">097-172-41-62</h4>
                </th>
            </tr>

        </table>
    </div>

</body>
</html>
