<?php

require_once "../connect_db/connect_db.php";
global $conn;

if(isset($_POST['update']))
{
    $book_id = $_GET['ID'];
    $book_name = $_POST['book_name'];
    $price = $_POST['price'];
    $publication_date = $_POST['publication_date'];
    $quantity = $_POST['quantity'];
    $publisher_name = $_POST['publisher_name'];
    $author_name = $_POST['author_name'];
    $image = $_POST['image'];
    $category=$_POST['category'];
    $description = $_POST['description'];

    $query = " update Book set book_name = '".$book_name."',
    price='".$price."',
    publication_date='".$publication_date."',
    quantity='".$quantity."',
    publisher_name='".$publisher_name."',
    author_name='".$author_name."',
    image='".$image."',
    category='".$category."',
    description='".$description."'
    where book_id='".$book_id."'";
    $result = mysqli_query($conn,$query);
//    var_dump($query);
//    die();
//    header("location:them.php");
//publication_date='".$publication_date."',
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
//
//
?>