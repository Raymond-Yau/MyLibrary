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
$book=$_POST['alter_book_id'];
$user=$_POST['alter_user_id'];
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

 $time=date("Y-m-d");
echo ('<br>');
 $back_time=date('Y-m-d',strtotime("+1 month"));

$query="select * from book where book_id='$book' and available='1'";
$book_result = $connection->query($query);
$row=mysqli_num_rows($book_result);
$query1="select * from admin where ID='$user'";
$user_result = $connection->query($query1);
$row1=mysqli_num_rows($user_result);
echo('row: '.$row);
echo('row1: '.$row1.'<br>');
echo($time.' '.$back_time.' '.$user.' '.$book);
if($row>0&&$row1>0)
{
    //UPDATE book set `expect_back_day`= '2019-12-24' where book_id = '3'
    $query="update book set out_date='$time', expect_back_day='$back_time', available= '0' , user_id='$user' where book_id = '$book'";
    echo ($query);
    $result=$connection->query($query);
    if(!$result)
    {
        echo $result;
        die("mysql_error");
    }
    else
    {
        $_SESSION['insert_result']="<script type='text/javascript'>alert('successfully lended out');</script>";
        header('location:Manager_book_page.php');
    }

}
else if($row==0&&$row1==1) {
    $_SESSION['insert_result']="<script type='text/javascript'>alert('no such book ID');</script>";
    header('location: Manager_book_page.php');
}
else if($row==1&&$row1==0){
    $_SESSION['insert_result']="<script type='text/javascript'>alert('no such user ID');</script>";
    header('location: Manager_book_page.php');
}
else if($row==0&&$row==0) {
    $_SESSION['insert_result']="<script type='text/javascript'>alert('no book ID and user ID');</script>";
    header('location: Manager_book_page.php');
}

