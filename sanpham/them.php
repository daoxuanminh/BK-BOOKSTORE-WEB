<?php
include "../connect_db/connect_db.php";
global $conn;
$query = " select * from Book ";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home_index.css">
</head>
<title>View Records</title>
</head>

<body>
    <?php
    $user = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : [];
    //    $user=$_SESSION['user'];
    ?>

    <div class="menu cha" id="menu" style="margin-top:15px;height:unset ">
        <div class="page_name box_shadow"><a href="index.php">BK Book Store</a></div>
        <form action=".#" id="search">

            <input type="search" name="s" id="search_text" placeholder="Book Name or Category" style="height:unset">
        </form>
        <div class="chuc_nang box_shadow"><a href="index.php">Add sản phẩm</a></div>
        <div class="chuc_nang box_shadow"><a href="../page1.php">List sản phẩm</a></div>
        <!-- <div class="chuc_nang box_shadow"><a href="./">Giỏ Hàng</a></div> -->
        <?php
        if (isset($user['account'])) {
        ?>
            <div class="chuc_nang box_shadow"><a href="logout.php">Đăng Xuất</a></div>
        <?php } else { ?>

            <div class="chuc_nang box_shadow"><a href="login.php">Đăng Nhập</a></div>
        <?php } ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <table class="table table-bordered">
                        <tr>
                            <td> $book_id</td>
                            <td> $book_name </td>

                            <td> $publication_date </td>
                            <td> $quantity </td>
                            <td> $publisher_name </td>
                            <td> $author_name </td>
                            <td> $image </td>
                            <td> $category </td>
                            <td> $description </td>
                            <td> $price</td>

                        </tr>

                        <?php

                        while ($row = mysqli_fetch_array($result)) {
                            $book_id = $row['book_id'];
                            $book_name = $row['book_name'];
                            $price = $row['price'];
                            $publication_date = $row['publication_date'];
                            $quantity = $row['quantity'];
                            $publisher_name = $row['publisher_name'];
                            $author_name = $row['author_name'];
                            $image = $row['image'];
                            $category = $row['category'];
                            $description = $row['description'];

                        ?>
                            <tr>
                                <td><?php echo $book_id ?></td>
                                <td><?php echo $book_name ?></td>
                                <td><?php echo $publication_date ?></td>
                                <td><?php echo $quantity ?></td>
                                <td><?php echo $publisher_name ?></td>
                                <td><?php echo $author_name ?></td>
                                <td><?php echo $image ?></td>
                                <td><?php echo $category ?></td>
                                <td><?php echo substr($description, 0, 50) . "..." ?></td>
                                <td><?php echo $price ?></td>
                                <td><a href="edit.php?GetID=<?php echo $book_id ?>">Edit</a></td>
                                <!-- <td><a href="delete.php?Del=<?php echo $book_id ?>">Delete</a></td> -->
                            </tr>
                        <?php
                        }
                        ?>



                        <?php

                        // file upload.php xử lý upload file

                        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                            // Dữ liệu gửi lên server không bằng phương thức post
                            echo "Phải Post dữ liệu";
                            die;
                        }

                        // Kiểm tra có dữ liệu fileupload trong $_FILES không
                        // Nếu không có thì dừng
                        if (!isset($_FILES["fileupload"])) {
                            echo "Dữ liệu không đúng cấu trúc";
                            die;
                        }

                        // Kiểm tra dữ liệu có bị lỗi không
                        if ($_FILES["fileupload"]['error'] != 0) {
                            echo "Dữ liệu upload bị lỗi";
                            die;
                        }

                        // Đã có dữ liệu upload, thực hiện xử lý file upload

                        //Thư mục bạn sẽ lưu file upload
                        $target_dir    = "img/";
                        //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
                        $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);

                        $allowUpload   = true;

                        //Lấy phần mở rộng của file (jpg, png, ...)
                        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                        // Cỡ lớn nhất được upload (bytes)
                        $maxfilesize   = 800000;

                        ////Những loại file được phép upload
                        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


                        if (isset($_POST["submit"])) {
                            //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                            $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
                            if ($check !== false) {
                                echo "Đây là file ảnh - " . $check["mime"] . ".";
                                $allowUpload = true;
                            } else {
                                echo "Không phải file ảnh.";
                                $allowUpload = false;
                            }
                        }

                        // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
                        // Bạn có thể phát triển code để lưu thành một tên file khác
                        if (file_exists($target_file)) {
                            echo "Tên file đã tồn tại trên server, không được ghi đè";
                            $allowUpload = false;
                        }
                        // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
                        if ($_FILES["fileupload"]["size"] > $maxfilesize) {
                            echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                            $allowUpload = false;
                        }


                        // Kiểm tra kiểu file
                        if (!in_array($imageFileType, $allowtypes)) {
                            echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                            $allowUpload = false;
                        }


                        if ($allowUpload) {
                            // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                            if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
                                echo "File " . basename($_FILES["fileupload"]["name"]) .
                                    " Đã upload thành công.";

                                echo "File lưu tại " . $target_file;
                            } else {
                                echo "Có lỗi xảy ra khi upload file.";
                            }
                        } else {
                            echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>