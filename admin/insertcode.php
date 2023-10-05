<?php

$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'nukpost');

if(isset($_POST['insertdata']))
{
   
    $uaccount = $_POST['uaccount'];
    $uname = $_POST['uname'];
    $upwd = $_POST['upwd'];
    $upermission = $_POST['upermission'];

    $query = "INSERT INTO user (`uname`,`uaccount`,`upwd`,`upermission`) VALUES ('$uname','$uaccount','$upwd','$upermission')";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: admin_usermanager.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>