<?php
    //如果出現already sent
    //ob_start();
    session_start();
    $link = @mysqli_connect( 
        'localhost',  // MySQL主機名稱 
        'root',       // 使用者名稱 
        '',  // 密碼
        'nukpost');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>高大郵務管理系統</title>
    <style>
      
      
    </style>
  </head>
  <body style="background-color: #F2F3F4;">
    <div class="container p-5">
        <div class="row p-5 " >
            <div class="col-12 col-md-3 mx-auto">
                <form method="post" enctype="multipart/form-data" class="pure-form" id='form' name='form'>
                    <div class="mb-3 text-center">
                        <img class="mb-3" src="img/person.svg" alt="" width="142" height="114" >
                    </div>   
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">帳號</label>
                        <input type="text" name="uaccount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">密碼</label>
                        <input type="password" name="upwd" class="form-control" id="exampleInputPassword1">
                    </div>
                    <!-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
    <?php

            if(isset($_POST["uaccount"])){//isset() 函数用于檢測變量是否已設置並且非 NULL。
                if($_POST["uaccount"]!=null){
                    $uaccount = $_POST["uaccount"];
                    $upwd = $_POST["upwd"];
                    //判斷帳號是否是user
                    $SQL="SELECT * FROM user WHERE uaccount='$uaccount' AND upwd = '$upwd' AND upermission = '使用者' ";
                    $result = mysqli_query($link, $SQL);
                    if (mysqli_num_rows($result)==1) {
                        $_SESSION["login"]="Yes";
                        while ($row = $result->fetch_assoc()) {
                            $uname = $row["uname"];
                        }
                        setcookie("USER_UNAME",$uname,time()+28800,"/");
                        header('Location:user/user_bulletin.php');
                    }else{
                        //判斷帳號是否是counter
                        $SQL="SELECT * FROM user WHERE uaccount='$uaccount' AND uPwd = '$upwd' AND upermission = '櫃台' ";
                        $result = mysqli_query($link, $SQL);
                        if (mysqli_num_rows($result)==1) {
                            $_SESSION["login"]="Yes";
                            while ($row = $result->fetch_assoc()) {
                                $uname = $row["uname"];
                            }
                            setcookie("COUNTER_UNAME",$uname,time()+28800,"/"); 
                            // setcookie("UID",$uid.time()+172800);
                            header('Location:counter/counter_take.php');
                        }else{
                            //判斷帳號是否是admin
                            $SQL="SELECT * FROM user WHERE uaccount='$uaccount' AND uPwd = '$upwd' AND upermission = '管理者' ";
                            $result = mysqli_query($link, $SQL);
                            if (mysqli_num_rows($result)==1) {
                                $_SESSION["login"]="Yes";
                                while ($row = $result->fetch_assoc()) {
                                    $uname = $row["uname"];
                                }
                                setcookie("ADMIN_UNAME",$uname,time()+28800,"/");
                                header('Location:admin/admin_addmail.php');
                            }else{
                                echo "<div class='row'>  
                                        <div class='col-10 col-md-3 mx-auto'>
                                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                            <strong>Error!</strong> 您輸入的帳號密碼是錯誤的                                            
                                            </div>
                                            </div>
                                       </div>";
                            }
                        }
                        // header('Location:Log_in_Fail.php');
                    }
                }else{
                    echo "<div class='row'>  
                    <div class='col-10 col-md-3 mx-auto'>
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Notice!</strong> 您未輸入帳號或密碼                        
                        </div>
                        </div>
                   </div>";
                }
            }else{
                echo "<div class='row'>  
                <div class='col-10 col-md-3 mx-auto'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Welcome!</strong> 歡迎登入                    
                    </div>
                    </div>
               </div>";
                
            }
        ?>
  </body>
</html>  