<?php
    include("../main_script.php");

    if ($_SESSION['cur_user'] != 'admin') {
        header("Location: main.php"); exit (1);
    }
    if ($_POST['submit'] == 'OK') {
        $conn = mysqli_connect('localhost', 'root', 'root', 'store');
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $count = $_POST['count'];
        $about = $_POST['about'];
        $img = $_POST['img'];
        $answer = mysqli_query($conn, "SELECT * FROM `goods` WHERE `code`='$code'");
        if ($answer->num_rows != 0) {
            echo "This good exist" . PHP_EOL; die (1);
        }
        $sql = "INSERT INTO `goods`(`name`, `category`, `price`, `count`, `about`, `img`) 
                VALUES ('$name','$category','$price','$count','$about','$img')";
        $answer = mysqli_query($conn, $sql);
        if (!$answer) {
            echo "Fail to add in DB" . PHP_EOL; die (1);
        }
        echo "OK" . PHP_EOL;
        header("Location: ../view/add_good.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>42 Music</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <ul class="navigation">
        <li class="nav-item"><a href="<?php
        if ($_SESSION['cur_user'])
            echo "main.php";
        else
            echo "../index.php"; ?>"><img src="../img/home.png" class="menu_img">Home</a></li>
        <li class="nav-item"><a href="modif.php"><img src="../img/login_png_81208.jpg" class="menu_img">Modify Account</a></li>
        <li class="nav-item"><a href="add_good.php"><img src="../img/images.png" class="menu_img">Add Goods</a></li>
        <li class="nav-item"><a href="change_goods.php"><img src="../img/images.png" class="menu_img">Change Goods</a></li>
        <?php
            if ($_SESSION['cur_user'] == 'admin')
                echo "<li class=\"nav-item\"><a href=\"change_goods.php\"><img src=\"../img/admin.png\" class=\"menu_img\">Admin Panel</a></li>" 
        ?>
        <li class="nav-item"><a href="../backend/logout.php"><img src="../img/logout.png" class="menu_img">Logout</a></li>
    </ul>

    <input type="checkbox" id="nav-trigger" class="nav-trigger" />
    <label for="nav-trigger"></label>
    <div class="site-wrap">
        <form class="add" action="add_good.php" method="post">
            <p class="text_login">Adding good to DataBase</p>
            <input type="text" name="name" value="" placeholder="Name">
            <select name="category">
                <option value="" disabled selected>Category</option>
                <option value="guitars">Guitars</option>
                <option value="keyboard">Keyboard</option>
                <option value="drums">Drums and Percussion</option>
                <option value="brass">Brass Instruments</option>
                <option value="micro">Microphones</option>
                <option value="park">Park Audio</option>
                <option value="access">Accessories</option>
            </select><br />
            <input type="text" name="price" value="" placeholder="Price">
            <input type="text" name="count" value="" placeholder="Count at stock"><br />
            <textarea class="about" type="text" name="about" value="" placeholder="About"></textarea><br />
            <input type="text" name="img" value="" placeholder="IMG URL" class="img_url"><br />
            <button type="submit" name="submit" value="OK">OK</button>
        </form>
    </div>

</body>
</html>