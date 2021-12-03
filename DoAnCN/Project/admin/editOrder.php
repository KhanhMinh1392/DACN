<?php
    include ('../admin/layoutAdmin/header.php')
?>
<?php
    $getorder = "SELECT * FROM orders WHERE idOrders = '".$_GET["idOrder"]."'";
    $query = mysqli_query($conn,$getorder);
    $dbdata = mysqli_fetch_array($query);

    $getstaff = "SELECT * FROM staffs WHERE idStaffs = '".$_GET["idStaff"]."'";
    $query_staff = mysqli_query($conn,$getstaff);
    $db_staff = mysqli_fetch_array($query_staff);

    $get_ctdh="SELECT * , detailorders.Price AS price FROM detailorders INNER JOIN products ON detailorders.IdProducts = products.IdProducts WHERE idOrders='".$_GET["idOrder"]."' ";
    $db_detail=mysqli_query($conn,$get_ctdh);
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <a href="listBill.php"> <span>&#60;</span> Đơn hàng</a>
              <h1 class="m-0"> Thông tin đơn hàng #<?php echo $dbdata["idOrders"]?> </h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card col-3" style="float: right; margin-right: 60px;">
        <div class="d-flex card-header justify-content-between border-0">
            <h3 class="card-title">Đơn hàng</h3>
            <?php if($dbdata["Status"] == "Đã tiếp nhận") {?>
                <h3 class="card-title badge bg-danger" style="margin-left: 50px;font-size: 14px; padding: 5px"><?php echo $dbdata["Status"]?></h3>
            <?php } else if ($dbdata["Status"] == "Hoàn thành") {?>
                <h3 class="card-title" style="background: #E7FBE3;width: 100px; color: #0DB473; border-radius: 20px; padding-left: 12px;font-size: 15px; margin-left: 50px"><?php echo $dbdata["Status"]?></h3>
            <?php } else {?>
                <td ><p class="badge bg-warning" style="margin-left: 50px;font-size: 14px; padding: 5px;width: 100px"><?php echo $dbdata["Status"]?></p></td>
            <?php } ?>
        </div>
        <div class="card-body">
            <div class=" justify-content-between align-items-center border-bottom mb-3">
                <p class="d-flex flex-column text-left" style="font-size: 14px">Bảng giá: Giá bán lẻ</p>
                <p class="d-flex flex-column text-left" style="font-size: 14px">Thuế: Giá chưa bao gồm thuế</p>
                <p class="d-flex flex-column text-left" style="font-size: 14px">Ngày chứng từ: <?php if($dbdata["Status"]=="Hoàn thành") { $date=date_create($dbdata["Datedeliver"]);echo date_format($date,"d/m/Y"); } else { echo "---"; }?></p>
                <p class="d-flex flex-column text-left" style="font-size: 14px">Nội dung: <?php echo $dbdata["Notes"]?></p>
                <?php if($dbdata["Status"]=="Hoàn thành") {?>
                    <p class="d-flex flex-column text-left" style="font-size: 14px">Nhân viên xác nhận: <?php echo $db_staff["NameStaff"]?></p>
                <?php }else {?>
                    <p class="d-flex flex-column text-left" style="font-size: 14px">Nhân viên xác nhận: --/--</p>
                <?php }?>
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
                    <?php
                        $getdis = "SELECT * FROM pvs_quanhuyen WHERE maqh = '".$dbdata["Districts"]."'";
                        $query_district = mysqli_query($conn,$getdis);
                        $dbdistrict = mysqli_fetch_array($query_district);

                        $getcity = "SELECT * FROM pvs_tinhthanhpho WHERE matp = '".$dbdata["City"]."'";
                        $query_city = mysqli_query($conn,$getcity);
                        $dbcity= mysqli_fetch_array($query_city);
                    ?>
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title" style="font-size: 15px"><i class="fas fa-map-marker-alt"></i> Địa chỉ: <?php echo $dbdata["Address"]?>, <?php echo $dbdistrict["name_quanhuyen"]?>, <?php echo $dbcity["name_city"]?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Thông tin sản phẩm</h3>
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
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th style="text-align: center">Số lượng</th>
                                <th style="width: 130px">Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                while ($result= mysqli_fetch_array($db_detail)) {
                                    $price = $result["Price"] * $result["Quantitydetail"];
                            ?>
                            <tr>
                                <td><?php echo $result["IdProducts"]?></td>
                                <td><?php echo $result["Nameproducts"]?></td>
                                <td><span><?=number_format($result["Price"],0,",",".")?></span></td>
                                <td style="text-align: center"><?php echo $result["Quantitydetail"]?></td>
                                <td style="text-align: right"><?=number_format($price,0,",",".")?></td>
                            </tr>
                            <?php }?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center">Tổng tiền:</td>
                                <td style="text-align: right"><?=number_format($dbdata["Total_Product"],0,",",".")?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center">Phí ship:</td>
                                <td style="text-align: right"><?=number_format($dbdata["Total"]-$dbdata["Total_Product"],0,",",".")?></td>
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
                            <?php
                            if($_SERVER["REQUEST_METHOD"]=="POST") {
                                $gst = "SELECT * FROM staffs WHERE Username = '".$_SESSION["email"]."'";
                                $querystf = mysqli_query($conn,$gst);
                                $dbstf = mysqli_fetch_array($querystf);

                                $status = $_POST["status"];
                                if($status == "Đang giao") {
                                    $ngaydat = 0;
                                } else {
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $ngaydat = date("Y-m-d H:i:s");
                                }
                                $query = "UPDATE orders SET idStaffs = '".$dbstf["idStaffs"]."',Status = '".$status."',Datedeliver = '".$ngaydat."' WHERE idOrders = '".$_GET["idOrder"]."'";
                                $queryupdate=mysqli_query($conn,$query);
                                echo "<script>location='../admin/listBill.php'</script>";
                            }
                            ?>
                            <?php
                                if($dbdata["Status"] == "Hoàn thành") {
                            ?>
                            <h3 class="card-title card-footer"><i class="fa fa-check-circle" style="color: #28a745"></i> Xác nhận đơn hàng</h3>
                            <form class="row contact_us_form" action="" method="post" id="contactForm" novalidate="novalidate" style="float: right">
                                <div class="card-footer" style="display: flex">
                                    <select class="form-control" name="status" id="" style="margin-right: 20px" disabled>
                                        <option value="Hoàn thành">Hoàn thành</option>
                                        <option value="Đã tiếp nhận">Đã tiếp nhận</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary" disabled>Xác nhận</button>
                                </div>
                            </form>
                                <?php }else {?>
                            <h3 class="card-title card-footer"><i class="fa fa-bookmark" style="color: red"></i> Chưa xác nhận đơn</h3>
                            <form class="row contact_us_form" action="" method="post" id="contactForm" novalidate="novalidate" style="float: right">
                                <div class="card-footer" style="display: flex">
                                    <select class="form-control" name="status" id="" style="margin-right: 20px">
                                        <option value="Hoàn thành">Hoàn thành</option>
                                        <option value="Đang giao">Đang giao</option>
                                        <option value="Đã tiếp nhận">Đã tiếp nhận</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                </div>
                            </form>
                                <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
include ('../admin/layoutAdmin/footer.php')
?>

