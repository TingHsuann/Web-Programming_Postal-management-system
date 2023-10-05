<?php
    session_start();
    $_SESSION["usersearch_SQL"]="SELECT * FROM data WHERE (status = '退件' OR status = '未領取') ORDER BY no DESC";;
    echo '<script> alert("Data Updated"); </script>';
    header("Location:user_search.php");
?>