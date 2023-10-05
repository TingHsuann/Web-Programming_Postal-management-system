<?php
    session_start();
    $_SESSION["admin_SQL"]="SELECT * FROM data ORDER BY no DESC";
    echo '<script> alert("Data Updated"); </script>';
    header("Location:admin_mailmanager.php");
?>