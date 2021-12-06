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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                      <?php
                      if($name["idRole"] == 1) {
                          ?>
                          <li class="nav-item">
                              <a href="../admin/listCity.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Quản lí ship</p>
                              </a>
                          </li>
                      <?php }?>
                  </ul>
              </li>
              <li class="nav-item menu-close">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-archive"></i>
                  <p>
                    Sản phẩm
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="listProduct.php" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Danh sách sản phẩm</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="listCourses.php" class="nav-link">
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
                <li class="nav-item menu-close">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Thống kê
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../admin/statistical.php" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Doanh thu</p>
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
                            <h1 class="m-0">Doanh thu </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <?php
            $total = "SELECT SUM(Total) FROM `orders` WHERE Dateorders <= NOW() - INTERVAL 1 DAY AND Dateorders > NOW() - INTERVAL 8 DAY AND Status = 'Hoàn thành'";
            $query_total = mysqli_query($conn,$total);
            $result_total = mysqli_fetch_row($query_total);

            $total_course = "SELECT SUM(Total) FROM `order_courses` WHERE DateCreate <= NOW() - INTERVAL 1 DAY AND DateCreate > NOW() - INTERVAL 8 DAY ";
            $query_course = mysqli_query($conn,$total_course);
            $result_course = mysqli_fetch_row($query_course);

            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Doanh thu cửa hàng</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">Doanh thu 7 ngày qua</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                      <h4 class="text-success">
                                        <?php echo number_format($result_total[0]+$result_course[0],0,",",".")?> VNĐ
                                      </h4>
                                    </p>
                                </div>
                                <div class="card-body">
<!--                                    <div id="bar-chart" style="height: 300px;"></div>-->
                                    <div class="chart">
                                        <canvas id="areaChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                              <i class="fas fa-square text-primary"></i> This year
                            </span>
                                    <span>
                              <i class="fas fa-square text-gray"></i> Last year
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Thông tin giao hàng</h3>
                                </div>
                            </div>
                            <?php
                            $count = "SELECT * FROM orders WHERE Dateorders <= NOW() - INTERVAL 1 DAY AND Dateorders > NOW() - INTERVAL 8 DAY AND Status = 'Hoàn thành'";
                            $query_count = mysqli_query($conn,$count);
                            $result_count = mysqli_num_rows($query_count);

                            $getcourse = "SELECT * FROM `order_courses` WHERE DateCreate <= NOW() - INTERVAL 1 DAY AND DateCreate > NOW() - INTERVAL 8 DAY ";
                            $query_getcourse = mysqli_query($conn,$getcourse);
                            $result_getcourse = mysqli_num_rows($query_getcourse);
                            ?>
                            <div class="card-body">
                                <div class="d-flex" >
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">Vận đơn 7 ngày qua</span>
                                    </p>
                                </div>
                                <span class="mr-2">
                                      <i class="fas fa-square" style="color: rgb(13, 180, 115)"></i> Đã giao hàng
                                    </span>
                                <div class="card-body">
                                    <div class="text-center">
                                        <input type="text" class="knob" value="<?php echo $result_count + $result_getcourse?>" data-width="200" data-height="200" data-fgColor="rgb(13, 180, 115)" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fas fa-file-invoice-dollar"></i></i></span>
                            <?php
                                $count_bill = "SELECT * FROM orders WHERE Dateorders <= NOW() - INTERVAL 1 DAY AND Dateorders > NOW() - INTERVAL 8 DAY";
                                $query_bill = mysqli_query($conn,$count_bill);
                                $result_bill = mysqli_num_rows($query_bill);
                            ?>
                            <div class="info-box-content">
                                <span class="info-box-text">Thông tin đơn hàng</span>
                                <h3 class="info-box-number"><?php echo $result_bill?> đơn hàng</h3>
                                <span class="progress-description">
                                   7 ngày theo sản phẩm
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="fas fa-money-bill-wave-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Thông tin thanh toán</span>
                                <h3 class="info-box-number"> <?php echo number_format($result_total[0],0,",",".")?></h3>

                                <span class="progress-description">
                                  7 ngày theo sản phẩm
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <?php
                    $count_billcourse = "SELECT * FROM order_courses WHERE DateCreate <= NOW() - INTERVAL 1 DAY AND DateCreate > NOW() - INTERVAL 8 DAY";
                    $query_billcourse = mysqli_query($conn,$count_billcourse);
                    $courses = mysqli_num_rows($query_billcourse);
                    ?>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fas fa-file-invoice-dollar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Thông tin đơn hàng</span>
                                <h3 class="info-box-number"><?php echo$courses?> đơn hàng</h3>
                                <span class="progress-description">
                                    7 ngày theo khóa học
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fas fa-book-open"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Thông tin thanh toán</span>
                                <h3 class="info-box-number"><?php echo number_format($result_course[0],0,",",".")?></h3>

                                <span class="progress-description">
                                  7 ngày theo khóa học
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box" style="background: #007bff; color: white">
                            <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
                            <?php
                            $sort = "SELECT SUM(detailorders.Quantitydetail*detailorders.Price) as total FROM detailorders INNER JOIN orders ON orders.idOrders = detailorders.idOrders WHERE orders.Status = 'Hoàn thành' AND Dateorders <= NOW() - INTERVAL 1 DAY AND Dateorders > NOW() - INTERVAL 8 DAY";
                            $query_sort = mysqli_query($conn, $sort);
                            $totalrevenues = mysqli_fetch_row($query_sort);
                            ?>
                            <div class="info-box-content">
                                <span class="info-box-text">Lợi nhuận 7 ngày qua</span>
                                <h3 class="info-box-number"><?php echo number_format($totalrevenues[0],0,",",".")?></h3>

                                <span class="progress-description">
                                  <a href="revenues.php" style="color: white">>> Lợi nhuận theo sản phẩm</a>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <?php
            $i = 1;
            for ($i;$i<13;$i++) {
                $get_total = "SELECT SUM(Total) as total FROM orders WHERE month(Dateorders) = '$i' AND Status = 'Hoàn thành'";
                $query = mysqli_query($conn, $get_total);
                $mysql = mysqli_fetch_array($query);
                ?>
                <input type="hidden" id="total<?php echo $i?>" value="<?php echo $mysql["total"]?>">
            <?php }?>

            <?php
            include ('../admin/layoutAdmin/footer.php')
            ?>
