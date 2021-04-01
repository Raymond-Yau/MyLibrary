<?php
session_start();
$connection = new mysqli("localhost","root","","shop_database");

if(!empty( $_POST['delete-book-table-ID']))
{
    $delete_id=$_POST['delete-book-table-ID'];
    $delete_search="select * from book where book_id='$delete_id'";
    $delete_result = $connection->query($delete_search);
    $row=mysqli_num_rows($delete_result);
    $_SESSION['delete_result']="<script type='text/javascript'>alert( 'debug: 1');</script>";
    if($row>0)
    {
        $delete_query=" delete from book where book_id='$delete_id' ";
        $connection->query($delete_query);
        $_SESSION['delete_result'] = "<script type='text/javascript'>alert( 'Book: '+$delete_id+' is deleted successfully');</script>";
    }
    else
    {
        $_SESSION['delete_result'] = "<script type='text/javascript'>alert('Book: '+$delete_id+' No such ID found');</script>";
    }

}
header('location:Manager_book_page.php');