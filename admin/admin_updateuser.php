<?php
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'nukpost');

    if(isset($_POST['updatedata']))
    {   
        $uid = $_POST['update_id'];
        $uaccount = $_POST['uaccount'];
        $uname = $_POST['uname'];
        $upwd = $_POST['upwd'];
        $upermission = $_POST['upermission'];

        $query = "UPDATE user SET uname='$uname', uaccount='$uaccount',upwd='$upwd', upermission='$upermission' WHERE uid='$uid'  ";
        $query_run = mysqli_query($link, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:admin_usermanager.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>