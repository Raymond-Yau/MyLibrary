
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
    <style>
        #img-background {
            background: url("images/home_backgroud/bookpic4.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            min-height: 850px;
        }
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
</head>
<body class="text-center" >
<div id="img-background">
    <div id="Accounthome" class="header">
        <div class="container">
            <div>
                <div class="top-header">
                    <!-- /logo -->
                    <!--top-nav---->
                    <div class="top-nav">
                        <div class="navigation">
                            <div class="logo">
                                <h1><a href="index.php"><span>B</span>orrok</a></h1>
                            </div>
                            <div class="navigation-right">
                                <span class="menu"><img src="images/menu.png" alt=" " /></span>
                                <nav class="link-effect-3" id="link-effect-3">
                                    <ul class="nav1 nav nav-wil">
                                        <li><a data-hover="Home" href="index.php">Home</a></li>
                                        <li><a  data-hover="Booklist" href="books.php">Booklist</a></li>
                                        <li><a  data-hover="About" href="ABOUT.html">About</a></li>
                                        <li class="active"><a  data-hover="Account" href="#">Account</a></li>
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

    <div class="login-box">
        <form action="login_check.php" class="form-signin" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required="" autofocus="">

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="">

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <a href="ACCOUNT-register.html" class="mt-2 mb-3 text-muted" style="margin-top: 2px;text-decoration: underline"> register </a>
        </form>
    </div>
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
