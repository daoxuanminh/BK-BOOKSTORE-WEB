<?php
include "connect_db/connect_db.php";
global $conn;
?>


<html lang="en">

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/logincss.css">
    <script type="text/javascript" src="loginjs.js"></script>

</head>


<body>
    <form action="login.php" method="post">
        <div class="imgcontainer">
            <img style="width:200px;height:200px;" src="./img/default_avatar.png" alt="Avatar" class="avatar">
            <div><strong>Login with user</strong></strong></div>
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="user_name" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="user_pass" required>
            <?php
            if ($_POST) {
                $user_name = $_POST['user_name'];
                $user_pass = $_POST['user_pass'];
                $result = mysqli_query($conn, "SELECT * FROM customer where account='$user_name' and password='$user_pass'");
                $row = mysqli_fetch_array($result);

                if ($row) {
                    $_SESSION['user'] = $row;
                    header("Location:page1.php");
                } else {
                    echo '<p style="color: red">Tai khoan hoac mat khau khong chinh xac </p>';
                }
            }

            ?>
            <button type="submit">Login</button>
            <a href="signup.php"><button type="button">Sign up</button></a>

            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <a href="admin.php">
                <button type="button" class="cancelbtn">Login with admin</button>
            </a>
            <a href="page1.php">
                <button type="button" class="cancelbtn">Cancel</button>
            </a>
            <span class="psw"><a href="#">Forgot password?</a></span>
        </div>
    </form>
</body>

</html>