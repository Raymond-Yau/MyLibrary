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
?>
<!DOCTYPE html>
<html lang="en">
<head><script src="vendor/jquery/jquery.min.js"></script>
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
                            console.log("session_prinum: "+2);
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




    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
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
<body>
<div id="delete-user-table"   class="col-md-12 order-md-1">
    <h4 class="mb-3">Delete User</h4>
    <form action="book_delete.php" method="post" class="needs-validation" novalidate="">
        <div class="mb-3">
            <label for="pID"> Personal ID </label>
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
</body>
</html>