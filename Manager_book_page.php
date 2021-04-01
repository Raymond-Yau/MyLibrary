<?php
session_start();
//TODO: debug of checking all the forms and all session

if(isset($_SESSION['delete_result']))
    echo ($_SESSION['delete_result']);
if(isset($_SESSION['insert_result']))
    echo ($_SESSION['insert_result']);

$_SESSION['delete_result']="";
$_SESSION['insert_result']="";
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ACCOUNT Homepage - Liu Libin's Bootstrap exercise </title>

    <link href="css/style.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
            $()
        });
    </script>
    <script type="text/javascript">
        var I=0;
        $(document).ready(function () {
            function goBack(){
                window.history.back();
            }
            $('#modal-adduser').click(function () {
                $('#add-user-table').slideToggle(1000);
                $('#modal-manage').fadeToggle(300);
                $('#modal-return').fadeToggle(300);
                $('#modal-delete').fadeToggle(300);
            });
            $('#modal-delete').click(function () {
                $('#modal-adduser').fadeToggle(300);
                $('#modal-manage').fadeToggle(300);
                $('#modal-return').fadeToggle(300);
                $('#delete-user-table').slideToggle(1000);
            });
            $('#modal-manage').click(function () {
                $('#modal-adduser').fadeToggle(300);
                $('#modal-delete').fadeToggle(300);
                $('#modal-return').fadeToggle(300);
                $('#alter-user-table').slideToggle(1000);
            });
            $('#modal-return').click(function () {
                $('#modal-adduser').fadeToggle(300);
                $('#modal-delete').fadeToggle(300);
                $('#modal-manage').fadeToggle(300);
                $('#return-table').slideToggle(1000);
            });
            //after clicking on the manage button;

            //after clicking on the manage button;
            $('#delete-user-table-btn').click(function () {
                var a=$("#delete-user-table-ID").val();
            });

        })
    </script>
    <style>
        .login-box{
            background: #fff;
            border-radius: 20px;
            padding: auto;
            margin: auto;
            margin-top:100px;
            width: 450px;

        }
        .login-box:hover{
            box-shadow:10px 5px 10px 2px #2e8fb4;
        }
    </style>
    <link href="css/coming-soon.min.css" rel="stylesheet">
</head>
<body class="text-center" >
<!--<div class="overlay"></div>-->
<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="vendor/video/bg.mp4" type="video/mp4">
</video>
<div id="img-background">
    <div id="Accounthome" class="header">
        <div class="container">
            <div>
                <div class="top-header">
                    <!-- /logo -->
                    <!--top-nav---->
                    <div class="top-nav">
                        <div class="navigation">
<!--                            <div class="logo" style="z-index: 999">-->
<!--                                <h1><a href="index.php"><span>B</span>orrok</a></h1>-->
<!--                            </div>-->
                            <div class="navigation-right">
                                <span class="menu"><img src="images/menu.png" alt=" " /></span>
                                <nav class="link-effect-3" id="link-effect-3">
                                    <ul class="nav1 nav nav-wil">
                                        <li><a data-hover="Home" href="index.php">Home</a></li>
                                        <li><a  data-hover="Booklist" href="books.php">Booklist</a></li>
                                        <li><a  data-hover="About" href="ABOUT.html">About</a></li>
                                        <li class="active"><a  data-hover="Account" href="profile.php">Account</a></li>
                                    </ul>
                                </nav>
                                <!-- script-for-menu -->
                                <script>
                                    $( "span.menu" ).click(function() {
                                        $( "ul.nav1" ).slideToggle( 300, function() {
                                            // Animation complete.
                                        });
                                    });
                                </script>
                                <!-- /script-for-menu -->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /top-hedader -->
                    </div>
                </div>
            </div>
            <!-- top-hedader -->
        </div>
    </div>
    <div class="modal-dialog">
        <div class="modal-content w-auto">
            <div class="modal-body">
                <div name="img-part">
<!--                    <button class="float-right mr-0 close" data-dismiss="modal" aria-hidden="true" >&times;</button>-->
                    <hr>

                    <button style="position: relative" id="modal-manage" type="button" class=" btn btn-default" >
                        <img src="vendor/icons/alterbook.png" style="width: 50px;height: 50px;"><br>
                        <span class="text-success">Borrow Book</span>
                    </button>

                    <button style="position: relative" id="modal-adduser" type="button" class=" btn btn-default">
                        <img src="vendor/icons/addbook.png" style="width: 50px;height: 50px;"><br>
                        <span style="color: #1296db">Add Book</span>
                    </button>

                    <button style="position: relative" id="modal-delete" type="button" class=" btn btn-default" >
                        <img src="vendor/icons/deletebook.png" style="width: 50px;height: 50px;"><br>
                        <span class="text-danger">Delete Book</span>
                    </button>

                    <button style="position: relative" id="modal-return" type="button" class=" btn btn-default" >
                        <img src="vendor/icons/returnbook.png" style="width: 50px;height: 50px;"><br>
                        <span style="color: #cfdb12">Return Book</span>
                    </button>

                </div>
                <hr>
                <!--                    TODO:the code of the table lend out user  -->
                <div id="alter-user-table" style="display: none"  class="col-md-12 order-md-1">
                    <h4 class="mb-3">Manage Information</h4>
                    <form action="book_manage.php" method="post" class="needs-validation" novalidate="">
                        <div class="mb-3">
                            <label for="pID"> Book# </label>
                            <div class="input-group">
                                <input name="alter_book_id"  type="pID" class="form-control" value=""
                                       id="alter_book_id" placeholder="please enter the Book ID" required="">
                            </div><div id="delete-table-ID-invalid" class="invalid-feedback" style="width: 100%;">
                                No such ID found
                            </div>
                            <hr>
                            <input name="alter_user_id"  type="pID" class="form-control" value=""
                                   id="alter_user_id" placeholder="please enter the User ID" required="">
                            <div id="delete-table-ID-invalid" class="invalid-feedback" style="width: 100%;">
                                No such ID found
                            </div>
                        </div>
                        <div class="btn btn-group-sm">
                            <button id="alter-book-table-btn"
                                    class=" btn btn-sm btn-info ">
                                Lend Out
                            </button>
                        </div>
                    </form>
                </div>
                <!--                    TODO:the code of the table add user  -->
                <div id="add-user-table" style="display: none"  class="col-md-12 order-md-1">
                    <h4 class="mb-3">Information of New Book</h4>

                    <form action="book_add.php" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        <div class=" mb-3">
                            <label for="add_book_titile">Book Name</label>
                            <div class="input-group">

                                <input  type="text" name="add_book_titile"
                                        class="form-control" id="add_book_titile" placeholder="" required="">
                                <div class="invalid-feedback" style="width: 100%;">
                                    The book's name is required.
                                </div>
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="add_book_author">Author</label>
                            <div class="input-group">

                                <input  type="text" name="add_book_author"
                                        class="form-control" id="add_book_author" placeholder="" required="">
                                <div class="invalid-feedback" style="width: 100%;">
                                    The book's author is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="add_book_address">Address</label>
                            <input name="add_book_address" type="text" class="form-control" id="add_book_address" value=""
                                   placeholder="please enter an address" required="">
                            <div class="invalid-feedback">
                                Please enter the address of the book.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="add_book_pic">Picture</label>
                            <input class=" mb-2 btn btn-primary btn-md btn-block" type="button" onclick="javascript:$('input[name=\'add_book_pic\']').click();" value="select a picture for this book">
                            <input type="file" id="add_book_pic" name="add_book_pic" style="display: none">
                        </div>
                        <hr>
                        <button id="change_info_btn" class=" mb-3 btn btn-primary btn-lg btn-block" type="submit" value="upload">
                            Click to add a Book
                        </button>
                    </form>


                </div>
                <!--                    TODO:the code of the table delete user    -->
                <div id="delete-user-table" style="display:none "  class="col-md-12 order-md-1">
                    <h4 class="mb-3">Delete Book</h4>
                    <form action="book_delete.php" method="post" class="needs-validation" novalidate="">
                        <div class="mb-3">
                            <label for="pID"> Book# </label>
                            <div class="input-group">
                                <input name="delete-book-table-ID"  type="pID" class="form-control" value=""
                                       id="delete-book-table-ID" placeholder="please enter the ID" required="">
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

                <div id="return-table" style="display:none "  class="col-md-12 order-md-1">
                    <h4 class="mb-3">Return Book</h4>
                    <form action="book_return.php" method="post" class="needs-validation" novalidate="">
                        <div class="mb-3">
                            <label for="pID"> Book# </label>
                            <div class="input-group">
                                <input name="return_book_id"  type="pID" class="form-control" value=""
                                       id="return_book_id" placeholder="please enter the ID" required="">
                                <div id="delete-table-ID-invalid" class="invalid-feedback" style="width: 100%;">
                                    No such ID found
                                </div>
                            </div>
                        </div>
                        <div class="btn btn-group-sm">
                            <button id="delete-user-table-btn"
                                    class=" btn btn-sm btn-danger ">
                                Return
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->

</div>


<footer class="py-3 fixed-bottom" style="background: rgba(58,62,66,0.81)">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Liu Libin Website 2019</p>
    </div>
    <!-- /.container -->
</footer>
<!-- /.container -->
</footer>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery/MYJQ.js"></script>
<script src="login_check.php"></script>
</body>
</html>
