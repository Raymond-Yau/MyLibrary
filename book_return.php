<?php
session_start();
$error="";
$_SESSION['insert_result']="";
$connection = new mysqli("localhost","root","","shop_database");
//connect error codes
if ($connection->connect_errno) {
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $connection->connect_errno . "\n";
    exit;
}
$book=$_POST['return_book_id'];
$query = "";

$connection = new mysqli("localhost","root","","shop_database");
//connect error codes
if ($connection->connect_errno) {
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $connection->connect_errno . "\n";
    echo "Error: " . $connection->connect_error . "\n";
    exit;
}


$query="select * from book where book_id='$book' and available='0'";
$book_result = $connection->query($query);
$row=mysqli_num_rows($book_result);
echo('row: '.$row);
if($row>0)
{
    $query="update book set available= '1' , user_id = '' where book_id = '$book'";
    echo ($query);
    $result=$connection->query($query);
    if(!$result)
    {
        echo $result;
        die("mysql_error");
    }
    else
    {
        $_SESSION['insert_result']="<script type='text/javascript'>alert('successfully return');</script>";
        header('location:Manager_book_page.php');
    }

}
else{
    $_SESSION['insert_result']="<script type='text/javascript'>alert('no this book or it has not been lended out');</script>";
    header('location:Manager_book_page.php');
}

