<?php
require("../dbconnect.php");
if(isset($_POST["unit"])!=false){
	date_default_timezone_set("Asia/Taipei");
	$unit=$_POST["unit"];
	$recipient=$_POST["recipient"];
	$type=$_POST["type"];
	$status=$_POST["status"];
	$sender=$_POST["sender"];
	$trackingnumber=$_POST["trackingnumber"];
	$note=$_POST["note"];
	$now=date('Y-m-d', time());
	$size=$_POST["size"];
	// 確定單位、收件人、寄件人都有填寫
	if (empty($unit)!=false || empty($recipient)!=false || empty($sender)!=false) {
		echo "<script type='text/javascript'>";
		echo "alert('請確認資料都已填寫');";
		echo "</script>";
		echo "<meta http-equiv='Refresh' content='0; url=admin_addmail.php'>";
	} else {
		$SQL="INSERT INTO data (unit, recipient, type, sender, trackingnumber, status, note, date, size) VALUES ('$unit','$recipient','$type','$sender','$trackingnumber','未領取','$note','$now','$size')";
		if(mysqli_query($link, $SQL)){
			
			echo "<form method='POST' id='form' action='mail.php'>";
        	echo "<input type='hidden' name='unit' value='$unit'/>";
			echo "<input type='hidden' name='recipient' value='$recipient'/>";
			echo "<input type='hidden' name='type' value='$type'/>";
            echo "<input type='hidden' name='sender' value='$sender'/>";
            echo "<input type='hidden' name='trackingnumber' value='$trackingnumber'/>";
			echo "<input type='hidden' name='note' value='$note'/>";
			echo "<input type='hidden' name='size' value='$size'/>";
            echo '</form>';
		} else {
			echo "<script type='text/javascript'>";
			echo "alert('資料新增失敗');";
			echo "</script>";
			echo "<meta http-equiv='Refresh' content='0; url=admin_addmail.php'>";
		}
	}
}

?>
<script type="text/javascript">
window.onload = function() {
  document.forms['form'].submit();
}
</script>