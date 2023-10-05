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
        <ul class="navbar-nav mr-auto me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="user_bulletin.php" >最新公告</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_search.php">郵件查詢</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="user_mypackage_unaccalimed.php">我的包裹</a>
          </li>
        </ul>
        <ul class="navbar-nav ">
        <hr class="d-md-none text-white-50">
        <li class="nav-item">
          <a class="nav-link ">
              <b></b>
          <?php
                if(isset($_COOKIE["USER_UNAME"])){
                    $usercookie = $_COOKIE["USER_UNAME"];
                    echo "<b>使用者</b>&nbsp".$usercookie;
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
  
  <div class="text-center">
    <img src="../img/banner.svg" class="img-fluid" alt="...">
  </div>
<!-- 公告 -->

<div class="container ">
  <div class="row text-center p-5 ">
    <h2><b>最新公告</b></h2> 
  </div>  
  <div class="row border-bottom">
    <div class="col-12">
    <table class="table table-hover">
      <thead >
        <tr>
          <th scope="col">序號</th>
          <th scope="col">日期</th>
          <th scope="col">標題</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>2022-04-27</td>
          <td><a href="https://ga.nuk.edu.tw/p/406-1010-54162,r640.php?Lang=zh-tw" target="_blank" style="text-decoration: none ;">本校「郵政代辦所（楠梓一代）」於本（111）年5月2日（星期一）暫停服務，同日暫停紙本發文「郵寄」作業，請查照。</a></td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>2022-03-16</td>
          <td><a href="https://ga.nuk.edu.tw/p/406-1010-53040,r640.php?Lang=zh-tw" target="_blank" style="text-decoration: none ;">便函-本組配合校慶活動於3/18(五)下午及3/19(六)全日，暫停公文及郵件收發業務，惠請查照。</a></td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>2022-01-19</td>
          <td><a href="https://ga.nuk.edu.tw/p/406-1010-53041,r640.php?Lang=zh-tw" target="_blank" style="text-decoration: none ;">【公告】郵政代辦所111年寒假期間服務時間</a></td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>2022-08-30</td>
          <td><a class="link"href="https://ga.nuk.edu.tw/p/406-1010-48182,r640.php?Lang=zh-tw" target="_blank" style="text-decoration: none ;">中華郵政(股)公司公告自110年9月2日起至9月10日止，辦理收寄中秋節勞軍包裹優惠活動，郵資按8折優待</a></td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>2022-06-10</td>
          <td><a href="https://ga.nuk.edu.tw/p/406-1010-38013,r640.php?Lang=zh-tw" target="_blank" style="text-decoration: none ;">有關郵政法部分條文修正案業經總統公布並於108年11月1日施行，請各單位依法將郵政專營之郵件交由中華郵政公司遞送(詳如說明)</a></td>
        </tr>
      </tbody>
    </table>
    <div class="btn-toolbar justify-content-between " role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group mx-auto p-5" role="group" aria-label="First group">
        <button type="button" class="btn btn-secondary">1</button>
        <button type="button" class="btn btn-outline-secondary">2</button>
        <button type="button" class="btn btn-outline-secondary">3</button>
        <button type="button" class="btn btn-outline-secondary">4</button>
      </div>
    </div>
  </div>
</div>   
<!-- <div class="p-5 row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div> -->
<div class="container ">
  <footer class="py-3">
    <div class="row p-1">
      <div class="col-12 col-md-3 mb-3">
        <div class="row">
          
          <h5></br><b>服務時間</b></h5>
          <P>星期一、14:00–16:00</P>
          <p>星期二、14:00–16:00</p>
          <p>星期三、14:00–16:00</p>
          <p>星期四、14:00–16:00</p>
          <p>星期五、14:00–16:00</p>
          <p>星期六、休息</p>
          <p>星期日、休息</p>
        </div>
      </div>


      <div class="col-md-8 offset-md-1 mb-3">
        <div class="row text-left p-3">
        <h4>楠梓第1郵政代辦所(國立高雄大學校內)</h4> 
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10408.496003106746!2d120.26896481008951!3d22.
          729766104191338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346e0f11d208ed35%3A0xa43380a366698e90!2z5
          qWg5qKT56ysMemDteaUv-S7o-i-puaJgCjlnIvnq4vpq5jpm4TlpKflrbjmoKHlhacp!5e0!3m2!1szh-TW!2stw!4v1653579733374!5m2!1
          szh-TW!2stw" width="1200" height="350" style="border:0; text-align:center;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>  
        </div>
      </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 ">
      <p>© 2022 NUKpost, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="text-muted" href="https://www.nuk.edu.tw/" target="_blank"><img src="../img/nuklogo.png" alt="" width="24" height="24"></a></li>
        <li class="ms-3"></li>
        <li class="ms-3"></li>
      </ul>
    </div>
  </footer>
</div>
  </body>
</html>