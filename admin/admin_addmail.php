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
      <a class="navbar-brand" href="admin_addmail.php">
        <img src="../img/logo.png" alt="" width="32" height="32" class="d-inline-block align-text-top"> 
          高大郵務管理系統
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="admin_addmail.php" >新增郵件</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_mailmanager.php">郵件管理</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="admin_usermanager.php">使用者管理</a>
          </li>
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
    <p></br></br></br></br></br></br></p>
    <div class="container col-md-6 ">
    <form class="row g-3 needs-validation" action="admin_insertdata.php" method="POST" novalidate>
      
    
   
      <div class="col-md-6 position-relative">
          <label for="inputCity" class="form-label"><b>掛號編號</b></label>
          <input type="text" class="form-control" id="trackingnumber" name="trackingnumber" placeholder="請輸入掛號編號" required>
      </div>
      
      <div class="col-md-6">
        <label for="inputState" class="form-label"><b>收件單位</b></label>
        <select id="unit" name ="unit"class="form-select">
          
          <option value="" selected disable hidden>請選擇處室單位</option>
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
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>

      <div class="col-md-6">
        <label for="inputAddress" class="form-label"><b>收件人</b></label>
        <input type="text" class="form-control" id="recipient" name ="recipient" placeholder="請輸入收件人名字">
      </div>

      <div class="col-md-6">
        <label for="inputAddress2" class="form-label"><b>寄件人</b></label>
        <input type="text" class="form-control" id="sender" name="sender" placeholder="請輸入寄件人名字">
      </div>

      <div class="col-md-4">
        <label for="inputState" class="form-label"><b>收件類別</b></label>
        <select id="type" name="type" class="form-select">
              <option value="信件" selected>信件</option>
							<option value="包裹">包裹</option>
        </select>
      </div>
      
      <div class="col-md-4">
                        <label for="inputState" class="form-label"><b>領取狀態</b></label>
                        <select id="status" name="status" class="form-select">
                            
                            <option value="未領取" selected>未領取</option>
                            <option value="退件">退件</option>
                        </select>
                    </div>

      <div class="col-md-4">
        <label for="inputCity" class="form-label"><b>尺寸(長*寬)</b></label>
        <input type="text" class="form-control" id="size" name="size" placeholder="請輸入包裹尺寸">
      </div>

      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"><b>備註</b></label>
        <textarea class="form-control" id="note"  name="note" rows="3"></textarea>
      </div>

      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary ">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-plus-fill" viewBox="0 0 16 16">
          <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z"/>
          <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>
        </svg>
          新增郵件</button>
      </div>
    </form>
    </div>
  </body>
</html>