<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "connect_db/connect_db.php";

    $Tong = isset($_GET['Tong']) ? $_GET['Tong'] : "";
    if ($Tong) {

        $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d');
        $date2 = date('Y-m-d', strtotime($date . " + 3 day"));


        $sql_oder_i = "insert into order_i (customer_id,purchased,shipping_status,order_date,shipping_date,sum_price)
                               values('" . $user['customer_id'] . "','ok',
       'dangship','" . $date . "','" . $date2 . "','" . $Tong . "')";
        $result = mysqli_query($conn, $sql_oder_i);
        $sql1 = "SELECT MAX(order_id) as order_id FROM order_i;";
        $order_id = mysqli_query($conn, $sql1);
        $order_id1 = mysqli_fetch_array($order_id);
        //            $id=$order_id1['order_id'];
        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
            $sql_order_book = "insert into book_order (order_id,book_id,quantity)
                values('" . $order_id1['order_id'] . "','" . $_SESSION['giohang'][$i][4] . "','" .  $_SESSION['giohang'][$i][3] . "')";
            $order_book = mysqli_query($conn, $sql_order_book);
            // echo 'Them thanh cong';
        }
        ?>
        <?php
        $_SESSION['tb'] = 1;

        unset ($_SESSION['giohang']);
        header("Location:cart.php");
        die();
    } else {
        // $_SESSION['tb'] = 0;
        header("Location:cart.php");
    }
    ?>

</body>

</html>