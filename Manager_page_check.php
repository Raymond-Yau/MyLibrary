<?php
session_start();
$connection = new mysqli("localhost","root","","shop_database");
if(isset($_POST['search_select']))
    $select=$_POST['search_select'];
else $select="Whole Table";
if(isset($_POST['search_input']))
    $input=$_POST['search_input'];
else $input='';
if(isset($_POST['search_sort']))
    $sort=$_POST['search_sort'];
else $sort='';
$sql="select * from admin ";
//echo ($input);echo ($select);
if($input!='')
{
    $input=$_POST['search_input'];
    if($select=="Whole Table"||$select=="Search Through")
        $sql .= "where concat(Username,Lname,Fname,Address,pri,ID) like '%$input%'";
    if($select=="ID")
        $sql .= "where ID like '%$input%' ";
    if($select=="Username")
        $sql .= "where Username like '%$input%' ";
    if($select=="Last Name")
        $sql .= "where Lname like '%$input%' ";
    if($select=="First Name")
        $sql .= "where Fname like '%$input%' ";
    if($select=="Address")
        $sql .= "where Address like '%$input%' ";
    if($select=="privilege")
        $sql .= "where pri like '%$input%' ";
}
if($sort!='')
{
    $sql .='order by ';
    if($sort=="Username"||$sort=="Address"||$sort=="ID")
        $sql .= "$sort ";
    if($sort=="Last Name")
        $sql .= "Lname ";
    if($sort=="First Name")
        $sql .= "Fname ";
    if($sort=='Privilege')
        $sql .= 'pri ';
    $sql .= 'desc';
}
//echo($sql);
$result=$connection->query($sql);
?>
<style>
</style>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ACCOUNT Homepage - Liu Libin's Bootstrap exercise </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">
    <style type="text/css">
        #manager{
            width: 90%;
            margin: auto;
            border-radius: 80%;
        }
        .title{
            column-span: 6;
        }
        table{
            table-layout: fixed;
        }
    </style>

</head>
<body class="text-center">



<nav class="navbar navbar-expand-lg  fixed-top" style="background: rgba(38,42,47,0.81)">
    <div class="container">
        <a class="navbar-brand" href="#" style="color:#eee;font-weight: bolder"> Manage page </a>

        <button id="navbar-icon" class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
            <img class="navbar-toggler-icon navbar-toggler-icon-rotate0" src="vendor/icons/mulu1.png" alt="">
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php" style="color: #eee">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="book.php" style="color: #eee">Shop</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="ABOUT.html" style="color: #eee">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ORDERS.html" style="color: #eee">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ACCOUNT-login.php" style="color: #eee">Account</a>
                </li>
            </ul>
        </div>

    </div>
</nav>


<div class="row">
    <div class=" mt-3"  style="min-width: 1000px;">
        <form method="post">
            <div class="input-group  justify-content-center">
                <select name="search_select" style="font-size: 18px;height: 38px"
                        class="input-group-prepend form-control-sm ">
                    <option disabled="disabled" selected="selected">Search Through</option>
                    <option>Whole Table</option>
                    <option>ID</option>
                    <option>Username</option>
                    <option>Last Name</option>
                    <option>First Name</option>
                    <option>Address</option>
                    <option>Privilege</option>
                </select>
                <input name="search_input" type="text"  style="height: 38px;width: 300px" class=""
                       placeholder="&nbsp search any information" >
                <select name="search_sort" style="font-size: 18px;height: 38px"
                        class="input-group-append form-control-sm">
                    <option  disabled="disabled" selected="selected">Sorted by</option>
                    <option>ID</option>
                    <option>Username</option>
                    <option>Last Name</option>
                    <option>First Name</option>
                    <option>Address</option>
                    <option>Privilege</option>
                </select>
                <button name="search_confirm" class="btn btn-secondary ml-3" style="background-color: transparent">
                    <img  height="26px;" src="vendor/icons/search_black.png">
                </button>
            </div>
            <hr>
            <h4 class="text-muted">
                Dear <?php echo ($_SESSION['username'])?>, your privilege is
                <?php
                echo ($_SESSION['pri']);
                if($_SESSION['prinum']==2)
                    echo("KING<br> You can check and change every users and every managers' information");
                else if($_SESSION['prinum']==1)
                    echo("MANAGER<br> You can only check the users' information");
                else
                    echo ("USER<br> You only have the privilege to look the information");
                ?>
            </h4>

        </form>
            <hr>
            <table id="manager" class=" table table-hover table-bordered">
                <tr>
                    <th class="" colspan="6">
                        <h4><span style="color: #333">
                                <?php

                                if($select=="Whole Table"&&$input=="")
                                    echo ("All Users :");
                                else {
                                    echo ("<span class='text-danger'>Search Result: </span>");
                                    echo ("All User who has <span class='text-primary'>'$input'</span> in his/her ");
                                    echo ('<span class="text-success">');
                                    if($select=="Whole Table")
                                        echo ("information</span>.");
                                    else {
                                        echo($select);
                                        echo ('</span>.');
                                    }
                                }
                                ?>
                            </span></h4>
                    </th>
                </tr>
                <tr >
                    <th class="text-muted"><h5>Username</h5></th>
                    <th class="text-muted"> <h5>Personal ID</h5> </th>
                    <th><h5>First name</h5></th>
                    <th><h5>Last name</h5></th>
                    <th><h5>Address</h5></th>
                    <th><h5>Privilege</h5></th>
                </tr>
                <?php

                while($row = mysqli_fetch_assoc($result))
                {
                    echo"<tr><th class='text-muted'>";
                    echo ($row['Username']);
                    echo"</th>";
                    echo"<th class='text-muted'>";
                    echo ($row['ID']);
                    echo"</th>";
                    echo"<th>";
                    echo ($row['Fname']);
                    echo"</th>";
                    echo"<th>";
                    echo ($row['Lname']);
                    echo"</th>";
                    echo"<th>";
                    echo ($row['Address']);
                    echo"</th>";
                    if($row['pri']==2)
                        echo("<th style='color: #dc2c2a'> KING");
                    else if($row['pri']==1)
                        echo("<th style='color: #dc54bf'> MANAGER");
                    else
                        echo ("<th style='color: #18b9dc'> USER");
                    echo"</th></tr>";
                }
                ?>
            </table>
        <hr>
    </div>
</div>

</div>
<div class="mb-5" style="height: 20px"></div>
<footer  class="fixed-bottom py-3 " style="background: rgba(58,62,66,0.81)">
    <div style="border-radius" class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Liu Libin Website 2019</p>
    </div>
    <!-- /.container -->
</footer>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery/MYJQ.js"></script>
<script src="login_check.php"></script>
</body>
</html>
