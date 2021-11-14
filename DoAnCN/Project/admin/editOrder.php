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

    $get_ctdh="SELECT * FROM detailorders INNER JOIN products ON detailorders.IdProducts = products.IdProducts WHERE idOrders='".$_GET["idOrder"]."' ";
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
              <h1 class="m-0"> Thông tin đơn hàng </h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
        <div class="card col-3" style="float: right; margin-right: 60px;">
            <div class="d-flex card-header justify-content-between border-0">
                <h3 class="card-title">Đơn hàng</h3>
                <?php if($dbdata["Status"] == "Đã tiếp nhận") {?>
                    <h3 class="card-title badge bg-danger" style="margin-left: 50px;font-size: 14px"><?php echo $dbdata["Status"]?></h3>
                <?php } else {?>
                    <h3 class="card-title" style="background: #E7FBE3;width: 100px; color: #0DB473; border-radius: 20px; padding-left: 12px;font-size: 15px; margin-left: 50px"><?php echo $dbdata["Status"]?></h3>
                <?php }?>
            </div>
            <div class="card-body">
                <div class=" justify-content-between align-items-center border-bottom mb-3">
                    <p class="d-flex flex-column text-left" style="font-size: 14px">Bảng giá: Giá bán lẻ</p>
                    <p class="d-flex flex-column text-left" style="font-size: 14px">Thuế: Giá chưa bao gồm thuế</p>
                    <p class="d-flex flex-column text-left" style="font-size: 14px">Ngày hẹn giao: ---</p>
                    <p class="d-flex flex-column text-left" style="font-size: 14px">Ngày chứng từ:13/11/2021 19:30</p>
                    <p class="d-flex flex-column text-left" style="font-size: 14px">Nhân viên bán hàng: <?php echo $db_staff["Name"]?></p>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Thông tin khách hàng</h3>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title" style="margin-left: 20px;font-size: 16px"><?php echo $dbdata["NameCustomer"]?></h3>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title" style="margin-left: 20px;font-size: 16px"><?php echo $dbdata["Phone"]?></h3>
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
                                    <td style="text-align: right"><?=number_format($dbdata["Total"],0,",",".")?></td>
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
                        <!-- /.card-body -->
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
                                $status = $_POST["status"];
                                $ngaydat = date("Y-m-d H:i:s");
                                $query = "UPDATE orders SET Status = '".$status."',Datedeliver = '".$ngaydat."' WHERE idOrders = '".$_GET["idOrder"]."'";
                                $queryupdate=mysqli_query($conn,$query);
                                echo "<script>location='../admin/listBill.php'</script>";
                            }
                            ?>
                            <h3 class="card-title card-footer"><i class="fa fa-check-circle"></i> Xác nhận đơn hàng</h3>
                            <form class="row contact_us_form" action="" method="post" id="contactForm" novalidate="novalidate" style="float: right">
                                <div class="card-footer" style="display: flex">
                                    <select class="form-control" name="status" id="" style="margin-right: 20px">
                                        <option value="Hoàn thành">Hoàn thành</option>
                                        <option value="Đã tiếp nhận">Đã tiếp nhận</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
include ('../admin/layoutAdmin/footer.php')
?>

