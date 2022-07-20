<?php

require_once "../connect_db/connect_db.php";
global $conn;

if(isset($_POST['submit'])) {
    $book_name = $_POST['book_name'];
    $price = $_POST['price'];
    $publication_date = $_POST['publication_date'];
    $quantity = $_POST['quantity'];
    $publisher_name = $_POST['publisher_name'];
    $author_name = $_POST['author_name'];
    $image = $_POST['image'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    $query = "insert into Book (book_name,price,publication_date,quantity,publisher_name,author_name,image,category,description)
values ('" . $book_name . "','" . $price . "',
        '" . $publication_date . "','" . $quantity . "','" . $publisher_name . "',
        '" . $author_name . "',
        '" . $image . "','" . $category . "','" . $description . "')";
    $result = mysqli_query($conn, $query);
        if($result)
        {
            header("location:them.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location:them.php");
    }
?>