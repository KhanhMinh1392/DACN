<?php
    include ('../admin/layoutAdmin/header.php')
?>
<?php
    $getorder = "SELECT * FROM order_courses WHERE idCOrders = '".$_GET["idCOrder"]."'";
    $query = mysqli_query($conn,$getorder);
    $dbdata = mysqli_fetch_array($query);

    $getstaff = "SELECT * FROM staffs WHERE idStaffs = '".$_GET["idStaff"]."'";
    $query_staff = mysqli_query($conn,$getstaff);
    $db_staff = mysqli_fetch_array($query_staff);

    $get_ctdh="SELECT * FROM detailorders_courses INNER JOIN courses ON detailorders_courses.idCourses  = courses.idCourses WHERE idCOrders='".$_GET["idCOrder"]."' ";
    $db_detail=mysqli_query($conn,$get_ctdh);
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <a href="listBillCourse.php"> <span>&#60;</span> Đơn hàng</a>
              <h1 class="m-0"> Thông tin đơn hàng #<?php echo $dbdata["idCOrders"]?> </h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card col-3" style="float: right; margin-right: 60px;">
        <div class="d-flex card-header justify-content-between border-0">
            <h3 class="card-title">Đơn hàng khóa học</h3>
        </div>
        <div class="card-body">
            <div class=" justify-content-between align-items-center border-bottom mb-3">
                <p class="d-flex flex-column text-left" style="font-size: 14px">Bảng giá: Giá bán lẻ</p>
                <p class="d-flex flex-column text-left" style="font-size: 14px">Thuế: Giá chưa bao gồm thuế</p>
                <p class="d-flex flex-column text-left" style="font-size: 14px">Ngày chứng từ: <?php $date=date_create($dbdata["DateCreate"]);echo date_format($date,"d/m/Y");?></p>
                <p class="d-flex flex-column text-left" style="font-size: 14px">Nhân viên bán hàng: <?php echo $db_staff["NameStaff"]?></p>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Thông tin khách hàng</h3>
                </div>
                <div class="card-header border-0" style="height: 100px;">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title" style="font-size: 15px"><i class="fa fa-user-circle"></i> Tên khách: <?php echo $dbdata["NameCustomer"]?></h3>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title" style="font-size: 15px"><i class="fa fa-phone"></i> Số điện thoại: <?php echo $dbdata["Phone"]?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Thông tin khóa học</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Tên khóa học</th>
                                <th>Học phí</th>
                                <th style="text-align: center">Số lượng</th>
                                <th style="width: 130px">Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                while ($result= mysqli_fetch_array($db_detail)) {
                                    $price = $result["Price"] * $result["Quantity"];
                            ?>
                            <tr>
                                <td><?php echo $result["idCourses"]?></td>
                                <td><?php echo $result["NameCourses"]?></td>
                                <td><span><?=number_format($result["Price"],0,",",".")?></span></td>
                                <td style="text-align: center"><?php echo $result["Quantity"]?></td>
                                <td style="text-align: right"><?=number_format($price,0,",",".")?></td>
                            </tr>
                            <?php }?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center">Tổng tiền:</td>
                                <td style="text-align: right"><?=number_format($dbdata["Total"],0,",",".")?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center">Phí ship:</td>
                                <td style="text-align: right"><?=number_format($dbdata["Total"]-$dbdata["Total"],0,",",".")?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center">Khách phải trả:</td>
                                <td style="text-align: right"><?=number_format($dbdata["Total"],0,",",".")?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body" style="float: right">
                            <h3 class="card-title card-footer" style="float: right"><i class="fa fa-check-circle" style="color: #28a745"></i> Xác nhận đơn hàng</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
include ('../admin/layoutAdmin/footer.php')
?>

