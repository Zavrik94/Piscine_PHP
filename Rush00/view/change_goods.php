<?php 
    include_once("../main_script.php");
    if ($_SESSION['cur_user'] != 'admin') {
        header("Location: " . ROOT . "view/main.php");
    }

    if ($_POST['submit'] == 'search') {
        $id = $_POST['id'];
        $answer = mysqli_query($conn, "SELECT * FROM `goods` WHERE `id` LIKE '%$id%'");
        $goods = array();
        while ($res = mysqli_fetch_assoc($answer)) {
            $goods[] = $res;
        }
    } else if ($_POST['submit'] == 'OK') {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $count = $_POST['count'];
        $about = $_POST['about'];
        $img = $_POST['img'];
        $sql = "UPDATE `goods`
        SET `name`='$name',`price`='$price',`count`='$count',`about`='$about',`img`='$img'
        WHERE `name` = '$name'";
        $answer = mysqli_query($conn, $sql);
        if (!$answer) {
            // Error mess
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>42 Music</title>
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/form.css">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../css/change.css">
    </head>
    <body>
        <ul class="navigation">
            <li class="nav-item"><a href=<?= ($_SESSION['cur_user']) ? "'main.php'" : "'../index.php'" ?>><img src="../img/home.png" class="menu_img">Home</a></li>
            <li class="nav-item"><a href="modif.php"><img src="../img/login_png_81208.jpg" class="menu_img">Modify Account</a></li>
            <li class="nav-item"><a href="add_good.php"><img src="../img/images.png" class="menu_img">Add Goods</a></li>
            <li class="nav-item"><a href="change_goods.php"><img src="../img/images.png" class="menu_img">Change Goods</a></li>
            <li class="nav-item"><a href="search_check.php"><img src="../img/images.png" class="menu_img">Search Check</a></li>
            <?php
                if ($_SESSION['cur_user'] == 'admin')
                    echo "<li class=\"nav-item\"><a href=\"change_goods.php\"><img src=\"../img/admin.png\" class=\"menu_img\">Admin Panel</a></li>" 
            ?>
            <li class="nav-item"><a href="../backend/logout.php"><img src="../img/logout.png" class="menu_img">Logout</a></li>
        </ul>

        <input type="checkbox" id="nav-trigger" class="nav-trigger" />
        <label for="nav-trigger"></label>
        <div class="site-wrap">
            <form class="search" action="change_goods.php" method="post">
                <p class="text_search">Changing Goods Panel</p>
                <input type="text" name="name" value="" placeholder="Name" class="search_input">
                <button type="submit" name="submit" value="search" class="search_btn">Search</button>
            </form>
            <div class="table">
                <?php if (count($goods)) { ?>
                    <table>
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>image</td>
                                <td>name</td>
                                <td>category</td>
                                <td>price</td>
                                <td>count</td>
                                <td>about</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($goods); $i++) { ?>
                                <tr class="tbodytr">
                                    <td name="id"><?= $goods[$i]['id'] ?></td>
                                    <td name="img"><img src="<?= $goods[$i]['img'] ?>"></td>
                                    <td name="name"><?= $goods[$i]['name'] ?></td>
                                    <td name="category"><?= $goods[$i]['category'] ?></td>
                                    <td name="price"><?= $goods[$i]['price'] ?></td>
                                    <td name="count"><?= $goods[$i]['count'] ?></td>
                                    <td name="about"><?= $goods[$i]['about'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
            <div class="change_form">
                <form class="add" action="change_goods.php" method="post">
                    <p class="text_login">Change good in DataBase</p>
                    <input type="text" name="name" value="" placeholder="Name" class="text_change">
                    <select name="category">
                        <option disabled selected>Choose category!</option>
                        <option>Guitars</option>
                        <option>Keyboard</option>
                        <option>Drums and Percussion</option>
                        <option>Brass Instruments</option>
                        <option>Microphones</option>
                        <option>Park Audio</option>
                        <option>Accessories</option>
                    </select><br />
                    <input type="text" name="price" value="" placeholder="Price" class="text_change">
                    <input type="text" name="count" value="" placeholder="Count at stock" class="text_change"><br />
                    <textarea class="about_change" name="about" value="" placeholder="About"></textarea><br />
                    <input type="text" name="img" value="" placeholder="IMG URL" class="img_url_change"><br />
                    <button type="submit" name="submit" value="OK">OK</button>
                    <input type="number" name="id" style="display: none">
                </form>
            </div>
        </div>
    </body>
    <script src="<?= ROOT . 'js/change_goods.js' ?>"></script>
</html>
