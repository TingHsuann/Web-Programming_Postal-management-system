<?php
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'nukpost');

    if(isset($_POST['deletedata']))
    {   
        $uid = $_POST['delete_id'];
        
        $uname = $_POST['uname'];
        $upwd = $_POST['upwd'];
        $upermission = $_POST['upermission'];

        $query="DELETE FROM user WHERE uid='$uid'";
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

