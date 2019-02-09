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

    $conn = mysqli_connect('localhost', 'root', 'root', 'store');
    if ($_GET['submit'] == 'search'){
        $id = $_GET['number'];
        $total = 0;
        $goods = search_check($id);
        if (!$goods)
            header("Location: search_check.php");
    }
    if ($_GET['submit'] == 'submit'){
        $id = $_GET['number'];
        $query = "UPDATE `check` SET `submit`=1 WHERE `check_number`=$id";
        $answer = mysqli_query($conn, $query);
        if (!$answer)
            $err="Can`t submit";
        $goods = search_check($id);
        if (!$goods)
            header("Location: search_check.php");
    }
    $query = "SELECT DISTINCT `check_number`, `user`, `submit` FROM `check` ORDER BY `submit`";
    $answer = mysqli_query($conn, $query);
    while ($res = mysqli_fetch_assoc($answer)) {
        $checks[] = $res;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
            <title>42 Music</title>
            <link rel="stylesheet" href="../css/menu.css">
            <link rel="stylesheet" href="../css/change.css">
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

        <input type="checkbox" id="nav-trigger" class="nav-trigger" />
        <label for="nav-trigger"></label>

        <div class="site-wrap" method="get">
                    <form action="search_check.php" method="get">
                        <input type="text" name="number" value="" placeholder="Type a number of Check" class="search_check">
                        <button type="submit" name="submit" value="search" class="search_btn">Search</button>
                    </form>
                    <table style="display: inline-block;">
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
                                <td>Sumbit</td>
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
                                    <td><?= $goods[$i]['submit'] ?></td>
                                </tr>
                            <?php } ?>
                                <tr>
                                    <td columnspan="2">Total price</td>
                                    <td><?= $total ?></td>
                                </tr>
                        </tbody>
                    </table>
                    <a href="search_check.php?submit=submit&number=<?= $_GET['number']?>"><button type="submit" name="done" value="submit" class="search_btn">Submit</button></a>
                    <table class="table_scroll">
                        <thead>
                            <tr>
                                <td class="cn_tr">Check Number</td>
                                <td class="cn_us">User</td>
                            </tr>
                        </thead>
                        <tbody>
                                <?php for ($i = 0; $i < count($checks); $i++) { ?>
                                    <tr onclick="window.location='search_check.php?number=<?= $checks[$i]['check_number'] ?>&submit=search';">
                                        <td class="cn_tr" style="background-color: <?= $checks[$i]['submit']?"#D3F3C3":"#FCFBFB" ?>"><?= $checks[$i]['check_number'] ?></td>
                                        <td class="cn_us" style="background-color: <?= $checks[$i]['submit']?"#D3F3C3":"#FCFBFB" ?>"><?= $checks[$i]['user'] ?></td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>
        </div>
    </body>
</html>
