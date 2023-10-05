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
            <a class="nav-link " aria-current="page" href="admin_addmail.php" >新增郵件</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_mailmanager.php">郵件管理</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin_usermanager.php">使用者管理</a>
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
            <a  class="btn btn-secondary" href="admin_usermanager.php"> 取消</a>
            <a class="btn btn-primary" href="../nukmailer.php">登出</a>
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" herf="nukmailer.php">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>
<p></br></br></br></p>

    <!-- add -->
    <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>新增使用者</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    
                </div>

                <form action="admin_insertuser.php" method="POST">

                    <div class="modal-body">
                    <div class="form-group">
                            <label> 使用者名稱 </label>
                            <input type="text" name="uname" class="form-control" placeholder="請輸入使用名稱">
                        </div>

                        <div class="form-group">
                            <label> 帳號 </label>
                            <input type="text" name="uaccount" class="form-control" placeholder="請輸入帳號">
                        </div>

                        <div class="form-group">
                            <label> 密碼 </label>
                            <input type="text" name="upwd" class="form-control" placeholder="請輸入密碼">
                        </div>
                        
                        <div class="form-group">
                            <label for="inputState" class="form-label"><b>權限</b></label>
                            <select id="upermission" name="upermission" class="form-select">
                                <option value="使用者" >使用者</option>
                                <option value="櫃台">櫃台</option>
                                <option value="管理者">管理者</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">新增</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>修改使用者資料</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    
                </div>

                <form action="admin_updateuser.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> 使用者名稱 </label>
                            <input type="text" name="uname" id="uname" class="form-control" placeholder="請輸入使用名稱">
                        </div>

                        <div class="form-group">
                            <label> 帳號 </label>
                            <input type="text" name="uaccount" id="uaccount" class="form-control" placeholder="請輸入帳號">
                        </div>

                        <div class="form-group">
                            <label> 密碼 </label>
                            <input type="text" name="upwd" id="upwd" class="form-control" placeholder="請輸入密碼">
                        </div>

                        <div class="form-group">
                            <label for="inputState" class="form-label"><b>權限</b></label>
                            <select id="upermission" name="upermission" class="form-select">
                                <option value="使用者" >使用者</option>
                                <option value="櫃台">櫃台</option>
                                <option value="管理者">管理者</option>
                            </select>
                        </div>

                        <!-- <div class="form-group">
                            <label> 權限 </label>
                            <input type="text" name="upermission" id="upermission" class="form-control" placeholder="請輸入權限">
                        </div> -->

                        
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
                    <h5 class="modal-title" id="exampleModalLabel"> <b>刪除使用者資料</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    
                </div>
                <form action="admin_deleteuser.php" method="POST">
                    <div class="modal-body">                        
                        <h4></h4>
                        <p>您確認要刪除此使用者嗎?</p>
                        <input type="hidden" name="delete_id" id="delete_id">                      
                    </div>
                    
                    <div class="modal-footer">
                        <a  class="btn btn-secondary" href="admin_usermanager.php"> 取消</a>                     
                        <button type="submit" name="deletedata" class="btn btn-primary">刪除</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    


    <!-- VIEW POP UP FORM (Bootstrap MODAL) -->
    <!-- <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> View Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="decode.php" method="POST">

                    <div class="modal-body">

                        <input type="text" name="view_id" id="view_id">

                        <p id="fname"> </p> 
                        <h4 id="fname"> <?php echo ''; ?> </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> CLOSE </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button> 
                    </div>
                </form>

            </div>
        </div>
     </div> -->


    <div class="container">

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmodal">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
      </svg>&nbsp增加使用者
      </button>
      <p>&nbsp&nbsp&nbsp&nbsp</p>
      <div class="table-responsive">
      <?php
         $link = @mysqli_connect( 
          'localhost',  // MySQL主機名稱 
          'root',       // 使用者名稱 
          '',  // 密碼
          'nukpost');
          $query = "SELECT * FROM user";
          $query_run = mysqli_query($link, $query);
      ?>
      <table class='table table-hover able-bordered align-middle '>
        <thead>
            <tr>
                <th scope="col" class="table-warning">序號</th>
                <th scope="col" class="table-warning">使用者名稱</th>
                <th scope="col" class="table-warning">帳號</th>
                <th scope="col" class="table-warning">密碼</th>
                <th scope="col" class="table-warning">權限</th>
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
                      <td><?php echo $row['uid'];?></td>
                      <td><?php echo $row['uname'];?></td>
                      <td><?php echo $row['uaccount'];?></td>
                      <td><?php echo $row['upwd'];?></td>
                      <td><?php echo $row['upermission'];?></td>
                      <!-- <td>
                          <button type="button" class="btn btn-info viewbtn"> VIEW </button>
                      </td> -->
                      <td >
                          
                          <button type="button" class="btn btn-success editbtn"> 
                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                             <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                             <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                           </svg>修改</button>
                      </td>
                      <td>
                            <button type="button" class="btn btn-danger deletebtn"> 
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                            </svg>刪除</button>
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
        </div>
    </div>
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <!-- <script>
        $(document).ready(function () {

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "display.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script> -->


    <!-- <script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
    </script> -->

    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#delete').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);                          
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

                $('#update_id').val(data[0]);
                $('#uname').val(data[1]);
                $('#uaccount').val(data[2]);
                $('#upwd').val(data[3]);
                $('#upermission').val(data[4]);

            });
        });
    </script>



</body>
</html>