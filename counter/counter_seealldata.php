<?php
    session_start();
    $_SESSION["counter_SQL"]="SELECT * FROM data WHERE (status = '退件' OR status = '未領取') ORDER BY no DESC";
    echo '<script> alert("Data Updated"); </script>';
    header("Location:counter_take.php");
?>