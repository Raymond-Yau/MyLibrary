<?php
session_start();
//TODO: debug of checking all the forms and all session

/*for($i=0;$i<count($_SESSION);$i++){
    echo key($_SESSION).'->'.current($_SESSION).'<br>';
    next($_SESSION);}*/
/*for($i=0;$i<count($_POST);$i++){
    echo key($_POST).'->'.current($_POST).'<br>';
    next($_POST);}*/
    if(isset($_SESSION['delete_result']))
        echo ($_SESSION['delete_result']);
    if(isset($_SESSION['insert_result']))
        echo ($_SESSION['insert_result']);

    $_SESSION['delete_result']="";
    $_SESSION['insert_result']="";

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
            window.history.back();
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
        });
        $('#modal-manage').click(function () {
            $('#modal-adduser').fadeToggle(300);
            $('#modal-delete').fadeToggle(300);
            $('#alter-user-table').slideToggle(1000);
        });
        //after clicking on the manage button;
        $('#search-user-table-btn').click(function () {
            var idd=$('#alter-table-ID').val();
            //alert(idd);
            $.ajax({
                url:"manage_user.php",
                data:{id:idd},
                type:"POST",
                dataType:"TEXT",
                success: function (data) {
                    var hang = data.split("|");
                    var str = "";
                    for (var i=0; i< hang.length; i++) {
                        var lie= hang[i].split("^");
                    }
                    console.log("length of lie: "+lie.length);
                    for (var j=0; j<lie.length; j++) {
                        console.log("lie["+j+"]="+lie[j]);
                    }
                    if(lie.length==1)
                    {
                        $('#alter-table-ID').addClass("is-invalid");
                    }
                    else{
                        $('#alter-table-ID').removeClass("is-invalid");
                        $('#alter-table-ID').attr("readonly","readonly");
                        $('#search-user-table-btn').fadeToggle(0);
                        $('#alter-user-table-expand').slideToggle(1000);
                        $('#alter_id').val(lie[3]);
                        $('#alter_username').val(lie[2]);
                        $('#alter_firstName').val(lie[0]);
                        $('#alter_lastName').val(lie[1]);
                        $('#alter_address').val(lie[4]);
                        var pri_num=3-lie[5];
                        $('#alter_pri').find('option:eq(pri_num)').attr('selected','selected');
                        console.log("session_prinum: "+<?php echo $_SESSION['prinum'] ?>);
                    }

                }
            });
        });
        //after clicking on the manage button;
        $('#delete-user-table-btn').click(function () {
            var a=$("#delete-user-table-ID").val();
        });

    })
</script>
<style>
    .text-green{
        color: #3ab841;
    }
    .text-found{
        color: #4a53ec;
    }
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
                    <a class="nav-link" href="index.php" style="color: #eee">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="books.php" style="color: #eee">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php" style="color: #eee">Account</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
<div class="mt-3 mb-5 row" style="position: absolute;top: 10%">
    <div class="mt-3"  style="min-width: 1000px;">
        <form method="post">
            <div class="input-group  justify-content-center">
                <label>
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
                </label>
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
<!--         TODO: the code of modal-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content w-auto">
                    <div class="modal-body">
                        <div name="img-part">
                            <button class="float-right mr-0 close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                            <hr>
                            <button style="position: relative" id="modal-manage" type="button" class=" btn btn-default" >
                                <img src="vendor/icons/manage.png" style="width: 50px;height: 50px;"><br>
                                <span class="text-success">Manage user</span>
                            </button>
                            <button style="position: relative" id="modal-adduser" type="button" class=" btn btn-default">
                                <img src="vendor/icons/adduser.png" style="width: 50px;height: 50px;"><br>
                                <span style="color: #1296db">add user</span>
                            </button>
                            <button style="position: relative" id="modal-delete" type="button" class=" btn btn-default" >
                                <img src="vendor/icons/deleteuser.png" style="width: 50px;height: 50px;"><br>
                                <span class="text-danger">delete user</span>
                            </button>
                        </div>
                        <hr>
                        <!--                    TODO:the code of the table alter user  -->
                        <div id="alter-user-table" style="display: none"  class="col-md-12 order-md-1">
                            <h4 class="mb-3">Manage Information</h4>

                                <div class=" mb-3">
                                    <label for="ID">ID</label>
                                    <div class="input-group">
                                        <input  type="text" name="ID" class="form-control"
                                                id="alter-table-ID" placeholder="please enter the user ID" required="">
                                        <div id="alter-table-ID-invalid" class="invalid-feedback" style="width: 100%;">
                                            No such ID found
                                        </div>
                                    </div>
                                    <div class="btn btn-group-sm">
                                        <button id="search-user-table-btn"
                                                class=" btn btn-sm btn-info " onclick="">
                                            Search
                                        </button>
                                    </div>
                                </div>

                            <form action="manage_change.php" method="post" class="needs-validation" novalidate="">
                                <div style="display: none" >
                                    <label for="alter_id">
                                        ID
                                    </label>
                                    <input type="text" id="alter_id" name="alter_id" value="">
                                </div>
                                <div id="alter-user-table-expand" style="display: none">
                                    <div class=" mb-3">
                                        <label for="alter_username">Username</label>
                                        <div class="input-group">

                                            <input  type="text" name="alter_username"  class="form-control"
                                                    id="alter_username" placeholder="" required="">
                                            <div class="invalid-feedback" style="width: 100%;">
                                                Your password is required.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName">First name</label>
                                            <input name="alter_firstName" type="text" class="form-control" id="alter_firstName" placeholder=""
                                                   value="" required="">
                                            <div class="invalid-feedback">
                                                Valid first name is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6  mb-3">
                                            <label for="lastName">Last name</label>
                                            <input name="alter_lastName" type="text" class="form-control" id="alter_lastName" placeholder=""
                                                   value="" required="">
                                            <div class="invalid-feedback">
                                                Valid last name is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="address">Address</label>
                                        <input name="alter_address" type="text" class="form-control" id="alter_address" value=""
                                               placeholder="please enter an address" required="">
                                        <div class="invalid-feedback">
                                            Please enter your shopping address.
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label for="search_sort_add">Privilege</label>
                                        <?php /*echo ($_SESSION['prinum']);*/?>
                                        <select id="alter_pri" name="alter_pri" style="font-size: 18px;height: 38px"
                                                class="form-control-range form-control">
                                            <option <?php if($_SESSION['prinum']==1) echo ("disabled='disabled'");?>>KING</option>
                                            <option >MANAGER</option>
                                            <option >USER</option>
                                        </select>

                                    </div>
                                    <hr>
                                    <button id="change_info_btn" class=" mb-3 btn btn-primary btn-lg btn-block" type="submit">
                                        Click to change the information
                                    </button>
                                </div>
                            </form>


                        </div>
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
                            <form action="manage_delete.php" method="post" class="needs-validation" novalidate="">
                                <div class="mb-3">
                                    <label for="pID"> Personal ID </label>
                                    <div class="input-group">
                                        <input name="delete-user-table-ID"  type="pID" class="form-control" value=""
                                               id="delete-user-table-ID" placeholder="please enter the ID" required="">
                                        <div id="delete-table-ID-invalid" class="invalid-feedback" style="width: 100%;">
                                            No such ID found
                                        </div>
                                    </div>
                                </div>
                                <div class="btn btn-group-sm">
                                    <button id="delete-user-table-btn"
                                            class=" btn btn-sm btn-danger ">
                                        delete
                                    </button>
                                </div>
                            </form>
                        </div><!--end of the delete modal table-->

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>
        <table id="manager" class="text-center table table-hover table-bordered">
        <tr>
            <th class="" colspan="7">
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

                    $row_num=mysqli_num_rows($result);
                    $page_num=floor(($row_num+7)/8);
                    echo ("<br> <h6 class='mt-2 mb-0 d-inline-block text-found'>( $row_num record");
                    if($row_num!=1) echo ('s');
                    echo(" has been found ");
                    echo(" ) </h6>");

                    ?>
                            </span></h5>
            </th>
        </tr>

        <tr >
            <th style="width: 20px"><h6>Order</h6></th>
            <th class=""><h6>Username</h6></th>
            <th class=""> <h6>Personal ID</h6> </th>
            <th><h6>First name</h6></th>
            <th><h6>Last name</h6></th>
            <th><h6>Address</h6></th>
            <th><h6>Privilege</h6></th>
        </tr>
<!--            TODO:print out the table-->
        <?php
        $row = mysqli_fetch_assoc($result);
        $row_num = mysqli_num_rows($result);
        for ($i=1;  $i<=$row_num; $i++)
        {
            echo"<tr><th class='text-green'><h6>";
            echo ($i);
            echo"</h6></th>";
            echo"<th class='text-muted'><h6>";
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
            $row = mysqli_fetch_assoc($result);
        }
        ?>

        </table>
    </div><!-- /.modal -->
        <
</div>
    <hr>

<div class="mb-5" style="height: 20px"></div>
<footer  class="fixed-bottom py-3 " style="background: rgba(58,62,66,0.81)">
    <div style="border-radius" class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Liu Libin Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

</body>
</html>
