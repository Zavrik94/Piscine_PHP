<?php
    include_once("../main_script.php");

    function search_check($id) {
        $conn = mysqli_connect('localhost', 'root', 'root', 'store');
        $query = "SELECT * FROM `check` WHERE `check_number`='$id'";
        $answer = mysqli_query($conn, $query);
        if (!$answer) {
            return NULL;
        }
        while ($res = mysqli_fetch_assoc($answer)) {
            $check[] = $res;
        }
        return ($check);
    }
    function get_price_by_id($id) {
        $conn = mysqli_connect('localhost', 'root', 'root', 'store');
        $query = "SELECT `price` FROM `goods` WHERE `id`='$id'";
        $answer = mysqli_query($conn, $query);
        $answer = mysqli_fetch_assoc($answer);
        if (!$answer) {
            return NULL;
        }
        return ($answer['price']);
    }

    function get_name_by_id($id) {
        $conn = mysqli_connect('localhost', 'root', 'root', 'store');
        $query = "SELECT `name` FROM `goods` WHERE `id`='$id'";
        $answer = mysqli_query($conn, $query);
        $answer = mysqli_fetch_assoc($answer);
        if (!$answer) {
            return NULL;
        }
        return ($answer['name']);
    }

    if ($_GET['submit'] == 'search'){
        $id = $_GET['number'];
        $total = 0;
        $goods = search_check($id);
        if (!$goods)
            header("Locatio: search_check.php");
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>42 Music</title>
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/change.css">
        <link rel="stylesheet" href="../css/form.css">
    </head>
    <body>
        <ul class="navigation">
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
        <div class="site-wrap" method="get">
            <!------------------------------------------------------------------------->
                <form action="search_check.php" method="get">
                    <input type="text" name="number" value="" placeholder="Type a number of Check" class="search_check">
                    <button type="submit" name="submit" value="search" class="search_btn">Search</button>
                </form>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Check Number</td>
                            <td>Good ID</td>
                            <td>Good Name</td>
                            <td>Good Count</td>
                            <td>Price</td>
                            <td>Summ</td>
                            <td>User</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($goods); $i++) { ?>
                            <tr>
                                <td><?= $goods[$i]['id'] ?></td>
                                <td><?= $goods[$i]['check_number'] ?></td>
                                <td><?= $goods[$i]['good_id'] ?></td>
                                <td><?= get_name_by_id($goods[$i]['good_id']) ?></td>
                                <td><?= $goods[$i]['count'] ?></td>
                                <td><?= get_price_by_id($goods[$i]['good_id']) ?></td>
                                <td><?php echo get_price_by_id($goods[$i]['good_id']) * $goods[$i]['count']; $total += get_price_by_id($goods[$i]['good_id']) * $goods[$i]['count']; ?></td>
                                <td><?= $goods[$i]['user'] ?></td>
                            </tr>
                        <?php } ?>
                            <tr>
                                <td columnspan="2">Total price</td>
                                <td><?= $total ?></td>
                            </tr>
                    </tbody>
                </table>
            <!----------------------------------------------------------------------->
        </div>
    
    </body>
    </html>
