<?php
include ('../layout/header.php')
?>
<?php
    if(!isset($_SESSION["username"])){
        echo "<script>location = '/index.php'</script>";
    }
    $query = "SELECT * FROM accounts WHERE Username = '".$_SESSION["username"]."'";
    $dbdata = mysqli_query($conn,$query);
    $information = mysqli_fetch_array($dbdata);

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $nameCustomer = $_POST["nameCustomer"];
        $number = $_POST["number"];
        $birthday = $_POST["birthday"];
        $img = $information["Image"];

        if(($_FILES["img"]["name"]!="")) {
            unlink("../img/userimg/".$img);
            $img = $_FILES["img"]['name'];
            move_uploaded_file($_FILES["img"]['tmp_name'],'../img/userimg/'.$img);
        }

        $query = "UPDATE accounts SET NameCustomer = '".$nameCustomer."',Birthday = '".$birthday."',Image = '".$img."', Phone = '".$number."' WHERE Username = '".$_SESSION["username"]."'";
        $queryupdate=mysqli_query($conn,$query);
        if($queryupdate)
            echo "<script>alert('Cập nhật thành công')</script>";
        echo "<script>location='../page/infocustomer.php'</script>";
    }
?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Thông Tin Khách Hàng</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="single-blog.html">Info</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Contact Form Area =================-->
        <section class="contact_form_area p_100">
        	<div class="container">
        		<div class="main_title">
					<h2>Thông Tin Khách Hàng</h2>
				</div>
       			<div class="row">
       				<div class="col-lg-12">
       					<form class="row contact_us_form" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="form-group col-md-12" style="text-align: center">
                                <?php if(empty($information["Image"])) {?>
                                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" style="width: 200px;" class="avatar img-circle img-thumbnail" alt="avatar">
                                    <h6>Upload a different photo...</h6>
                                    <input type="file" name="img" class="file-upload" value="" style="text-align: center;width: 200px">
                                <?php } else {?>
                                    <img src="../img/userimg/<?php echo $information["Image"];?>?>" style="width: 200px;" class="avatar img-circle img-thumbnail" alt="avatar">
                                    <h6>Upload a different photo...</h6>
                                    <input type="file" name="img" class="file-upload" value="<?php echo $information["Image"];?>" style="text-align: center;width: 200px">
                                <?php }?>
                            </div>
                            <div class="form-group col-md-6">
								<h7>Tên Khách Hàng</h7>
								<input type="text" class="form-control" id="nameCustomer" name="nameCustomer" value="<?php echo $information["NameCustomer"];?>" placeholder="Your name">
							</div>
							<div class="form-group col-md-6">
								<h7>Email Khách Hàng</h7>
								<input type="email" class="form-control" id="emailCustomer" name="email" value="<?php echo $information["Email"];?>"  placeholder="Email address" disabled>
							</div>
							<div class="form-group col-md-6">
								<h7>Tài khoản</h7>
								<input type="text" class="form-control" id="userName" value="<?php echo $information["Username"]; ?>" placeholder="Tài khoản" disabled>
							</div>
							<div class="form-group col-md-6">
								<h7>Mật khẩu</h7>
								<input type="password" class="form-control" id="passWord" value="<?php echo $information["Password"]; ?>" placeholder="Mật khẩu" disabled>
                                <a href="" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Đổi mật khẩu</a>
							</div>
                            <div class="form-group col-md-6">
                                <h7>Số điện thoại</h7>
                                <input type="tel" class="form-control" id="numberCustomer" name="number" value="<?php echo $information["Phone"];?>"placeholder="Số điện thoại">
                            </div>
                            <div class="form-group col-md-6">
                                <h7>Ngày sinh</h7>
                                <input type="date" class="form-control" id="numberCustomer" name="birthday" value="<?php echo $information["Birthday"];?>">
                                <a href="../page/courseofcustumer.php">Xem khóa học</a>
                            </div>
							<div class="form-group col-md-12">
								<button type="submit" value="submit" class="btn order_s_btn form-control">Update</button>
							</div>
						</form>
       				</div>
       			</div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="contact_form_area p_100">
                            <div class="main_title">
                                <h2>Đơn hàng</h2>
                            </div>
                            <?php
                                $getorders = "SELECT * FROM orders WHERE idAccounts = '".$information["idAccounts"]."' ORDER BY idOrders DESC";
                                $orders = mysqli_query($conn,$getorders);
                            ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Đơn hàng#</th>
                                        <th scope="col">Ngày đặt</th>
                                        <th scope="col">Ngày nhận</th>
                                        <th scope="col">Giá trị đơn hàng</th>
                                        <th scope="col">Tình trạng đơn hàng</th>
                                    </tr>
                                    </thead>
                                    <?php if (mysqli_num_rows($orders) >0) {?>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($orders)){?>
                                                <tr>
                                                    <td><?php echo $row["idOrders"]?></td>
                                                    <td>
                                                        <?php
                                                        $date=date_create($row["Dateorders"]);
                                                        echo date_format($date,"d/m/Y");?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if($row["Datedeliver"]>0) {
                                                            $date=date_create($row["Datedeliver"]);
                                                            echo date_format($date,"d/m/Y");
                                                        } else {
                                                            echo $row["Datedeliver"];
                                                        }
                                                            ?>
                                                    </td>
                                                    <td><?=number_format($row["Total"],0,",",".")?> VNĐ</td>
                                                    <td>
                                                        <?php
                                                        if($row["Status"] == "Hoàn thành") {
                                                            ?>
                                                            <div style="background: #E7FBE3;width: 120px; color: #0DB473; border-radius: 20px; text-align: center">
                                                                <?php echo $row["Status"]?>
                                                            </div>
                                                        <?php } else if($row["Status"] == "Đã tiếp nhận") {?>
                                                            <div style="background: #fa5e5e;width: 120px; color: white; border-radius: 20px; padding-left: 12px">
                                                                <?php echo $row["Status"]?>
                                                            </div>
                                                        <?php } else {?>
                                                            <div style="background: linear-gradient(66.01deg, #FFAE06 37.34%, #FFBE38 101.09%);width: 120px; color: white; border-radius: 20px; text-align: center">
                                                                <?php echo $row["Status"]?>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                         <?php } ?>
                                    </tbody>
                                    <?php } else {?>
                                        <tbody>
                                            <tr>
                                                <td>Chưa có đơn hàng</td>
                                            </tr>
                                        </tbody>
                                    <?php }?>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
        	</div>
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="../img/logo-2.png" style="margin-left: 135px" alt="">
                        <form action="../PHPfile/Changpass.php" method="post">
                            <input type="hidden" name="callbackSignin" value="<?php echo $_SERVER["PHP_SELF"]?>">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Mật khẩu cũ</label>
                                <input type="password" class="form-control" name="passold" id="recipient-name" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Mật khẩu mới: </label>
                                <input type="password" class="form-control" name="passnew" id="recipient-name" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Confirm mật khẩu: </label>
                                <input type="password" class="form-control" name="confirm" id="recipient-name" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Contact Form Area =================-->

        <!--================End Banner Area =================-->
        <!--================End Banner Area =================-->
        
        <!--================Newsletter Area =================-->
<?php
include ('../layout/footer.php')
?>
