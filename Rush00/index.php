<?php
include_once("main_script.php");

$conn = mysqli_connect('localhost', 'root', 'root', 'store');
$arr_type = array('guitars', 'keyboard', 'drums', 'brass', 'micro', 'park');
$category_name = array('guitars' => "Guitars", 'keyboard' => 'Keyboard', 'drums' => 'Drums and Percussion', 'brass' => 'Brass Instruments', 'micro' => 'Microphones', 'park' => 'Park Audio');
$ids = array();
$goods = array();
$i = 0;
foreach ($arr_type as $val) {
    $type = $val;
    $answer = mysqli_query($conn, "SELECT * FROM `goods` WHERE `category` = '$type' ORDER BY `price` DESC LIMIT 5 OFFSET 1 ");
    while ($res = mysqli_fetch_assoc($answer)) {
        $goods["$type"][] = $res['img'];
        $ids[$i][] = $res['id'];
    }
    $i++;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>42 Music</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/main.css">
    <script>
        function cropImage(img) {
            console.log(img.clientHeight);
            if (img.clientHeight > 200) {
                img.style.height = '200px';
                img.style.width = 'auto';
            }
            else if (img.clientWidth > 200) {
                img.style.height = 'auto';
                img.style.width = '200px';
            }
        }

        window.onload = function () {
            let images = document.getElementsByClassName("img_menu");
            for (let i = 0; i < images.length; i++) {
                cropImage(images[i]);
            }
        };

        function rotateImg(img_type, arr, href_type, id) {
            let img = document.getElementById(img_type);
            let href = document.getElementById(href_type);
            let i = 0;
            setInterval(function() {
                i >= arr.length - 1 ? i = 0 : i++;
                img.src = arr[i];
                cropImage(img);
                href.href = 'about.php?id=' + id[i];
            }, 3000);
        }
    </script>
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
        <li class="nav-item"><a href="view/contacts.php"><img src="img/download.png" class="menu_img">Contacts</a></li>
    </ul>

    <input type="checkbox" id="nav-trigger" class="nav-trigger" />
    <label for="nav-trigger"></label>
    <div class="site-wrap">
        <p class="welcome">Welcome to 42 Music Store</p>
        <div id="main">
            <?php $i = 1; ?>
            <?php foreach ($goods as $key => $val) { ?>
                <div class="main-item" id="main-item<?= $i ?>">
                    <a class="main-category" href="view/shop.php?category=<?= $key ?>"><?= $category_name[$key] ?></a>
                    <br/>
                    <a href="view/about.php?id=<?= $ids[$i - 1][0] ?>" id="main-href<?= $i ?>">
                        <img src="<?= $val[0] ?>" id="main-img<?= $i ?>" class="img_menu">
                    </a>
                    <script>
                        let arr<?= $i ?> = <?= json_encode($val); ?>;
                        let id<?= $i ?> = <?= json_encode($ids[$i - 1]); ?>;
                        rotateImg('main-img<?= $i ?>', arr<?= $i ?>, 'main-href<?= $i ?>', id<?= $i ?>);
                    </script>
                </div>
                <?php $i++; ?>
            <?php } ?>
        </div>
    </div>

</body>
</html>
