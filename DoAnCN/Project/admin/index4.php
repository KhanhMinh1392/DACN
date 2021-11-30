<?php
    include ('../admin/layoutAdmin/header.php')
?>
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Trang chủ </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-check-alt"></i></span>
              <div class="info-box-content">
                  <?php
                  $total = "SELECT SUM(Total) FROM `orders`";
                  $query_total = mysqli_query($conn,$total);
                  $result_total = mysqli_fetch_row($query_total);
                  ?>
                <span class="info-box-text">Doanh Thu</span>
                <span class="info-box-number">
                  <?php echo number_format($result_total[0],0,",",".")?>
                  <small>VNĐ</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fab fa-product-hunt"></i></span>
              <div class="info-box-content">
                  <?php
                      $getcount = "SELECT * FROM products";
                      $db = mysqli_query($conn,$getcount);
                      $count = mysqli_num_rows($db);
                  ?>
                <span class="info-box-text">Tổng sản phẩm</span>
                <span class="info-box-number"><?php echo $count?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                <div class="info-box-content">
                    <?php
                        $getbill = "SELECT * FROM orders";
                        $db_bill = mysqli_query($conn,$getbill);
                        $count_bill = mysqli_num_rows($db_bill);
                    ?>
                  <span class="info-box-text">Tổng đơn hàng</span>
                  <span class="info-box-number"><?php echo $count_bill?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                  <?php
                      $getaccount = "SELECT * FROM accounts";
                      $db_accounts = mysqli_query($conn,$getaccount);
                      $count_accounts = mysqli_num_rows($db_accounts);
                  ?>
                <span class="info-box-text">Members</span>
                <span class="info-box-number"><?php echo $count_accounts?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="card col-3" style="float: right">
          <div class="card-header border-0">
            <h3 class="card-title">Sản phẩm bán chạy</h3>
          </div>
          <div class="card-body">
              <?php
              $sort = "SELECT * ,SUM(detailorders.Quantitydetail) as total FROM detailorders INNER JOIN products ON detailorders.IdProducts = products.IdProducts GROUP BY detailorders.IdProducts ORDER BY SUM(detailorders.Quantitydetail) DESC LIMIT 4";
              $query_sort = mysqli_query($conn,$sort);
              $i = 0;
              while ($row_sort = mysqli_fetch_array($query_sort)){
                  $i++;
              ?>
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                <p class="text-success text-l" style="text-align: left">
                <i class="ion ion-ios-refresh-empty"></i>
                <span class="text-muted"><?php echo $row_sort["Nameproducts"]?></span>
              </p>
              <p class="d-flex flex-column text-right">
                <span class="font-weight-bold">
                  <i class="ion ion-android-arrow-up text-success"></i>
                    <?php echo $row_sort["total"]?>
                </span>
              </p>
            </div>
              <?php }?>
          </div>
        </div>
        <div class="card col-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Tổng doanh thu</h3>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg"> <?php echo number_format($result_total[0],0,",",".")?> VNĐ</span>
                  <span>Sales Over Time</span>
                </p>

                <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 33.1%
                  </span>
                  <span class="text-muted">Since last month</span>
                </p>
              </div>
              <!-- /.d-flex -->

              <div class="position-relative mb-4">
                <canvas id="sales-chart" height="200"></canvas>
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
    </div>
<?php
    include ('../admin/layoutAdmin/footer.php')
?>

