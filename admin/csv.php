<?php
require("../dbconnect.php");
session_start();
date_default_timezone_set("Asia/Taipei");
$nowdate = time();

$output = fopen('C:/Users/Hsuan/OneDrive - 國立高雄大學/nukpost_csv/'.$nowdate .'_nukpost_result.csv', 'w');
$rs=mysqli_query($link,$_SESSION["admin_SQL"]);
fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
$delimiter = ","; 
$schema= ['序號', '收件單位', '收件人', '到件日期', '郵件類別', '寄件人', '郵件編號', '領取狀態', '領取人', '取件地點', '領取日期', '尺寸', '備註'];
fputcsv($output, $schema, $delimiter);
while($row = mysqli_fetch_assoc($rs)) {
    $lineData = array($row['no'], $row['unit'], $row['recipient'], $row['date'], $row['type'], $row['sender'], $row['trackingnumber'], $row['status'], $row["collector"], $row["address"], $row["collectdate"], $row["size"], $row["note"]); 
    fputcsv($output, $lineData, $delimiter);
}
echo "<meta http-equiv='Refresh' content='0; url=admin_mailmanager.php'>";
?>