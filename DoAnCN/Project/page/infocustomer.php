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
        $query = "UPDATE accounts SET NameCustomer = '".$nameCustomer."',Birthday = '".$birthday."', Phone = '".$number."' WHERE Username = '".$_SESSION["username"]."'";
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
       					<form class="row contact_us_form" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="contactForm" novalidate="novalidate">
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
							</div>
                            <div class="form-group col-md-6">
                                <h7>Số điện thoại</h7>
                                <input type="tel" class="form-control" id="numberCustomer" name="number" value="<?php echo $information["Phone"];?>" placeholder="Số điện thoại">
                            </div>
                            <div class="form-group col-md-6">
                                <h7>Ngày sinh</h7>
                                <input type="date" class="form-control" id="numberCustomer" name="birthday" value="<?php echo $information["Birthday"];?>" placeholder="Số điện thoại">
                            </div>
							<div class="form-group col-md-12">
								<button type="submit" value="submit" class="btn order_s_btn form-control">Update</button>
							</div>
						</form>

       				</div>
       			</div>
        	</div>
        </section>
        <!--================End Contact Form Area =================-->
        
        <!--================End Banner Area =================-->
        <!--================End Banner Area =================-->
        
        <!--================Newsletter Area =================-->
<?php
include ('../layout/footer.php')
?>
