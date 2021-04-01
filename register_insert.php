<?php
session_start();
$error="";
if(isset($_POST["submitBotton"]))
{
    if(isset($_POST["inputUsername"])&&isset($_POST["inputPassword"]))
    {
        $username=$_POST["inputUsername"];
        $password=$_POST["inputPassword"];
        echo ("your name is $username");
        $connection = new mysqli("localhost","root","","shop_database");
        //connect error codes
        if ($connection->connect_errno) {
            echo "Sorry, this website is experiencing problems.";
            echo "Error: Failed to make a MySQL connection, here is why: \n";
            echo "Errno: " . $connection->connect_errno . "\n";
            echo "Error: " . $connection->connect_error . "\n";
            exit;
        }


        $query = " select * from admin order by ID desc limit 1";
        $result = $connection->query($query);
        $row =mysqli_fetch_array($result,MYSQLI_ASSOC);
        echo($row["ID"]);
            //row[0] -> mysqli_num
        $id=$row["ID"]+1;
        // Fname,Lname,Username,ID,Address,password

            $query=" insert into admin value('','','$username',$id,'','$password',0,'./vendor/pics/head_pics/default.jpg'); ";
            $result=$connection->query($query);
            if(!$result)
            {
                die("mysql_error");
            }
            else
            {
                $_SESSION['username']=$_POST["inputUsername"];
                $_SESSION['id']=$id;
                $_SESSION['fname']="";
                $_SESSION['lname']="";
                $_SESSION['add']="";
                $_SESSION['prinum']=0;
                if($_SESSION['prinum']>=1)
                    $_SESSION['pri']='';
                else
                    $_SESSION['pri']='none';
                echo ("your name is $username");
                header('location: profile.php');
            }
    }
}

