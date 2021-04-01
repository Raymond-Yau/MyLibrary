<?php
session_start();
//echo $_SESSION['id'];
if(!isset($_SESSION['id']))  {
    header("location:ACCOUNT-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #book_image{
            width: 100%;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile - Liu Libin's Bootstrap exercise </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
</head>

<body class="text-center" style="background: #F7F7F7">
<nav class="navbar navbar-expand-lg  fixed-top" style="background: rgba(38,42,47,0.81)">
    <div class="container">
        <a class="navbar-brand" href="#" style="color:#eee;font-weight: bolder">
            MANAGER :
           <?php echo ($_SESSION['username']); ?>
            's  HOMEPAGE </a>

        <button style="margin-left: 0px" id="navbar-icon" class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="true" aria-label="Toggle navigation">
            <img class="navbar-toggler-icon navbar-toggler-icon-rotate0" src="vendor/icons/mulu1.png" alt="">
        </button>

        <div class="navbar-collapse collapse " id="navbarResponsive">
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
<div class="container mt-3">
    <div class="py-5 text-center">

        <img style="border-radius: 40px"  class=" img-thumbnail d-block mx-auto mb-4" src=" <?php
        $id=(int)$_SESSION['id'];
        $connection = new mysqli("localhost","root","","shop_database");
        $query="select path from admin where ID=$id";
        $result1=$connection->query($query);
        $result=$result1->fetch_all(1);
        //        echo "<img onclick=\"window.location.href='ProfilePhoto.php'\" style=\"border-radius: 50%\"  class=\"img-thumbnail d-block mx-auto mb-4\" src=\"".$result[0]['path']."\" alt=\"\" width\"144\" height=\"144\"/> ";
        echo $result[0]['path'];
        ?>" alt="" width="144" height="144">
        <form action="uploadimage.php" method="post" enctype="multipart/form-data">
            <input type="button" onclick="javascript:$('input[name=\'pic\']').click();" class="btn btn-info btn-group-lg" value="select a profile photo">
            <input type="file" id="pic" name="pic" style="display: none">
            <input class=" btn btn-info btn-group-lg"  type="submit" value="upload">
        </form>
        <h2>Hello  <?php echo ($_SESSION['username']); ?></h2>
        <p class="lead">This is your profile page, you can look and change things in this page directly.</p>

        <h6  style="color: #e9686b;display:<?php echo $_SESSION['pri']; ?>
    " ;>
            <button onclick="window.location.href='Manager_book_page.php?'" class="btn btn-sm "  style="background: #ff6e71;color: #ffffff" >
                Manage Books
            </button>
            <button onclick="window.location.href='Manager_page.php?'" class="btn btn-sm "  style="background: #ff6e71;color: #ffffff" >
                Manage Users
            </button>
        </h6>


    </div>

    <div class="row">
        <div  class="col-md-4 order-md-2 mb-4">
            <h4 class="mb-3">
                Borrowed  Book
            </h4>
            <ul  id="profile_order" class="list-group mb-3">
                <?php
                    $connection = new mysqli("localhost","root","","shop_database");
                    $bookq="select * from book where user_id = ".$_SESSION['id'];
                    $result=$connection->query($bookq);
                    $existed=mysqli_num_rows($result);
                    if($existed==0)
                    {
                        echo ("                
                                <li class=\"list-group-item d-flex justify-content-between lh-condensed\">
                                    <div>
                                        <h6 class=\"my-0\">
                                            NO BOOK BORROWED
                                        </h6>
                                    </div>
                                    <a href=\"books.php\" class=\"text-muted\">Search</a>
                                </li>
                                ");
                    }
                    else {
                        $BookArray=mysqli_fetch_assoc($result);
                        echo ("                
                                <li class=\"list-group-item d-flex justify-content-between lh-condensed\">
                                    <div id=\"book_image\">
                                        <img class='' id=\"book_image\" src=\"
                                            
                                        ");
                        echo($BookArray['pic_path']);
                        echo ("     \">   
                                    </div>
                                 </li>
                                ");

                        echo ("                
                                <li class=\"list-group-item d-flex justify-content-between lh-condensed\">
                                    <div>
                                    <span class=\"text-muted\">
                                        ");
                        echo("Book Name : ");
                        echo (" </span>        
                                    </div>
                                    <h6 style=\"color: #1296DB\" class=\"my-0\">");
                        echo ($BookArray['title']);
                        echo("
                                     </h6>   </li>
                                ");

                        echo ("                
                                <li class=\"list-group-item d-flex justify-content-between lh-condensed\">
                                    <div>
                                    <span class=\"text-muted\">
                                        ");
                        echo("Borrowed Out Date : ");
                        echo (" </span>        
                                    </div>
                                    <h6 style=\"color: #00A78E\" class=\"my-0\">");
                        echo ($BookArray['out_date']);
                        echo("
                                     </h6>   </li>
                                ");

                        echo ("     
                                <li class=\"list-group-item d-flex justify-content-between lh-condensed\">
                                    <div>
                                    <span class=\"text-muted\">
                                        ");
                        echo("Expected Return Date : ");
                        echo (" </span>        
                                    </div>
                                    <h6 style=\"color: #A73334\" class=\"my-0\">");
                        echo ($BookArray['expect_back_day']);
                        echo("
                                     </h6>   </li>
                                ");
                    }
                ?>
            </ul>
        </div>

        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Personal information</h4>
            <form action="info_change.php" method="post" class="needs-validation" novalidate="">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input name="firstName" type="text" class="form-control" id="firstName" placeholder="please enter your first name"
                               value="<?php echo($_SESSION['fname']) ; ?>" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input name="lastName" type="text" class="form-control" id="lastName" placeholder="please enter your last name"
                               value="<?php echo($_SESSION['lname']) ; ?>" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>

                    <div class=" mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <img src="vendor/icons/lock_small.png" width="20px" height="20px">
                                </span>
                            </div>
                            <input readonly="readonly" type="text"
                                   class="form-control" id="username" placeholder="<?php echo ($_SESSION['username']); ?>" required="">
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>
                <div class="mb-3">
                    <label for="pID"> Personal ID </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                 <img src="vendor/icons/lock_small.png" width="20px" height="20px">
                            </span>
                        </div>
                        <input name="ID" readonly="readonly" type="pID" class="form-control" value="<?php echo($_SESSION['id']) ; ?>"
                               id="email" placeholder="<?php echo($_SESSION['id']) ; ?>" required="">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input name="address" type="text" class="form-control" id="address" value="<?php echo($_SESSION['add']) ; ?>"
                           placeholder="please enter an address" required="">
                    <div class="invalid-feedback">
                        Please enter your shopping address.
                    </div>
                </div>



                <hr class="mb-4">

                <div class="custom-control custom-checkbox">
                    <input onclick="check_box()" type="checkbox" class="custom-control-input" id="change-info-checkbox">
                    <label class="custom-control-label" for="change-info-checkbox">I confirm to change my Personal information</label>
                </div>
                <hr class="mb-4">

                <button id="change_info_btn" disabled="disabled" class=" btn btn-primary btn-lg btn-block" type="submit">
                    Click to change information
                </button>
                <hr>
                <a class="a" href="logout.php">logout</a>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>

<footer class="py-3 " style="background: rgba(58,62,66,0.81)">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Liu Libin Website 2019</p>
    </div>
    <!-- /.container -->
</footer>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery/MYJQ.js"></script>
<script>
    var times=0;
    function check_box() {
        var a=$("#change_info_btn");
        if(times%2===0)
            a.attr("disabled",false);
        else
            a.attr("disabled",true);
        times++;
    }
</script>
</body>
</html>
