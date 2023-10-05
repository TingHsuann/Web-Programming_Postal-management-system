<?php
require("../dbconnect.php");
$no=$_POST['no'];
$uaccount=$_POST["uaccount"];
$upwd=$_POST["upwd"];
$SQL="SELECT * FROM user WHERE uaccount='$uaccount' AND upwd='$upwd'";
$row=mysqli_fetch_assoc(mysqli_query($link,$SQL));
$uname=$row["uname"];
$countername = $_POST["countername"];
$count=0;
$now=date('Y-m-d', time());
foreach($no as $no)  
{  
   $SQL_update="UPDATE data SET status='已領取', address='$countername' ,collector='$uname' ,collectdate='$now' WHERE no='$no'";
   mysqli_query($link,$SQL_update);
   $count++;
}        
$SQL_datacheck="SELECT * FROM data WHERE status='已領取' AND address='$countername' AND no='$no'";
$SQL_usercheck="SELECT * FROM user WHERE uaccount='$uaccount' AND upwd='$upwd'";
$data=mysqli_fetch_assoc(mysqli_query($link,$SQL_datacheck));
$user=mysqli_fetch_assoc(mysqli_query($link,$SQL_usercheck));
if (empty($data)==true || empty($user)==true) {
   echo "<script type='text/javascript'>";
   echo "alert('領取包裹失敗');";
   echo "</script>";
   echo "<meta http-equiv='Refresh' content='0; url=counter_take.php'>"; 
  
} else {
   echo "<script type='text/javascript'>";
   echo "alert('已成功領取 $count 件包裹');";
   echo "</script>";
   echo "<meta http-equiv='Refresh' content='0; url=counter_take.php'>"; 
}
?>