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
        echo "Error: " . $connection->connect_error . "\n";
        exit;
    }
    $ID=$_POST['alter_id'];
    $username=$_POST["alter_username"];
    $fname=$_POST["alter_firstName"];
    $lname=$_POST["alter_lastName"];
    $add=$_POST["alter_address"];
    $pri=$_POST["alter_pri"];
    echo($ID.' '.$username.' '.$fname.' '.$lname.' '.$add.' '.$pri);
    //UPDATE `admin` SET `Fname` = 'asd' WHERE `admin`.`ID` = 10004;
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

    if($pri=='KING') $prinum=2;
    else if($pri=='MANAGER') $prinum=1;
    else $prinum=0;
    $query="update admin set Fname='$fname',Lname='$lname',Username='$username', Address='$add',pri='$prinum' where ID = '$ID'";
    $result=$connection->query($query);
    if(!$result)
    {
        die("mysql_error");
    }
    else
    {
        $_SESSION['insert_result']="<script type='text/javascript'>alert('successfully changed ');</script>";
        header('location: Manager_page.php');
    }


