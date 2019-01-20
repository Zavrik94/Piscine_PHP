<?php
    include_once("../main_script.php");

    function get_for_title($title) {
        $conn = mysqli_connect('localhost', 'root', 'root', 'store');
        $title = 15 * ($title - 1);
        if (!$_GET['category']) {
            $answer = mysqli_query($conn, "SELECT * FROM `goods` LIMIT 15 OFFSET $title");
        } else {
            $category = $_GET['category'];
            $answer = mysqli_query($conn, "SELECT * FROM `goods` WHERE `category` = '$category' LIMIT 15 OFFSET $title");
        }
        $goods = array();
        while ($res = mysqli_fetch_assoc($answer)) {
            $goods[] = $res;
        }
        return $goods;
    }

    function get_title_count() {
        $conn = mysqli_connect('localhost', 'root', 'root', 'store');
        if (!$_GET['category']) {
            $answer = mysqli_query($conn, "SELECT COUNT(*) FROM `goods`");
        } else {
            $category = $_GET['category'];
            $answer = mysqli_query($conn, "SELECT COUNT(*) FROM `goods` WHERE `category` = '$category'");
        }
        $res = mysqli_fetch_assoc($answer);
        return (ceil($res['COUNT(*)']/15));
    }
    $_GET['title'] = $_GET['title'] ? $_GET['title'] : 1;
    $goods = get_for_title($_GET[title]);
    $title_count = get_title_count();
    $i = ($_GET['title'] - 2 < 1) ? 1 : $_GET['title'] - 2;
    $title_end = (($_GET['title'] + 2) > $title_count) ? $title_count : ($_GET['title'] + 2);
    if ($title_end - $i < 4) {
        if ($i == 1)
            $title_end = $title_count < 5 ? $title_count : 5;
        else {
            $i = (($title_end - 4) > 1) ? ($title_end - 4) : 1;
        }
    }
    $prev = ($_GET['title'] - 1) > 1 ? ($_GET['title'] - 1) : 1;
    $next = ($_GET['title'] + 1) < $title_count ? ($_GET['title'] + 1) : $title_count;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>42 Music</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <ul class="navigation">
        <li class="nav-item"><a href="shop.php?category=guitars"><img src="../img/login_png_81208.jpg" class="menu_img">Guitars</a></li>
        <li class="nav-item"><a href="shop.php?category=keyboard"><img src="../img/login_png_81208.jpg" class="menu_img">Keyboard</a></li>
        <li class="nav-item"><a href="shop.php?category=drums"><img src="../img/login_png_81208.jpg" class="menu_img">Drums and Percussion</a></li>
        <li class="nav-item"><a href="shop.php?category=brass"><img src="../img/login_png_81208.jpg" class="menu_img">Brass<br/> Instruments</a></li>
        <li class="nav-item"><a href="shop.php?category=micro"><img src="../img/login_png_81208.jpg" class="menu_img">Microphones</a></li>
        <li class="nav-item"><a href="shop.php?category=park"><img src="../img/login_png_81208.jpg" class="menu_img">Park Audio</a></li>
        <li class="nav-item"><a href="shop.php?category=access"><img src="../img/login_png_81208.jpg" class="menu_img">Accessories</a></li>
        <li class="nav-item"></li>
        <li class="nav-item"><a href="<?php
        session_start();
        if ($_SESSION['cur_user'])
            echo "main.php";
        else
            echo "../index.php"; ?>"><img src="../img/home.png" class="menu_img">Home</a></li>
        <li class="nav-item"><a href="modif.php"><img src="../img/login_png_81208.jpg" class="menu_img">Modify Account</a></li>
        <li class="nav-item"><a href="shop.php"><img src="../img/images.png" class="menu_img">Shop</a></li>
        <li class="nav-item"><a href="#"><img src="../img/cart2.png" class="menu_img">Cart</a></li>
        <li class="nav-item"><a href="#"><img src="../img/download.png" class="menu_img">Contacts</a></li>
        <?php
            session_start();
            if ($_SESSION['cur_user'] == 'admin')
                echo "<li class=\"nav-item\"><a href=\"change_goods.php\"><img src=\"../img/admin.png\" class=\"menu_img\">Admin Panel</a></li>" 
        ?>
        <li class="nav-item"><a href="../backend/logout.php"><img src="../img/logout.png" class="menu_img">Logout</a></li>
    </ul>

    <input type="checkbox" id="nav-trigger" class="nav-trigger" />
    <label for="nav-trigger"></label>
    <div class="site-wrap">
        <div class="header">

        </div>
        <?php if ($goods) { ?>
            <div class="grid-container">
                <?php foreach ($goods as $val) { ?>
                    <div class="grid-item">
                        <?= $val['name'] ?><br/>
                        <img src = "<?= $val['img'] ?>" class="shop_img" >
                        <a class="grid_price" href="about.php?id=<?= $val['id']?>"><?= $val['price'] ?></a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($title_count > 1) { ?>
            <div class="pagination">
                <span style="float: left;">Page <?= $_GET['title'] ?> of <?= $title_count ?></span>
                <a href="shop.php">&laquo; First</a>
                <a href='shop.php<?= $prev == 1 ? "" : "?title=" . $prev ?>'>&lsaquo; Prev</a>
                <?php for($i; $i <= $title_end; $i++) {?>
                    <?php if ($i == $_GET['title']) { ?>
                        <a href='shop.php<?= $i==1 ? "" : "?title=" . $i ?>' class="current"><?= $i ?></a>
                    <?php } else {?>
                        <a href='shop.php<?= $i==1 ? "" : "?title=" . $i ?>' class="inactive"><?= $i ?></a>
                    <?php } ?>
                <?php } ?>
                <a href='shop.php<?= $next == $title_count ? "?title=" . $title_count : "?title=" . $next ?>'>Next &rsaquo;</a>
                <a href='shop.php<?= $title_count == 1 ? "" : "?title=" . $title_count ?>'>Last &raquo;</a>
            </div>
        <?php } ?>
    </div>

</body>
</html>