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
    <!-- Optional JavaScript; choose one of the two! -->
    <div class="container">
  <div class="row">  
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="user_bulletin.php">
        <img src="../img/logo.png" alt="" width="32" height="32" class="d-inline-block align-text-top"> 
          高大郵務管理系統
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="user_bulletin.php" >最新公告</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_search.php">郵件查詢</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="user_mypackage_unaccalimed.php">我的包裹</a>
          </li>
        </ul>
        
        <ul class="navbar-nav ">
        <hr class="d-md-none text-white-50">
        <li class="nav-item">
          <a class="nav-link ">
              <b></b>
          <?php
                if(isset($_COOKIE["USER_UNAME"])){
                    $user_cookie = $_COOKIE["USER_UNAME"];
                    echo "<b>使用者</b>&nbsp".$user_cookie;
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

    <!-- banner -->
    <p></br></br></br></p>

    <div class="container">
      <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
              <a class="nav-link " aria-current="true" href="user_mypackage_unaccalimed.php" style="color:gray">未領取</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_mypackage_return.php" style="color:gray">退件</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="user_mypackage_received.php" tabindex="-1" aria-disabled="true" >已領取</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
         <div class="container ">
          <p>&nbsp</p>
          
          <p>   </p>
          <div class="table-responsive">
            <?php
              $link = @mysqli_connect( 
                'localhost',  // MySQL主機名稱 
                'root',       // 使用者名稱 
                '',  // 密碼
                'nukpost');
               
                $query="SELECT * FROM data WHERE status = '已領取' AND recipient = '$user_cookie'";
                $query_run = mysqli_query($link, $query);
              
            ?>
              <input type="hidden" name="countername" value="<?php echo $user_cookie?>">
            <table class='table table-hover able-bordered align-middle '>
              <thead>
                  <tr>
                    
                      <th scope="col" class="table-warning">序號</th>
                      <th scope="col" class="table-warning">收件單位</th>                
                      <th scope="col" class="table-warning">收件日期</th>
                      <th scope="col" class="table-warning">寄件人</th>                        
                      <th scope="col" class="table-warning">郵件編號</th>
                      <th scope="col" class="table-warning">郵件類別</th>
                      <th scope="col" class="table-warning">尺寸</th>
                      <th scope="col" class="table-warning">領取人</th> 
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
                            <td><?php echo $row['no'];?></td>                      
                            <td><?php echo $row['unit'];?></td>                     
                            <td><?php echo $row['date'];?></td>
                            <td><?php echo $row['sender'];?></td>                                       
                            <td><?php echo $row['trackingnumber'];?></td>
                            <td><?php echo $row['type'];?></td>
                            <td><?php echo $row['size'];?></td>
                            <td><?php echo $row['collector'];?></td>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>