<?php
    include ("DBDA.class.php");
    $db =new DBDA();
    $id = $_POST["id"];
    $sql = "select * from admin where id = '$id'";
    echo $db->StrQuery($sql,1);