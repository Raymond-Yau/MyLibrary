<?php
$_POST['delete-user-table-ID'] = '';
//TODO: debug of checking all the forms
/*for($i=0;$i<count($_POST);$i++){
    echo key($_POST).'->'.current($_POST).'<br>';
    next($_POST);}*/
?>
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
$result=$connection->query($sql);
?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery/jquery.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery/MYJQ.js"></script>
<script src="login_check.php"></script>
<script type="text/javascript">
    var I=0;
    $(document).ready(function () {
        function goBack(){
            window.history.back()
        }
        $('#modal-adduser').click(function () {
            $('#add-user-table').slideToggle(1000);
            $('#modal-manage').fadeToggle(300);
            $('#modal-delete').fadeToggle(300);
        });
        $('#modal-delete').click(function () {
            $('#modal-adduser').fadeToggle(300);
            $('#modal-manage').fadeToggle(300);
            $('#delete-user-table').slideToggle(1000);
        })
        $('#delete-user-table-btn').click(function () {
            var a=$("#delete-user-table-ID").val();
        })
    })
</script>
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
<body class="text-center" style="margin: auto">
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
    <div class="mt-3"  style="min-width: 1000px;">
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
        <button id="ModalButton" class="btn btn-secondary btn-sm mb-3" data-toggle="modal" data-target="#myModal">Modify the Table</button>
        <!-- 模态框（Modal） -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content w-auto">
                    <div class="modal-body">
                        <button class="float-right mr-0 close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                        <hr>
                        <button style="position: relative" id="modal-manage" type="button" class=" btn btn-default" >
                            <img src="vendor/icons/manage.png" style="width: 50px;height: 50px;"><br>
                            <span class="text-success">change user</span>
                        </button>
                        <button style="position: relative" id="modal-adduser" type="button" class=" btn btn-default">
                            <img src="vendor/icons/adduser.png" style="width: 50px;height: 50px;"><br>
                            <span style="color: #1296db">add user</span>
                        </button>
                        <button style="position: relative" id="modal-delete" type="button" class=" btn btn-default" >
                            <img src="vendor/icons/deleteuser.png" style="width: 50px;height: 50px;"><br>
                            <span class="text-danger">delete user</span>
                        </button>
                        <hr>
                        <!--                    TODO:the code of the table add user  -->
                        <div id="add-user-table" style="display: none"  class="col-md-12 order-md-1">
                            <h4 class="mb-3">Insert Information</h4>

                            <form action="manager_insert.php" method="post" class="needs-validation" novalidate="">
                                <div class=" mb-3">
                                    <label for="username">Username</label>
                                    <div class="input-group">

                                        <input  type="text" name="username"
                                                class="form-control" id="username" placeholder="" required="">
                                        <div class="invalid-feedback" style="width: 100%;">
                                            Your username is required.
                                        </div>
                                    </div>
                                </div>
                                <div class=" mb-3">
                                    <label for="password">Password</label>
                                    <div class="input-group">

                                        <input  type="password" name="password"
                                                class="form-control" id="username" placeholder="" required="">
                                        <div class="invalid-feedback" style="width: 100%;">
                                            Your password is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">First name</label>
                                        <input name="firstName" type="text" class="form-control" id="firstName" placeholder=""
                                               value="" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-6  mb-3">
                                        <label for="lastName">Last name</label>
                                        <input name="lastName" type="text" class="form-control" id="lastName" placeholder=""
                                               value="" required="">
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <input name="address" type="text" class="form-control" id="address" value=""
                                           placeholder="please enter an address" required="">
                                    <div class="invalid-feedback">
                                        Please enter your shopping address.
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label for="search_sort_add">Privilege</label>
                                    <?php /*echo ($_SESSION['prinum']);*/?>
                                    <select name="search_sort_add" style="font-size: 18px;height: 38px"
                                            class="form-control-range form-control">
                                        <option <?php if($_SESSION['prinum']==1) echo ("disabled='disabled'");?>>KING</option>
                                        <option >MANAGER</option>
                                        <option selected="selected">USER</option>
                                    </select>

                                </div>
                                <hr>
                                <button id="change_info_btn" class=" mb-3 btn btn-primary btn-lg btn-block" type="submit">
                                    Click to create a user
                                </button>
                            </form>


                        </div>
                        <!--                    TODO:the code of the table delete user    -->
                        <div id="delete-user-table" style="display:none "  class="col-md-12 order-md-1">
                            <h4 class="mb-3">Delete User</h4>
                            <form action="" method="" class="needs-validation" novalidate="">
                                <div class="mb-3">
                                    <label for="pID"> Personal ID </label>
                                    <div class="input-group">
                                        <input name="delete-user-table-ID"  type="pID" class="form-control" value=""
                                               id="delete-user-table-ID" placeholder="please enter the ID" required="">
                                    </div>
                                    <div class="btn btn-group-sm">
                                        <button onclick=" " id="delete-user-table-btn"
                                                class=" btn btn-sm btn-danger ">
                                            delete
                                        </button>
                                    </div>
                                    <?php
                                    if(!empty($_POST['delete-user-table-ID'])&&$_POST['delete-user-table-ID']!='')
                                    {
                                        $delete_id=$_POST['delete-user-table-ID'];
                                        $delete_search="select * from admin where ID='$delete_id' ";
                                        $delete_result = $connection->query($delete_search);
                                        $row=mysqli_num_rows($delete_result);
                                        if($row>0)
                                        {
                                            echo "<script type='text/javascript'>alert($delete_id+'delete successfully');</script>";
                                        }
                                        else
                                        {
                                            echo "<script type='text/javascript'>alert($delete_id+'No such ID found');</script>";
                                        }
//                                        $_POST['delete-user-table-ID']='';
                                        $_POST = array();
                                        for($i=0;$i<count($_POST);$i++){
                                            echo key($_POST).'->'.current($_POST).'<br>';
                                            next($_POST);
                                        }
                                        echo "<script></script>";
                                        $delete_bool_check = mysqli_fetch_assoc($connection->query($delete_search));
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>
            <table id="manager" class=" table table-hover table-bordered">
            <tr>
                <th class="" colspan="6">
                    <h5><span style="color: #333">
                                <?php

                                if($select=="Whole Table"&&$input=="")
                                    echo ("All Users :");
                                else {
                                    echo ("<span class='text-danger'>Search Result: </span>");
                                    echo (" All User who has <span class='text-primary'>'$input'</span> in his/her ");
                                    echo ('<span class="text-success">');
                                    if($select=="Whole Table")
                                        echo ("information</span>.");
                                    else {
                                        echo($select);
                                        echo ('</span>.');
                                    }
                                }
                                if($sort!='')
                                    echo (" <h6 class='d-inline-block'><i> ( Sorted by <span class='text-info'>$sort</span>. ) </i></h6>");
                                ?>
                            </span></h5>
                </th>
            </tr>
            <tr >
                <th class="text-muted"><h6>Username</h6></th>
                <th class="text-muted"> <h6>Personal ID</h6> </th>
                <th><h6>First name</h6></th>
                <th><h6>Last name</h6></th>
                <th><h6>Address</h6></th>
                <th><h6>Privilege</h6></th>
            </tr>
            <?php
            while($row = mysqli_fetch_assoc($result))
            {
                echo"<tr><th class='text-muted'><h6>";
                echo ($row['Username']);
                echo"</h6></th>";
                echo"<th class='text-muted'><h6>";
                echo ($row['ID']);
                echo"</h6></th>";
                echo"<th><h6>";
                echo ($row['Fname']);
                echo"</h6></th>";
                echo"<th><h6>";
                echo ($row['Lname']);
                echo"</h6></th>";
                echo"<th><h6>";
                echo ($row['Address']);
                echo"</h6></th>";
                if($row['pri']==2)
                    echo("<th style='color: #dc2c2a'><h6> KING");
                else if($row['pri']==1)
                    echo("<th style='color: #dc54bf'><h6> MANAGER");
                else
                    echo ("<th style='color: #18b9dc'><h6> USER");
                echo"</h6></th></tr>";
            }
            ?>
        </table>
    </div>

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

</body>
</html>
