<?php
    include ('../page/connect.php');
    session_start();
    if(isset($_GET["LogOut"])) {
        unset($_SESSION["email"]);
        echo "<script>location='../admin/loginAdmin.php';</script>";
    }
    $getinfo = "SELECT * FROM staffs WHERE Username = '".$_SESSION["email"]."'";
    $query = mysqli_query($conn,$getinfo);
    $name = mysqli_fetch_array($query);
?>
<?php
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 7;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page-1) * $item_per_page;
    $dbdata = "SELECT * FROM courses ORDER BY idCourses DESC LIMIT ".$item_per_page." OFFSET ".$offset;
    $query = mysqli_query($conn,$dbdata);

    $total = mysqli_query($conn,"SELECT * FROM courses");
    $total = $total->num_rows;
    $totalpage = ceil($total / $item_per_page);

    if(isset($_GET["MaKhoaHoc"]))
    {
        $delete="DELETE FROM courses WHERE idCourses='".$_GET["MaKhoaHoc"]."'";
        if(mysqli_query($conn,$delete))
        {
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>location='listCourses.php'</script>";
        }
        else
        {
            echo "<script>alert('Xảy ra lỗi')</script>";
        }

    }
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cake Shop</title>
    <link rel="icon" href="../img/fav-icon.png" type="image/x-icon" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
  <style>
    .icons{
      text-decoration: none;
      color: #fff;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link">Trang Chủ</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Liên Hệ</a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Cherry Cake Shop</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="../admin/infoadmin.php?idAdmin=<?php echo $name["idStaffs"]?>" class="d-block"><?php echo $name["NameStaff"];?></a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../admin/index4.php" class="nav-link">
                      <i class="nav-icon fas fa-home"></i>
                      <p>
                        Trang Chủ
                      </p>
                    </a>
                </li>
              <li class="nav-item menu-close">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-invoice-dollar"></i>
                  <p>
                    Đơn hàng
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="listBill.php" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Đơn hàng sản phẩm</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="listBillCourse.php" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Đơn hàng khóa học</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item menu-close">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-archive"></i>
                  <p>
                    Sản phẩm
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="listProduct.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Danh sách sản phẩm</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="listCourses.php" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Danh sách khóa học</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item menu-close">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Khách hàng
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../admin/listUser.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Danh sách khách hàng</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Nhóm khách hàng</p>
                    </a>
                  </li>
                </ul>
              </li>
                <?php
                if($name["idRole"] == 1) {
                    ?>
                    <li class="nav-item menu-close">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Nhân viên
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../admin/listStaff.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách nhân viên</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php }?>
                <li class="nav-item menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Blog Web
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../admin/listBlog.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lí Blog</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $_SERVER["PHP_SELF"]?>?LogOut=0" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Đăng xuất
                        </p>
                    </a>
                </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Danh sách khóa học</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <a href="addCourses.php" class="btn btn-success float-right"><i class="fa fa-plus-circle"></i> Thêm</a>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="background-color: #007bff;">
                <h3 class="card-title" style="color:#fff; padding: 5px" >Danh sách khóa học</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th style="width: 200px">Tên khóa học</th>
                      <th style="width: 120px">Học phí</th>
                      <th style="width: 100px">Thời gian bắt đầu</th>
                      <th style="width: 100px">Thời gian kết thúc</th>
                      <th style="width: 10px"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    while ($row = mysqli_fetch_array($query)){
                  ?>
                    <tr>
                      <td><?php echo $row["idCourses"]?></td>
                      <td><?php echo $row["NameCourses"]?></td>
                      <td><?=number_format($row["Price"],0,",",".")?> VNĐ</td>
                      <td>
                          <?php
                           $date=date_create($row["TimeStart"]);
                           echo date_format($date,"d/m/Y");
                          ?>
                      </td>
                      <td>
                          <?php
                            $date=date_create($row["TimeEnd"]);
                            echo date_format($date,"d/m/Y");
                          ?>
                      </td>
                      <td>
                        <a href="../admin/editCourse.php?Makh=<?php echo $row["idCourses"]?>" class="btn btn-primary icons"><i class="fas fa-edit"></i></a>
                        <a onclick="return Delete('<?php echo $row["NameCourses"];?>')" href="<?php echo $_SERVER["PHP_SELF"];?>?MaKhoaHoc=<?php echo $row["idCourses"];?>" class="btn btn-danger icons"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                      <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
<!--                <hr> -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <?php for($num = 1 ; $num <= $totalpage; $num++){ ?>
                            <li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
                        <?php } ?>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
        function Delete(name) {
            return confirm("Bạn có chắc muốn xóa sản phẩm: " + name + "?");
        }
    </script>
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.min.js"></script>
</body>
</html>
