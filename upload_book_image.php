<?php
//1.获取上传文件信息

$upfile=$_FILES["pic"];
//定义允许的类型
$typelist=array("image/jpeg","image/jpg","image/png","image/gif");
$path="./vendor/pics/book_pics/";//定义一个上传后的目录
//2.过滤上传文件的错误号
if($upfile["error"]>0){
    switch($upfile['error']){//获取错误信息
        case 1:
            $info="上传得文件超过了 php.ini中upload_max_filesize 选项中的最大值.";
            break;
        case 2:
            $info="上传文件大小超过了html中MAX_FILE_SIZE 选项中的最大值.";
            break;
        case 3:
            $info="文件只有部分被上传";
            break;
        case 4:
            $info="没有文件被上传.";
            break;
        case 5:
            $info="找不到临时文件夹.";
            break;
        case 6:
            $info="文件写入失败！";break;
    }die("上传文件错误,原因:".$info);
}
//3.本次上传文件大小的过滤（自己选择）
if($upfile['size']>100000){
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
        session_start();
        $id=(int)$_SESSION['id'];
        echo $id;
        //将文件名和路径存储到数据库
        $connection=new mysqli("localhost","root","","shop_database");
        //将图片的名称和路径存入数据库
        $connection->query("update admin set path='$absolutepath$newfile' where ID = $id");
        header('location: profile.php');
    }else{
        die("上传文件失败！");
    }
}else{
    die("不是一个上传文件!");
}

