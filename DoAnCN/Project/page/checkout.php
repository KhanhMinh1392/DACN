<?php
include ('../layout/header.php')
?>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
?>
<?php
    $getid = "SELECT idAccounts FROM accounts WHERE Username = '".$_SESSION["username"]."'";
    $data = mysqli_query($conn,$getid);
    $sql = mysqli_fetch_array($data);
?>        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Thanh toán</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="checkout.html">Thanh toán</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Billing Details Area =================-->
        <?php
            if(isset($_SESSION["username"])) {
                $laythanhvien = "SELECT * FROM accounts WHERE Username='" . $_SESSION["username"] . "'";
                $truyvan = mysqli_query($conn, $laythanhvien);
                $cottv = mysqli_fetch_array($truyvan);
        ?>
        <section class="billing_details_area p_100">
            <div class="container">
                <?php
                    if(!isset($_SESSION["username"])) {
                ?>
                <div class="return_option">
                	<h4>Returning customer? <a href="login.php">Click here to login</a></h4>
                </div>
                <?php }?>
                <div class="row">
                	<div class="col-lg-7">
               	    	<div class="main_title">
               	    		<h2>Thông tin hóa đơn</h2>
               	    	</div>
                		<div class="billing_form_area">
                			<form class="billing_form row" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="contactForm" novalidate="novalidate">
								<div class="form-group col-md-6">
								    <label for="first">Họ và tên *</label>
									<input type="text" class="form-control" id="name" name="name" value="<?php echo $cottv["NameCustomer"]?>" placeholder="Họ và tên" style="color: black">
								</div>
								<div class="form-group col-md-6">
								    <label for="last">Email *</label>
									<input type="text" class="form-control" id="email" name="email" value="<?php echo $cottv["Email"]?>" placeholder="Email" style="color: black">
								</div>
                                <div class="form-group col-md-6">
                                    <label for="zip">Số điện thoại *</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $cottv["Phone"]?>" placeholder="Số điện thoại" style="color: black">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last">Ngày đặt *</label>
                                    <input type="text" class="form-control" id="email" name="date" value="<?php echo date("d/m/Y"); ?>" disabled >
                                </div>
								<div class="form-group col-md-12">
								    <label for="address">Địa chỉ *</label>
									<input type="text" class="form-control" id="address" name="address" value="<?php echo $cottv["Address"]?>" placeholder="Địa chỉ" style="color: black">
								</div>
                                <?php
                                    $sql_thanhpho = mysqli_query($conn,"SELECT * FROM pvs_tinhthanhpho ORDER BY matp ASC");
                                ?>
                                <div class="form-group col-md-6">
                                    <label for="state1">Tỉnh/ Thành phố</label>
                                    <select class="product_select city" id="state1" name="city">
                                        <?php
                                            while ($rows_thanhpho = mysqli_fetch_array($sql_thanhpho)){
                                                ?>
                                                <option style="height: 100px" value="<?php echo $rows_thanhpho["matp"]?>"><?php echo $rows_thanhpho["name_city"]?></option>
                                        <?php }?>
                                    </select>
                                </div>
								<div class="form-group col-md-6">
								    <label for="city">Quận/ Huyện</label>
                                    <select class=" tinh" id="state1" name="districts" style="color: black;border: solid 1px #e8e8e8;line-height: 40px; width: 320px; height: 40px; color: #cccc;font-size: 15px">

                                    </select>
								</div>

                                <div class="form-group col-md-12">
                                    <label for="">Ghi chú</label>
                                    <textarea class="form-control" name="message" rows="1" placeholder="Wrtie message" style="height: 100px; color: black"></textarea>
                                </div>
								<div class="select_check col-md-12">
									<div class="creat_account">
										<input type="checkbox" id="f-option" name="selector">
										<label for="f-option">Create an account?</label>
										<div class="check"></div>
									</div>
								</div>
                                <button type="submit" value="submit" name="order" class="btn pest_btn" style="margin-left: 15px">Thanh Toán</button>
							</form>
                		</div>
                	</div>
                	<div class="col-lg-5">
                		<div class="order_box_price">
                			<div class="main_title">
                				<h2>Hóa đơn mua</h2>
                			</div>
							<div class="payment_list">
								<div class="price_single_cost">
                                    <h5> Sản phẩm <span>Tổng</span></h5>
                                    <hr>
                                    <?php
                                    $number=0;
                                    $total=0;
                                    $tongtien=0;
                                    $giohang=$_SESSION["giohang"];
                                    foreach ($giohang as $key=> $value){?>
									<h5 style="text-transform: none">
                                        <?php echo $value["name"]?> (<?php echo $value["number"]?>)
                                        <span>
                                            <?php
                                            $total = $value["number"] * $value["price"];
                                            $tongtien += $total;
                                            echo number_format($total,0,",",".")
                                            ?> VNĐ
                                        </span>
                                    </h5>
                                    <?php }?>
                                    <hr>
									<h4>Tổng bill <span><?php echo number_format($tongtien,0,",",".")?> VNĐ</span></h4>
									<h3>Tổng tiền: <span><?php echo number_format($tongtien,0,",",".")?> VNĐ</span></h3>
								</div>
<!--								<div id="accordion" class="accordion_area">-->
<!--									<div class="card">-->
<!--										<div class="card-header" id="headingOne">-->
<!--											<h5 class="mb-0">-->
<!--												<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">-->
<!--												Direct Bank Transfer-->
<!--												</button>-->
<!--											</h5>-->
<!--										</div>-->
<!--										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">-->
<!--											<div class="card-body">-->
<!--											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--									<div class="card">-->
<!--										<div class="card-header" id="headingTwo">-->
<!--											<h5 class="mb-0">-->
<!--												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">-->
<!--												Check Payment-->
<!--												</button>-->
<!--											</h5>-->
<!--										</div>-->
<!--										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">-->
<!--											<div class="card-body">-->
<!--											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--									<div class="card">-->
<!--										<div class="card-header" id="headingThree">-->
<!--											<h5 class="mb-0">-->
<!--												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">-->
<!--												Paypal-->
<!--												<img src="img/checkout-card.png" alt="">-->
<!--												</button>-->
<!--												<a href="#">What is PayPal?</a>-->
<!--											</h5>-->
<!--										</div>-->
<!--										<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">-->
<!--											<div class="card-body">-->
<!--											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
                                <a class="pest_btn" href="../page/cart.php">Quay lại giỏ hàng</a>
							</div>
						</div>
                	</div>
                </div>
            </div>
        </section>
<?php }
    if(isset($_POST["order"])){
        if(isset($_SESSION["giohang"])){
            $idAccounts = $sql["idAccounts"];
            $trangthai = "Đã tiếp nhận";
            $hoten = $_POST["name"];
            $noigiao = $_POST["address"];
            $ngaydat = date("Y-m-d");
            $dienthoai=$_POST["phone"];
            $ghichu=$_POST["message"];
            $district = $_POST["districts"];
            $city = $_POST["city"];
            $themdondat = "INSERT INTO orders(idAccounts,idStaffs,Status,Address,Districts,City,Dateorders,Phone,Notes,NameCustomer,Total) VALUES ('" .$idAccounts . "','5','" . $trangthai . "','" . $noigiao . "','" .$district. "','" .$city. "','" . $ngaydat . "','".$dienthoai."','".$ghichu."','".$hoten."','".$tongtien."')";
            if (mysqli_query($conn, $themdondat)) {
                $madondat = 0;
                $laydon = "SELECT * FROM orders ORDER BY idOrders";
                $truyvanlaydondat = mysqli_query($conn, $laydon);
                while ($cotDD = mysqli_fetch_array($truyvanlaydondat)) {
                    $madondat = $cotDD["idOrders"];
                }
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngaydat = date("d-m-Y H:i:s");
                $content.="<h4 style='margin: 10px 0;font-size: 18px;color: black'>Đơn Hàng Của Bạn($ngaydat)</h4>";

                $content.="<table width='500px' >";
                $content.="<tr><th>#</th><th>Tên sản phẩm</th><th>Đơn giá</th><th>Số lượng</th><th>Tổng</th></tr>";
                $i=0;
                foreach ($_SESSION["giohang"] as $key=> $value) {
                    $masp = $value["masp"];
                    $number = $value["number"];
                    $price = $value["price"];
                    $total = $value["number"] * $value["price"];
                    $price_mail = number_format($price,0,",",".");
                    $total_mail = number_format($total,0,",",".");
                    $ngaydat = date("d-m-Y H:i:s");
                    $i++;

                    $themctdd = "INSERT INTO detailorders VALUES ('".$madondat."','".$masp."','".$number."','".$total."')";
                    mysqli_query($conn, $themctdd);
                    //==========================Trừ số lượng tồn ==========================================
                    $getcount = "SELECT * FROM detailorders WHERE IdProducts = '".$masp."'";
                    $get_db = mysqli_fetch_array(mysqli_query($conn, $getcount));

                    $product = "SELECT * FROM products WHERE IdProducts = '".$masp."'";
                    $getsl = mysqli_fetch_array(mysqli_query($conn, $product));

                    $soluongton = $getsl["Quantity"] - $get_db["Quantitydetail"];
                    if($soluongton==0) {
                        $soldout = "UPDATE products SET idStatus = '2',Quantity = '".$soluongton."' WHERE IdProducts = '".$masp."'";
                        $query_soldout=mysqli_query($conn,$soldout);
                    } else {
                        $query = "UPDATE products SET Quantity = '".$soluongton."' WHERE IdProducts = '".$masp."'";
                        $queryupdate=mysqli_query($conn,$query);
                    }
                    //=======================================================================================

                    $content.="<tr><td>$i</td><td style='text-align: center'>".$value["name"]."</td><td style='text-align: center'>$price_mail</td><td style='text-align: center'>$number</td><td style='text-align: right'>$total_mail VNĐ</td></tr>";
                }
                $sum_price = number_format($tongtien,0,",",".");
                $content.="<tr><th></th><th></th><th></th><th><hr></th><th><hr></th></tr>";
                $content.="<tr><th></th><th></th><th></th><th>Tổng tiền: </th><th style='text-align: right'>$sum_price VNĐ</th></tr>";
                $content.="<table>";

                unset($_SESSION["giohang"]);
                echo "<script>alert('Đặt hàng thành công');location='shop.php';</script>";
            }
            else {
                echo "<script>alert('Đã xảy ra lỗi');</script>";
            }
        }
        else {
            echo "<script>alert('Giỏ hàng trống');</script>";
        }
        include ('../PHPMAILER/lib/PHPMailer.php');
        include ('../PHPMAILER/lib/SMTP.php');
        include ('../PHPMAILER/lib/Exception.php');

        $mail = new PHPMailer(true);
        try{
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'minhkhanh99312@gmail.com'; //SMTP username
            $mail->Password   = 'minhkhanh1392';
            $mail->SMTPSecure = 'tls';
            $mail->CharSet = 'UTF-8';
            $mail->Port       = 587;
            $sendmail= $_POST["email"];
            $fullname=$_POST["hoten"];

            $mail->setFrom('minhkhanh99312@gmail.com', 'Shop Cake');
            $mail->addAddress($sendmail, $fullname);
            $mail->isHTML(true);  //Set email format to HTML
            $mail->Subject = 'Xác nhận thông tin đơn hàng Shop Cake';
            $mail->Body    = $content;
            $mail->send();
            echo 'Đã gửi đơn hàng';
        } catch (Exception $e) {
            echo "Lỗi gửi mail: {$mail->ErrorInfo}";
        }
    }
    ?>
<?php
include ('../layout/footer.php')
?>