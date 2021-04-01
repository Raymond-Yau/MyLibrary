<?php
session_start();
$error="";
if(isset($_POST["submit"]))
{
    if(isset($_POST["inputUsername"])&&isset($_POST["inputPassword"]))
    {
        $username=$_POST["inputUsername"];
        $password=$_POST["inputPassword"];
        $connection = new mysqli("localhost","root","","shop_database");
        //connect error codes
        if ($connection->connect_errno) {
            echo "Sorry, this website is experiencing problems.";
            echo "Error: Failed to make a MySQL connection, here is why: \n";
            echo "Errno: " . $connection->connect_errno . "\n";
            echo "Error: " . $connection->connect_error . "\n";
            exit;
        }
        $query=" select * from admin where password='$password' AND username='$username' ";
        $result=$connection->query($query);
        if(!$result)
        {
            die("mysql_error");
        }
        if(mysqli_num_rows($result)<=0)
        {
            echo ("no match founded!");
            header('location:ACCOUNT-login.php');
        }
        else
        {
            $row =mysqli_fetch_array($result,MYSQLI_ASSOC);
            $_SESSION['username']=$row["Username"];
            $_SESSION['id']=$row['ID'];
            $_SESSION['fname']=$row['Fname'];
            $_SESSION['lname']=$row['Lname'];
            $_SESSION['add']=$row['Address'];
            $_SESSION['prinum']=$row['pri'];
            if($row['pri']>=1)
                $_SESSION['pri']='';
            else
                $_SESSION['pri']='none';
            header('location: profile.php');
        }
    }
    else{
        $error .= "no valid username or password.";
    }
    $connection->close();
}

