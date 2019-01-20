<?php 
	session_start();
	include ("../main_script.php");
	if ($_GET['buy']) {
		$id = $_GET['buy'];
		foreach ($_SESSION['cart'] as $key => $val) {
			if ($val['id'] == $id) {
				$_SESSION['cart'][$key]['count']++;
				$added = true;
				break ;
			}
		}
		if (!$added)
			$_SESSION['cart'][] = array('id' => $_GET['buy'], 'count' => 1);
		header("Location: about.php?id=$id");
	} else {
		$conn = mysqli_connect('localhost', 'root', 'root', 'store');
		$id = $_GET['id'];
		$answer = mysqli_query($conn, "SELECT * FROM `goods` WHERE `id`='$id'");
		if (!$answer) {
			$title =  "Can`t find this good by id";
			$find = false;
		} else {
			$find = true;
			$res = mysqli_fetch_assoc($answer);
			$title = $res['name'];
			$img = $res['img'];
			$price = $res['price'];
			$about = $res['about'];
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
	<li class="nav-item"><a href="<?php
        if ($_SESSION['cur_user'])
            echo "main.php";
        else
            echo "../index.php"; ?>"><img src="../img/home.png" class="menu_img">Home</a></li>
        <li class="nav-item"><a href="modif.php"><img src="../img/login_png_81208.jpg" class="menu_img">Modify Account</a></li>
        <li class="nav-item"><a href="shop.php"><img src="../img/images.png" class="menu_img">Shop</a></li>
        <li class="nav-item"><a href="cart.php"><img src="../img/cart2.png" class="menu_img">Cart</a></li>
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
		<form action="about.php">
			<?php if ($find) { ?>
				<p class="about_title"><?= $title ?></p>
				<img class="about_img" src="<?= $img ?>">
				<button class="about_buy" type="submit" name="buy" value="<?= $id ?>"><?= $price ?></button>
				<p class="about_about"><?= $about ?></p>;
			<?php } ?>
		</form>
    </div>

</body>
</html>