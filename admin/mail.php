<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../dbconnect.php';

$unit=$_POST["unit"];
$recipient=$_POST["recipient"];
$type=$_POST["type"];
$sender=$_POST["sender"];
$trackingnumber=$_POST["trackingnumber"];
$note=$_POST["note"];
$size=$_POST["size"];


$SQL="SELECT * FROM user WHERE uname = '$recipient'";
$row=mysqli_fetch_assoc(mysqli_query($link,$SQL));
$uaccount=$row["uaccount"];

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    //$mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->Host       = 'ssl://smtp.gmail.com'; 
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'a1093357@mail.nuk.edu.tw';                     //SMTP username
    $mail->Password   = 'zxgyjsugbfjkxjdb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->CharSet='utf-8';
    //$mail->SMTPSecure = 'ssl';  

    $mail->addAddress($uaccount.'@mail.nuk.edu.tw');
    // $mail->addReplyTo('info@example.com', 'Information');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "=?utf-8?b?".base64_encode('高大郵務系統自動發送')."?=";
    if (empty($note)==true && empty($size)==true) {
        $umessage="$recipient 同學你好，你的郵件已送達<br>郵件類別：$type<br>寄件人：$sender<br>郵件編號：$trackingnumber<br>收件單位：$unit";
    } elseif (empty($note)==true) {
        $umessage="$recipient 同學你好，你的郵件已送達<br>郵件類別：$type<br>寄件人：$sender<br>郵件編號：$trackingnumber<br>收件單位：$unit<br>尺寸：$size";
    } elseif (empty($size)==true) {
        $umessage="$recipient 同學你好，你的郵件已送達<br>郵件類別：$type<br>寄件人：$sender<br>郵件編號：$trackingnumber<br>收件單位：$unit<br>備註：$note";
    } else {
        $umessage="$recipient 同學你好，你的郵件已送達<br>郵件類別：$type<br>寄件人：$sender<br>郵件編號：$trackingnumber<br>收件單位：$unit<br>尺寸：$size<br>備註：$note";
    }

    $mail->Body = $umessage;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<script type='text/javascript'>";
    echo "alert('郵件發送成功');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=admin_addmail.php'>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>