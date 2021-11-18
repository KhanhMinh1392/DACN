<?php
    include ('../admin/layoutAdmin/header.php')
?>
<?php
    $getorder = "SELECT * FROM accounts WHERE idAccounts = '".$_GET["idUser"]."'";
    $query = mysqli_query($conn,$getorder);
    $dbdata = mysqli_fetch_array($query);

    $total = "SELECT SUM(Total) FROM `orders` WHERE idAccounts = '".$_GET["idUser"]."'";
    $query_total = mysqli_query($conn, $total);
    $result_total = mysqli_fetch_row($query_total);

    $getcount = "SELECT idOrders FROM orders WHERE idAccounts = '".$_GET["idUser"]."'";
    $db = mysqli_query($conn,$getcount);
    $count = mysqli_num_rows($db);

    $gethistory = "SELECT * FROM orders WHERE idAccounts = '".$_GET["idUser"]."' ORDER BY idOrders DESC ";
    $db_history = mysqli_query($conn,$gethistory);
    $db_hiscountpro = mysqli_query($conn,$gethistory);
    $history = mysqli_fetch_assoc($db_hiscountpro);

    $countpro = "SELECT * FROM detailorders WHERE idOrders = '".$history["idOrders"]."'";
    $dbhispro = mysqli_query($conn,$countpro);
    $count_hispro = mysqli_num_rows($dbhispro);

?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <a href="listUser.php"> <span>&#60;</span> Danh sách khách hàng</a>
              <h1 class="m-0"> Khách hàng <?php echo $dbdata["NameCustomer"]?> </h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card col-3" style="float: right; margin-right: 60px;">
        <div class="d-flex card-header justify-content-between border-0">
            <h3 class="card-title">Đơn hàng</h3>

        </div>
        <div class="card-body">
            <div class=" justify-content-between align-items-center border-bottom mb-3">
<!--                <p class="d-flex flex-column text-left" style="font-size: 14px">Bảng giá: Giá bán lẻ</p>-->
<!--                <p class="d-flex flex-column text-left" style="font-size: 14px">Thuế: Giá chưa bao gồm thuế</p>-->
<!--                <p class="d-flex flex-column text-left" style="font-size: 14px">Ngày chứng từ: --><?php //if($dbdata["Status"]=="Hoàn thành") { $date=date_create($dbdata["Datedeliver"]);echo date_format($date,"d/m/Y"); } else { echo "---"; }?><!--</p>-->
<!--                <p class="d-flex flex-column text-left" style="font-size: 14px">Nội dung: --><?php //echo $dbdata["Notes"]?><!--</p>-->
<!--                <p class="d-flex flex-column text-left" style="font-size: 14px">Nhân viên bán hàng: --><?php //echo $db_staff["Name"]?><!--</p>-->
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Thông tin cá nhân</h3>
                </div>
                <div class="card-header border-0" style="height: 100px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title" style="font-size: 15px">Tên khách: <?php echo $dbdata["NameCustomer"]?></h3>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title" style="font-size: 15px">Số điện thoại: <?php echo $dbdata["Phone"]?></h3>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title" style="font-size: 15px">Ngày sinh: <?php $date=date_create($dbdata["Birthday"]);echo date_format($date,"d/m/Y"); ?></h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title" style="font-size: 15px">Mã khách hàng: <?php echo $dbdata["idAccounts"]?></h3>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title" style="font-size: 15px">Email: <?php echo $dbdata["Email"]?></h3>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title" style="font-size: 15px">Nhân viên phụ trách: --</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Thông tin mua hàng</h3>
                    </div>
                    <div class="card-header border-0" style="height: 100px;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title" style="font-size: 15px">Tổng chi tiêu: <?php echo number_format($result_total[0],0,",",".")?> VNĐ</h3>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title" style="font-size: 15px">Tổng SL đơn: <?php echo $count ?></h3>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title" style="font-size: 15px">Ngày cuối cùng mua hàng: -- </h3>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title" style="font-size: 15px">Tổng SL sản phẩm đã mua: <?php echo $count_hispro?></h3>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title" style="font-size: 15px">Tổng SL sản phẩm hoàn trả: 0</h3>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title" style="font-size: 15px">Công nợ hiện tại: --</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Lịch sử mua hàng</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th style="width: 200px">Mã đơn hàng</th>
                                    <th style="width: 300px">Trạng thái</th>
                                    <th>Thanh toán</th>
                                    <th style="">Giá trị</th>
                                    <th style="width: 190px">Nhân viên xử lí đơn</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while ($result = mysqli_fetch_array($db_history)) {
                                    $getstaff = "SELECT * FROM staffs WHERE idStaffs = '".$result["idStaffs"]."'";
                                    $db_staff = mysqli_query($conn,$getstaff);
                                    $namestaff = mysqli_fetch_array($db_staff);
                                ?>
                                    <tr>
                                        <td><?php echo $result["idOrders"]?></td>
                                        <?php
                                        if($result["Status"]=="Đã tiếp nhận") {
                                        ?>
                                        <td><p class="badge bg-danger" style="font-size: 15px"><?php echo $result["Status"]?></p></td>
                                        <?php }else {?>
                                            <td><p style="background: #E7FBE3;width: 110px; color: #0DB473; border-radius: 20px; padding-left: 16px;"><?php echo $result["Status"]?></p></td>
                                        <?php }?>
                                        <td style="margin-left: 50px;">
                                            <?php
                                                if($result["Status"]=="Đã tiếp nhận") {
                                            ?>
                                            <span><i class="far fa-circle"></i></span>
                                            <?php }else {?>
                                            <span><i class="fas fa-circle"></i></span>
                                                <?php }?>
                                        </td>
                                        <td ><?php echo number_format($result["Total"],0,",",".") ?></td>
                                        <td style="text-align: center"><?php echo $namestaff["Name"]?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php
include ('../admin/layoutAdmin/footer.php')
?>

