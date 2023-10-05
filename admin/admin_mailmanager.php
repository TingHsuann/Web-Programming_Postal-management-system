<?php
        session_start();
        if(isset($_POST["unit"])!=null){
            $unit=$_POST['unit'];
            $startDate=$_POST['startDate'];
            $endDate=$_POST['endDate'];
            $status=$_POST['status'];
            if (empty($unit)==false && empty($startDate)==false && empty($endDate)==false && empty($status)==false) {
                $_SESSION["admin_SQL"]="SELECT * FROM data WHERE unit = '$unit' AND status = '$status' AND (DATE BETWEEN '$startDate' AND '$endDate') ORDER BY no DESC";
               
            }elseif (empty($unit)==false && empty($startDate)==false && empty($endDate)==false) {
                $_SESSION["admin_SQL"]="SELECT * FROM data WHERE unit = '$unit' AND (DATE BETWEEN '$startDate' AND '$endDate') ORDER BY no DESC";
              
            }elseif (empty($startDate)==false && empty($endDate)==false && empty($status)==false) {
                $_SESSION["admin_SQL"]="SELECT * FROM data WHERE status = '$status' AND (DATE BETWEEN '$startDate' AND '$endDate') ORDER BY no DESC";
               
            }elseif (empty($unit)==false && empty($status)==false) {
                $_SESSION["admin_SQL"]="SELECT * FROM data WHERE unit = '$unit' AND status = '$status' ORDER BY no DESC";
                
            }elseif (empty($status)==false){
                $_SESSION["admin_SQL"]="SELECT * FROM data WHERE status = '$status'ORDER BY no DESC";
                
                
            }elseif (empty($unit)==false) {
                $_SESSION["admin_SQL"]="SELECT * FROM data WHERE unit = '$unit' ORDER BY no DESC";
               
            }elseif (empty($startDate)==false && empty($endDate)==false){
                $_SESSION["admin_SQL"]="SELECT * FROM data WHERE DATE BETWEEN '$startDate' AND '$endDate' ORDER BY no DESC";
                
            }
            
            echo "</br></br></br>";
            echo "<form method='POST' action='csv.php'>";
            echo "<input type='hidden' name='unit' value='$unit'>";
            echo "<input type='hidden' name='startDate' value='$startDate'>";
            echo "<input type='hidden' name='endDate' value='$endDate'>";
            echo "<input type='hidden' name='status' value='$status'>";
            ?>
            <div class="container">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">            
                <button type="submit" name="" class="btn btn-secondary col-md- ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
</svg>
                    將目前表格下載成CSV檔</button>
            </div>
            </div>
        <?php            
            echo '</form>';
        }
        
        if(empty($_SESSION["admin_SQL"])==true){
            $_SESSION["admin_SQL"]="SELECT * FROM data ORDER BY no DESC";
        }
        
      
      
      
    ?>
<!doctype html>
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
    <title>高大郵務管理系統</title>
    <style>
      .navbar-nav .nav-item .nav-link.active{      
        color: #f5be11;
      }
     
    </style>
  </head>
  <body>
      <?php

     
      ?>
        
    <!-- Optional JavaScript; choose one of the two! -->
    <div class="container">
  <div class="row">  
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="admin_addmail.php">
        <img src="../img/logo.png" alt="" width="32" height="32" class="d-inline-block align-text-top"> 
          高大郵務管理系統
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="admin_addmail.php" >新增郵件</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin_mailmanager.php">郵件管理</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_usermanager.php">使用者管理</a>
          </li>
        </ul>
        
        <ul class="navbar-nav ">
        <hr class="d-md-none text-white-50">
        <li class="nav-item">
          <a class="nav-link ">
              <b></b>
          <?php
                if(isset($_COOKIE["ADMIN_UNAME"])){
                    $admin_cookie = $_COOKIE["ADMIN_UNAME"];
                    echo "<b>管理者</b>&nbsp".$admin_cookie;
                }
            ?>
            </a>
          </li>
          
          
          <li class="nav-item">
        <a class="btn btn-outline-info"  style="text-decoration: none; color:white; " data-bs-toggle="modal" data-bs-target="#exampleModal">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"></path>
            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"></path>
          </svg>   
          &nbsp Sign out
        </a>
        </li>
        </ul>
      </div>
    </div>
  </nav>
  </div>
</div>
 <!-- Modal with sign out-->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">即將登出</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            您確定要登出嗎?
          </div>
          <div class="modal-footer">
            <a  class="btn btn-secondary" href="user_bulletin.php"> 取消</a>
            <a class="btn btn-primary" href="../nukmailer.php">登出</a>
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" herf="nukmailer.php">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>  
   <p></br></br></br></p>


    
    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>修改使用者資料</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    
                </div>

                <form action="admin_updatedata.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_no" id="update_no">

                        <div class="form-group">
                            <label for="inputState" class="form-label"><b>收件單位</b></label>
                            <select id="unit" name="unit" class="form-select">
                            <option value="學生宿舍一">學生宿舍一</option>
                            <option value="學生宿舍二">學生宿舍二</option>
                            <option value="綜合宿舍">綜合宿舍</option>
                            <option value="校長室">校長室</option>
                            <option value="學術副校長室">學術副校長室</option>
                            <option value="行政副校長室">行政副校長室</option>
                            <option value="教務處">教務處</option>
                            <option value="研究發展處">研究發展處</option>
                            <option value="國際事務處">國際事務處</option>
                            <option value="主計室">主計室</option>
                            <option value="推廣教育中心">推廣教育中心</option>
                            <option value="人事室">人事室</option>
                            <option value="環境安全衛生中心">環境安全衛生中心</option>
                            <option value="體育室">體育室</option>
                            <option value="秘書室">秘書室</option>
                            <option value="學務處">學務處</option>
                            <option value="總務處">總務處</option>
                            <option value="圖資資訊館">圖資資訊館</option>
                            <option value="教學發展中心">教學發展中心</option>   
                            </select>
                        </div>

                        <div class="form-group ">
                            <label><b>收件人</b></label>
                            <input type="text" name="recipient" id="recipient" class="form-control" placeholder="請輸入收件人">
                        </div>

                        <div class="form-group">
                            <label><b>收件日期</b></label>
                            <input type="date" name="date" id="date" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label><b>寄件人</b></label>
                            <input type="text" name="sender" id="sender" class="form-control" placeholder="請輸入寄件人">
                        </div>

                        <div class="form-group">
                            <label for="inputState" class="form-label"><b>領取狀態</b></label>
                            <select id="status" name="status" class="form-select">
                                <option value="已領取" >已領取</option>
                                <option value="未領取">未領取</option>
                                <option value="退件">退件</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><b>收件日期</b></label>
                            <input type="date" name="collectdate" id="collectdate" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label><b>領取人</b></label>
                            <input type="text" name="collector" id="collector" class="form-control" placeholder="尚未有領取人" >
                        </div>

                        <div class="form-group">
                            <label><b>領取地點</b></label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="尚未有領取地點" >
                        </div>

                        <div class="form-group">
                            <label><b>郵件編號</b></label>
                            <input type="text" name="trackingnumber" id="trackingnumber" class="form-control" placeholder="請輸入郵件編號">
                        </div>

                        <div class="form-group">
                            <label for="inputState" class="form-label"><b>郵件類別</b></label>
                            <select id="type" name="type" class="form-select">
                                <option value="信件" >信件</option>
                                <option value="包裹">包裹</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><b> 尺寸</b></label>
                            <input type="text" name="size" id="size" class="form-control" placeholder="請輸入尺寸">
                        </div>
                        <div class="form-group">
                            <label><b>備註</b></label>
                            <input type="text" name="note" id="note" class="form-control" placeholder="可填寫備註">
                        </div>
                        

                        
                    </div>
                    <div class="modal-footer">
                        <a  class="btn btn-secondary" href="admin_usermanager.php"> 取消</a>                     
                        <button type="submit" name="updatedata" class="btn btn-primary">修改</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

<!-- DELETE POP UP FORM (Bootstrap MODAL) -->    
    <div class="modal" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <b>刪除郵件資料</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    
                </div>
                <form action="admin_deleteadata.php" method="POST">
                    <div class="modal-body">                        
                        <h4></h4>
                        <p>您確認要刪除此郵件嗎?</p>
                        <input type="hidden" name="delete_no" id="delete_no">                      
                    </div>
                    
                    <div class="modal-footer">
                        <a  class="btn btn-secondary" href="admin_mailmanager.php"> 取消</a>                     
                        <button type="submit" name="deletedata" class="btn btn-primary">刪除</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
    <!-- <search> -->
    <div class="container">
    
        <div class="card text-dark bg-light mb-3" style="width: 100%;">
            <div class="card-header" style="color:darkgoldenrod">
                <p></p>
             <h5><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>&nbsp <b>依下方條件篩選</b>
            </h5>
            </div>
            
            <div class="card-body">
            <div class="container col-md-12 ">
                <form class="row g-3 needs-validation" action="admin_mailmanager.php" method="POST" novalidate>                              
                   
                    <div class="col-md-3">
                        <label for="inputState" class="form-label"><b>收件單位</b></label>
                        <select id="unit" name ="unit"class="form-select">        
                            <option value="" selected disable hidden>請選擇收件單位</option>
                            <option value="學生宿舍一">學生宿舍一</option>
                            <option value="學生宿舍二">學生宿舍二</option>
                            <option value="綜合宿舍">綜合宿舍</option>
                            <option value="校長室">校長室</option>
                            <option value="學術副校長室">學術副校長室</option>
                            <option value="行政副校長室">行政副校長室</option>
                            <option value="教務處">教務處</option>
                            <option value="研究發展處">研究發展處</option>
                            <option value="國際事務處">國際事務處</option>
                            <option value="主計室">主計室</option>
                            <option value="推廣教育中心">推廣教育中心</option>
                            <option value="人事室">人事室</option>
                            <option value="環境安全衛生中心">環境安全衛生中心</option>
                            <option value="體育室">體育室</option>
                            <option value="秘書室">秘書室</option>
                            <option value="學務處">學務處</option>
                            <option value="總務處">總務處</option>
                            <option value="圖資資訊館">圖資資訊館</option>
                            <option value="教學發展中心">教學發展中心</option>  
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="inputState" class="form-label"><b>領取狀態</b></label>
                        <select id="status" name="status" class="form-select">
                            <option value="" selected disable>請選擇領取狀態</option>
                            <option value="未領取">未領取</option>
                            <option value="已領取" >已領取</option>
                            <option value="退件">退件</option>
                        </select>
                    </div>
                    <label for="inputState" class="form-label"> <b>收件日期</b> </label>
                    <div class="input-group ">
                        <input type="date" name="startDate"  id="startDate" class="form-control" >
                        <span class="input-group-text">到</span>
                        <input type="date" name="endDate" id="date_info" class="form-control" >
                    </div>     
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">            
                        <button type="submit" name="" class="btn btn-secondary col-md- ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg> 搜尋</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="container">
    <p>&nbsp</p>
       <a class="btn btn-primary " href="admin_seealldata.php" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
        </svg>&nbsp顯示所有資料</a>
      <p>   </p>
      <div class="table-responsive">
      <?php
         $link = @mysqli_connect( 
          'localhost',  // MySQL主機名稱 
          'root',       // 使用者名稱 
          '',  // 密碼
          'nukpost');
         
          $query_run = mysqli_query($link,  $_SESSION["admin_SQL"]);
      ?>
      <table class='table table-hover able-bordered align-middle '>
        <thead>
            <tr>
                <th scope="col" class="table-warning">序號</th>
                <th scope="col" class="table-warning">收件單位</th>
                <th scope="col" class="table-warning">收件人</th>
                <th scope="col" class="table-warning">收件日期</th>
                <th scope="col" class="table-warning">寄件人</th>              
                <th scope="col" class="table-warning">領取狀態</th>
                <th scope="col" class="table-warning">領件日期</th>
                <th scope="col" class="table-warning">領取人</th>
                <th scope="col" class="table-warning">領件地點</th>
                <th scope="col" class="table-warning">郵件編號</th>
                <th scope="col" class="table-warning">郵件類別</th>
                <th scope="col" class="table-warning">尺寸</th>
                <th scope="col" class="table-warning" >備註</th>
                <th scope="col" class="table-warning" colspan="2">操作</th>
            </tr>
        </thead>
        <?php
          if($query_run)
          {
            foreach($query_run as $row)
            {
        ?>
              <tbody>
                  <tr>
                      <td><?php echo $row['no'];?></td>                      
                      <td><?php echo $row['unit'];?></td>
                      <td><?php echo $row['recipient'];?></td>
                      <td><?php echo $row['date'];?></td>
                      <td><?php echo $row['sender'];?></td>
                      <td><?php echo $row['status'];?></td>
                      <td><?php echo $row['collectdate'];?></td>
                      <td><?php echo $row['collector'];?></td>
                      <td><?php echo $row['address'];?></td>
                      <td><?php echo $row['trackingnumber'];?></td>
                      <td><?php echo $row['type'];?></td>
                      <td><?php echo $row['size'];?></td>
                      <td><?php echo $row['note'];?></td>
                      <!-- <td>
                          <button type="button" class="btn btn-info viewbtn"> VIEW </button>
                      </td> -->
                      <td rowspan="2">
                          
                          <button type="button" class="btn btn-success editbtn"> 
                          修改</button>
                      </td>
                      <td>
                            <button type="button" class="btn btn-danger deletebtn"> 
                            刪除</button>
                      </td>
                  </tr>
              </tbody>
        <?php           
                    }
                }
          else 
          {
             echo "No Record Found";
          }
        ?>
      </table>
      
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#delete').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_no').val(data[0]);                          
            });
        });
    </script>
    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);
                              
                     
                $('#update_no').val(data[0]);
                $('#unit').val(data[1]);
                $('#recipient').val(data[2]);
                $('#date').val(data[3]);
                $('#sender').val(data[4]);
                $('#status').val(data[5]);
                $('#collectdate').val(data[6]);
                $('#collector').val(data[7]);
                $('#address').val(data[8]);
                $('#trackingnumber').val(data[9]);
                $('#type').val(data[10]);
                $('#size').val(data[11]);
                $('#note').val(data[12]);
            });
        });
    </script>
    <script>
     $(document).ready(function () {
         var time = new Date();
         var day = ("0" + time.getDate()).slice(-2);
         var month = ("0" + (time.getMonth() + 1)).slice(-2);
         var today = time.getFullYear() + "-" + (month) + "-" + (day);
         $('#date_info').val(today);
    });
    </script>
    <script>
        function change(){
            <?php
            echo "sss";
            ?>
        }
        // var n = 0;
        //     function numberAdd(){
        //     n = n+1
        //     document.getElementById("addResult").innerHTML = n
        //     return
        //     }
    </script>
    
  </body>
</html>