<?php
    session_start();
    $id=$_POST["ID"];
    $connection=new mysqli("localhost","root","","shop_database");
    if(isset($_POST['firstName']))
    {
        $fname=$_POST['firstName'];
        //echo ($fname);
        $query="update admin set Fname='$fname' where ID='$id'";
        $result=$connection->query($query);
        if(!$result) {die("error fn");}
    }
    if(isset($_POST['lastName']))
    {
        $lname=$_POST['lastName'];
        $q="update admin set Lname='$lname' where ID='$id'";
        $result=$connection->query($q);
        if(!$result) {die("error ln");}
    }
    if(isset($_POST['address']))
    {
        $add=$_POST['address'];
        $q2="update admin set Address='$add' where ID='$id'";
        $result=$connection->query($q2);
        if(!$result) {die("error add");}
    }

    $_SESSION['id']=$id;
    $_SESSION['fname']=$fname;
    $_SESSION['lname']=$lname;
    $_SESSION['add']=$add;
    header('location:profile.php');
