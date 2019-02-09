<?php
    include_once("../main_script.php");

    function fetchGood($id) {
        global $conn;
        $query = "SELECT `name`, `price` FROM `goods` WHERE `id`='$id'";
        $answer = mysqli_query($conn, $query);
        $res = mysqli_fetch_assoc($answer);
        return ($res);
    }

    function refreshCount($id, $newcount) {
        for ($i = 0; i < count($_SESSION['cart'][$i]); $i++) {
            if ($id == $_SESSION['cart'][$i]['id']) {
                if ($newcount == 0)
                    unset($_SESSION['cart'][$i]);
                else
                    $_SESSION['cart'][$i]['count'] = $newcount;
                break;
            }
        }
    }

    function submitOrder(&$err) {
        global $conn;
        $sql = "SELECT MAX(`check_number`) FROM `check`";
        $answer = mysqli_query($conn, $sql);
        $res = mysqli_fetch_assoc($answer);
        $check_num = $res['MAX(`check_number`)'] + 1;
        foreach($_SESSION['cart'] as $item) {
            if ($item['count'] > 0) {
                $item_id = $item['id'];
                $count = $item['count'];
                $user = $_SESSION['cur_user'];
                $sql = "INSERT INTO `check`(`check_number`, `good_id`, `count`, `user`) VALUES ('$check_num','$item_id','$count','$user')";
                $answer = mysqli_query($conn, $sql);
                if (!$answer) {
                    $err = 'Internal server error, please try later...';
                    return (false);
                }    
            }
        }
        return (true);
    }

    if (!$_SESSION['cur_user'])
        header("Location: login.php");
    if ($_POST['refresh']) {
        refreshCount($_POST['refresh'], $_POST['newcount']);
    } else if ($_POST['delete']) {
        refreshCount($_POST['deleteid'], 0);
    } else if ($_POST['purchase'] == 'OK') {
        $submit_err = "";
        if (!$_SESSION['cur_user']) {
            $submit_err = 'Please <a href="login.php">login</a> or <a href="create.php">register</a> to submit your order';
            $order_submited = false;
        } else {
            $order_submited = submitOrder($submit_err);
            if ($order_submited)
                unset($_SESSION['cart']);
        }
    }
    $goods = $_SESSION['cart'];

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
            <!------------------------------------------------------------------------->
            <?php
                if ($order_submited) {
                    echo "Your order has been submited.";
                } else if ($submit_err != '') {
                    echo $submit_err;
                } else if (count($goods) > 0) { ?>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Count</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total = 0;
                            for ($i = 0; $i < count($goods); $i++) {
                                if ($goods[$i]['count'] != 0) {
                                $data = fetchGood($goods[$i]['id']);
                                $total += ($data['price'] * $goods[$i]['count']);

                                ?>
                            <tr>
                                <td><?= $goods[$i]['id'] ?></td>
                                <td><?= $data['name'] ?></td>
                                <td><?= $data['price'] ?></td>
                                <td>
                                    <form method="post" action="cart.php">
                                        <input class="text_cart" type="number" name="newcount" value="<?= $goods[$i]['count'] ?>">
                                        <input type="submit" name="refresh" value="<?= $goods[$i]['id'] ?>" style="display: none;">
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="cart.php">
                                        <input type="hidden" name="deleteid" value="<?= $goods[$i]['id'] ?>">
                                        <button type="submit" name="delete" value="Delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php   }
                            } ?>
                            <tr>
                                <td columnspan="2">Total price</td>
                                <td><?= $total ?></td>
                            </tr>
                    </tbody>
                </table>
                <form method="post" action="cart.php" >
                    <button type="submit" name="purchase" value="OK">Submit Order</button>
                </form>
            <?php } else { ?>
                Your cart is empty.
            <?php } ?>
            <!----------------------------------------------------------------------->
        </div>
    
    </body>
    </html>
