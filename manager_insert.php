<?php
session_start();
$error="";
$_SESSION['insert_result']="";
    if(isset($_POST["username"])&&isset($_POST["password"])
        &&isset($_POST["firstName"])&&isset($_POST["lastName"])&&isset($_POST["address"]))
    {
        $connection = new mysqli("localhost","root","","shop_database");
        //connect error codes
        if ($connection->connect_errno) {
            echo "Sorry, this website is experiencing problems.";
            echo "Error: Failed to make a MySQL connection, here is why: \n";
            echo "Errno: " . $connection->connect_errno . "\n";
            echo "Error: " . $connection->connect_error . "\n";
            exit;
        }
        $username=$_POST["username"];
        $password=$_POST["password"];
        $fname=$_POST["firstName"];
        $lname=$_POST["lastName"];
        $add=$_POST["address"];
        if($_POST['search_sort_add']=="USER"){
         $privi=0;
        }
        if($_POST['search_sort_add']=="MANAGER"){
            $privi=1;
        }
        if($_POST['search_sort_add']=="KING"){
            $privi=2;
        }
        echo ($username );
        echo ($password);
        echo ($fname);
        echo ($lname);
        echo ($add);
        echo ($privi);
        $query = " select * from admin order by ID desc limit 1";
        $result = $connection->query($query);
        $row =mysqli_fetch_array($result,MYSQLI_ASSOC);
        echo($row["ID"]);
        //row[0] -> mysqli_num
        $id=$row["ID"]+1;
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
        // Fname,Lname,Username,ID,Address,password
        echo ($fname.' '.$lname.' '.$username.' '.$id.' '.$add.' '.$password.' '.$privi);
        $query=" insert into admin value('$fname','$lname','$username',$id,'$add','$password',$privi,'./vendor/pics/head_pics/default.jpg'); ";
        $result=$connection->query($query);
        if(!$result)
        {
            die("mysql_error");
        }
        else
        {
            $_SESSION['insert_result']="<script type='text/javascript'>alert('successfully inserted ');</script>";
            header('location: Manager_page.php');
        }
}

