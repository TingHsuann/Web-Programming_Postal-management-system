<?php
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'nukpost');

    if(isset($_POST['updatedata']))
    {   
        $update_no = $_POST['update_no'];
        $unit=$_POST["unit"];
        $recipient=$_POST["recipient"];
        $type=$_POST["type"];
        $sender=$_POST["sender"];
        $trackingnumber=$_POST["trackingnumber"];
        $status=$_POST["status"];
        $collector=$_POST["collector"];
        $note=$_POST["note"];
        $date=$_POST["date"];
        $address=$_POST["address"];
        $size=$_POST["size"];


       
        $query="UPDATE data SET unit='$unit',recipient='$recipient',type='$type',sender='$sender',trackingnumber='$trackingnumber',status='$status',collector='$collector',note='$note',date='$date',address = '$address',size='$size' WHERE no='$update_no'";
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