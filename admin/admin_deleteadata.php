<?php
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'nukpost');

    if(isset($_POST['deletedata']))
    { 
        $delete_no=$_POST["delete_no"];
        $query="DELETE FROM data WHERE no = '$delete_no'";;
        $query_run = mysqli_query($link, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:admin_mailmanager.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>

