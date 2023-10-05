<?php
        session_start();
        
        if(isset($_POST["unit"])!=null){
          $unit=$_POST['unit'];
          $recipient=$_POST['recipient'];
            if (empty($_POST['unit'])==false && empty($_POST['recipient'])==false) {
              $_SESSION["counter_SQL"]=="SELECT * FROM data WHERE unit = '$unit' AND recipient = '$recipient' AND (status = '退件' OR status = '未領取') ORDER BY no DESC";
            }elseif (empty($_POST['unit'])==false || empty($_POST['recipient'])==false) {
              $_SESSION["counter_SQL"]="SELECT * FROM data WHERE (unit = '$unit' AND (status = '退件' OR status = '未領取')) OR (recipient = '$recipient' AND (status = '退件' OR status = '未領取')) ORDER BY no DESC";
            }
        }
        if(empty($_SESSION["counter_SQL"])==true){
          $_SESSION["counter_SQL"]="SELECT * FROM data WHERE (status = '退件' OR status = '未領取') ORDER BY no DESC";
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
    require("../dbconnect.php");
    ?> 

  <div class="container">
    <div class="row">  
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="counter_take.php">
            <img src="../img/logo.png" alt="" width="32" height="32" class="d-inline-block align-text-top"> 
              高大郵務管理系統
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="counter_take.php" >領取郵件</a>
              </li>
            </ul>

            <ul class="navbar-nav ">
            <hr class="d-md-none text-white-50">
            <li class="nav-item">
              <a class="nav-link ">
                  <b></b>
              <?php
                    if(isset($_COOKIE["COUNTER_UNAME"])){
                        $counter_cookie = $_COOKIE["COUNTER_UNAME"];
                        echo "<b>櫃台</b>&nbsp".$counter_cookie;
                    }
                ?>
                </a>
              </li>
              <li class="nav-item"><p</p></li>
            
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
  <p>&nbsp</p>
  <p>&nbsp</p>
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
                <form class="row g-3 needs-validation" action="counter_take.php" method="POST" novalidate>                              
                   
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
                      <label><b>收件人</b></label>
                      <input type="text" name="recipient" id="recipient" class="form-control" placeholder="請輸入收件人">
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
            <a  class="btn btn-secondary" href="counter_take.php"> 取消</a>
            <a class="btn btn-primary" href="../nukmailer.php">登出</a>
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" herf="nukmailer.php">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>

    <div class="container ">
      <p>&nbsp</p>
      <a class="btn btn-primary " href="counter_seealldata.php" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
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
            // $query="SELECT * FROM data";
            $query_run = mysqli_query($link, $_SESSION["counter_SQL"]);
            echo "<form method='POST' action='collectorinput.php'>"; 
        ?>
          <input type="hidden" name="countername" value="<?php echo $counter_cookie?>">
        <table class='table table-hover able-bordered align-middle '>
          <thead>
              <tr>
                  <th scope="col" class="table-warning"></th>
                  <th scope="col" class="table-warning">序號</th>
                  <th scope="col" class="table-warning">收件單位</th>
                  <th scope="col" class="table-warning">收件人</th>
                  <th scope="col" class="table-warning">收件日期</th>
                  <th scope="col" class="table-warning">寄件人</th>
                  <th scope="col" class="table-warning">領取狀態</th>                
                  <th scope="col" class="table-warning">郵件編號</th>
                  <th scope="col" class="table-warning">郵件類別</th>
                  <th scope="col" class="table-warning">尺寸</th>
                  <th scope="col" class="table-warning" >備註</th>
                  
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
                        <?php echo "<td>"."<input type='checkbox' name='no[]' value='$row[no]'>"."</td>";?>
                        <td><?php echo $row['no'];?></td>                      
                        <td><?php echo $row['unit'];?></td>
                        <td><?php echo $row['recipient'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['sender'];?></td>
                        <td><?php echo $row['status'];?></td>                     
                        <td><?php echo $row['trackingnumber'];?></td>
                        <td><?php echo $row['type'];?></td>
                        <td><?php echo $row['size'];?></td>
                        <td><?php echo $row['note'];?></td>
                      
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
           <br>
           <div class="d-grid gap-2 col-2 mx-auto">
              <button type="submit" name="updatedata" class="btn btn-success">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z"/>
                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
              </svg>&nbsp   領取</button>  
           </div>     
           </form>
           
      </div>
        
    </div>
  </body>
</html>