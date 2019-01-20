<?php 
    session_start();
    if ($_SESSION['cur_user'] != 'admin')
        header("Location: main.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>42 Music</title>
    <link rel="stylesheet" href="../css/menu.css">
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
                echo "<li class=\"nav-item\"><a href=\"admin.php\"><img src=\"../img/admin.png\" class=\"menu_img\">Admin Panel</a></li>" 
        ?>
        <li class="nav-item"><a href="../backend/logout.php"><img src="../img/logout.png" class="menu_img">Logout</a></li>
    </ul>

    <input type="checkbox" id="nav-trigger" class="nav-trigger" />
    <label for="nav-trigger"></label>
    <div class="site-wrap">
        
    </div>

</body>
</html>