<!DOCTYPE HTML>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>高大郵務管理系統_領取人確認</title>
    <style>
      .navbar-nav .nav-item .nav-link.active{      
        color: #f5be11;
      }
     
    </style>
  </head>
    <body style="background-color: #F2F3F4;">
        <?php 
            $no=$_POST['no'];
            $countername = $_POST["countername"];
            if (empty($no)==true) {
                echo "<script type='text/javascript'>";
                echo "alert('未勾選郵件或包裹');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=counter_take.php'>";
            }

        ?>
                <div class="container p-5">
        <div class="row p-5 " >
            <div class="col-12 col-md-3 mx-auto">
                <form method="post" action='collectorconfirm.php' enctype="multipart/form-data" class="pure-form" id='form' name='form'>
                    <input type='hidden' name='countername' value="<?php echo $countername?>">
                    <div class="mb-3 text-center">
                        <img class="mb-3" src="../img/checkmail.svg" alt="" width="142" height="114" >
                    </div>   
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">帳號</label>
                        <input type="text" name="uaccount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">密碼</label>
                        <input type="password" name="upwd" class="form-control" id="exampleInputPassword1">
                        </div>
            <!-- // echo "<form method='POST' action='collectorconfirm.php'> "; 
            // echo "<input type='hidden' name='countername' value=$countername>";
            // echo "<table border='2'>";
            // echo "<tr>";
            // echo "<td>".'帳號： '."</td>";
            // echo "<td>".'<input type="text" name="uaccount" placeholder="請輸入你的帳號">'."</td>";
            // echo "</tr>";
            // echo "<tr>";
            // echo "<td>".'密碼： '."</td>";
            // echo "<td>".'<input type="text" name="upwd" placeholder="請輸入你的密碼">'."</td>"; -->
        <?php    
            foreach($no as $no)  
            {
                echo "<input type='hidden' name='no[]' value='$no'>";
            }
            echo "<div class='d-grid gap-2 col-5 mx-auto'>";
            echo "<button type='submit' class='btn btn-primary '>確定</button>";
            echo "</div>";
            echo "</form>";
        ?>
            
                    
               
                    </div>
                </div>
            </div>
    </body>  
</html>