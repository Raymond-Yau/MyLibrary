
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>

    <script src="vendor/masonry/masonry.pkgd.js"></script>
    <link href="vendor/masonry/masonrycss.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        $(function() {
            var $container = $('#masonry');
            $container.masonry({
                itemSelector: '.box',
                gutter: 20,
                isAnimated: true,
            });
            $(".box").hover(function () {
                $container.masonry();
            });
        });

    </script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <style>

        body{
            min-width: 545px;
        }
        .book_pre{
            border-radius: 10px;
            border: #00826d 5px solid;
            margin-top: 2px;
            margin-left: 2px;
            margin-right: 2px;
            margin-bottom: 2px;
        }
        .book_pre:hover{
            background: #00a78e;

        }
        .book_borrowed{
            border-radius: 10px;
            border: #767676 5px solid;
            margin-top: 2px;
            margin-left: 2px;
            margin-right: 2px;
            margin-bottom: 2px;
        }
        .book_borrowed:hover{
            background: #999999;
        }

        .color-name{
            color: #1296DB
        }
        .color-Author{
            color: #15dba5
        }
        .color-address{
            color: #ee89e2;
        }
        .color-available{
            color: #4eda64;
        }
    </style>
</head>
<body>
<div id="img-background" style="background: #0b2e13">
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
                                        <li class="active"><a  data-hover="Booklist" href="books.php">Booklist</a></li>
                                        <li><a  data-hover="About" href="ABOUT.html">About</a></li>
                                        <li><a  data-hover="Account" href="profile.php">Account</a></li>
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
</div>

<div id="masonry" class="col-12 container-fluid" style="position: relative;left: 4%">

    <?php
    $connection = new mysqli("localhost","root","","shop_database");
    $sql = "select * from book order by available desc";
    $result=$connection->query($sql);
    $row = mysqli_fetch_assoc($result);
    $row_num = mysqli_num_rows($result);
    for ($i=1; $i<=$row_num; $i++)
    {
        if ($row['available']==1)
            echo ("<div class=\"box col-5 row w-50 pt-1 pl-1 pb-1 book_pre\">");

        else
            echo ("<div class=\"box col-5 row w-50 pt-1 pl-1 pb-1 book_borrowed\">");
        echo ("<img class=\" form-inline\" width=\"20%\" src=\"");
        echo $row['pic_path'];
        echo("\">");
        echo(" <div class=\"ml-3 form-inline\">");
        echo ("<table>
                            <tr><th>Book Name:</th><th>");
        echo $row['title'];
        echo ("</th></tr>
                            <tr><th>ID:</th><th>");
        echo $row['book_id'];
        echo ("</th></tr>
                            <tr><th>Author:</th><th>");
        echo $row['author'];
        echo ("</th></tr>
                            <tr><th>Address:</th><th>");
        echo $row['address'];
        if ($row['available']==1)
            echo ("</th></tr>
                            <tr><th>Available:</th><th>");
        else
            echo ("</th></tr>
                            <tr><th>Available:</th><th class='text-danger'>");

        if ($row['available']==1)
            echo "Available";
        else
            echo "Not before<br>".$row['expect_back_day'];

        echo ("</table>
                    </div>
                </div>");

        $row = mysqli_fetch_assoc($result);
    }
    ?>
<!--
    <div class="box col-5 row w-50 pt-1 pl-1 pb-1 book_pre">
        <img class="form-inline" width="50%" src="vendor/pics/book_pics/pic11.jpg">
        <div class="ml-3 form-inline">
            <table>
                <tr><th>Book Name:</th><th> More Than </th></tr>
                <tr><th>Book Name:</th><th> More Than </th></tr>
                <tr><th>Book Name:</th><th> More Than </th></tr>
                <tr><th>Book Name:</th><th> More Than </th></tr>
            </table>
        </div>
    </div>
    <div class="box col-5 row w-50 pt-1 pl-1 pb-1 book_pre">
        <img class="form-inline" width="50%" src="vendor/pics/book_pics/pic11.jpg">
        <div class="ml-3 form-inline">
            <table>
                <tr><th>Book Name:</th><th> More Than </th></tr>
                <tr><th>Book Name:</th><th> More Than </th></tr>
                <tr><th>Book Name:</th><th> More Than </th></tr>
                <tr><th>Book Name:</th><th> More Than </th></tr>
            </table>
        </div>
    </div>
    <div class=" box col-5 row w-50 pt-1 pl-1 pb-1 book_pre">
        <img class="form-inline" width="50%" src="vendor/pics/book_pics/pic11.jpg">
        <div class="ml-3 form-inline">
            <table>
                <tr><th>Book Name:</th><th> More Than </th></tr>
                <tr><th>Book Name:</th><th> More Than </th></tr>
                <tr><th>Book Name:</th><th> More Than </th></tr>
                <tr><th>Book Name:</th><th> More Than </th></tr>
            </table>
        </div>
    </div>-->
</div>

</div>

</body>
</html>