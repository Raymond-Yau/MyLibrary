<?php
session_start();
$error="";
$_SESSION['insert_result']="";
if(isset($_POST["add_book_titile"])&&isset($_POST["add_book_author"])
    &&isset($_POST["add_book_address"]))
{
    $connection = new mysqli("localhost","root","","shop_database");
    //connect error codes
    if ($connection->connect_errno) {
        echo "Sorry, this website is experiencing problems.";
        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $connection->connect_errno . "\n";
        echo "Error: " . $connection->connect_error . "\n";
        exit;
    }

    $query = " select * from book order by book_id desc limit 1";
    $result = $connection->query($query);
    $row =mysqli_fetch_array($result,MYSQLI_ASSOC);
//    echo($row["book_id"]);
    //row[0] -> mysqli_num
    $id=$row["book_id"]+1;//获得id

    $address=$_POST["add_book_address"];
    $query = " select * from book where Address='$address'";
    $result = $connection->query($query);
    $result_row=mysqli_num_rows($result);
    echo $result_row;
    if ($result_row>0){
        die();
        header('location: Manager_book_page.php');
        $_SESSION['delete_result'] = "<script type='text/javascript'>alert( 'this address has already placed');</script>";
    }//判断位置上有没有书


    //row[0] -> mysqli_num
    $available=1;
    $title=$_POST["add_book_titile"];
    $author=$_POST["add_book_author"];


    $upfile=$_FILES["add_book_pic"];
    $typelist=array("image/jpeg","image/jpg","image/png","image/gif");
    $path="./vendor/pics/book_pics/";//定义一个上传后的目录
//2.过滤上传文件的错误号
//    if($upfile["error"]>0){
//        switch($upfile['error']){//获取错误信息
//            case 1:
//                $info="上传得文件超过了 php.ini中upload_max_filesize 选项中的最大值.";
//                break;
//            case 2:
//                $info="上传文件大小超过了html中MAX_FILE_SIZE 选项中的最大值.";
//                break;
//            case 3:
//                $info="文件只有部分被上传";
//                break;
//            case 4:
//                $info="没有文件被上传.";
//                break;
//            case 5:
//                $info="找不到临时文件夹.";
//                break;
//            case 6:
//                $info="文件写入失败！";break;
//        }die("上传文件错误,原因:".$info);
//    }
//3.本次上传文件大小的过滤（自己选择）
    if($upfile['size']>1000000){
        die("上传文件大小超出限制");
    }
//4.类型过滤
    if(!in_array($upfile["type"],$typelist)){
        die("上传文件类型非法!".$upfile["type"]);
    }
//5.上传后的文件名定义(随机获取一个文件名)
    $fileinfo=pathinfo($upfile["name"]);//解析上传文件名字
    do{
        $newfile=date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
    }while(file_exists($path.$newfile));
//6.执行文件上传
//判断是否是一个上传的文件
    if(is_uploaded_file($upfile["tmp_name"])){
        //执行文件上传(移动上传文件)
        if(move_uploaded_file($upfile["tmp_name"],$path.$newfile)){
            echo "文件上传成功!";
            echo $path.$newfile;
        }else{
            die("上传文件失败！");
        }
    }else{
        die("不是一个上传文件!");
    }
    if ($connection->connect_errno) {
        echo "Sorry, this website is experiencing problems.";
        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $connection->connect_errno . "\n";
        echo "Error: " . $connection->connect_error . "\n";
        exit;
    }
    $query=" insert into book value('$id','$title','$author','$address','1','','$path$newfile','',''); ";
    $result=$connection->query($query);
    if(!$result)
    {
        die("mysql_error");
    }
    else
    {
        $_SESSION['insert_result']="<script type='text/javascript'>alert('successfully inserted ');</script>";
        header('location: Manager_book_page.php');
    }
}

