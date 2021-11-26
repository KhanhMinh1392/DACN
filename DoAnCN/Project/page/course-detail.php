<?php
include ('../layout/header.php')
?>
<?php
    if(!isset($_GET["idCourses"]))
        header("location:courses.php");
    $getCourses = "SELECT * FROM courses WHERE idCourses = '".$_GET["idCourses"]."'";
    $query_courses = mysqli_query($conn,$getCourses);
    $db_course = mysqli_fetch_array($query_courses);

    $getDetail = "SELECT * FROM detailcourses WHERE idCourses = '".$_GET["idCourses"]."'";
    $query_detail = mysqli_query($conn,$getDetail);

    $getid = "SELECT * FROM accounts WHERE Username = '".$_SESSION["username"]."'";
    $data = mysqli_query($conn,$getid);
    $sql = mysqli_fetch_array($data);

    $getcount = "SELECT * FROM comment_course WHERE idCourses = '".$_GET["idCourses"]."'";
    $db = mysqli_query($conn,$getcount);
    $count = mysqli_num_rows($db);
?>
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Chi tiết khóa học</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="product-details.html">Courses Detail</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        <!--================Product Details Area =================-->
        <section class="product_details_area p_100">
        	<div class="container">
        		<div class="row product_d_price">
        			<div class="col-lg-6" style="position: relative">
                        <div class="product_img">
                            <iframe width="560" height="315" src="<?php echo $db_course["Link"]?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
        			</div>
        			<div class="col-lg-6">
        				<div class="product_details_text">
        					<h4><?php echo $db_course["NameCourses"]?>"</h4>
        					<p style="text-align: justify">
                                Thời gian bắt đầu:
                                <?php
                                $datest = date_create($db_course["TimeStart"]);
                                echo date_format($datest, "d/m/Y"); ?><br>
                                Thời gian kết thúc: <?php
                                $dateend = date_create($db_course["TimeEnd"]);
                                echo date_format($dateend, "d/m/Y"); ?> <br>
                                <br>
                                <?php echo $db_course["TitleCourses"]?> <br>

                            </p>
        					<h5>Giá : <span><?=number_format($db_course["Price"],0,",",".")?> VNĐ</span></h5>
                            <a class="pink_more" href="" onclick="AddCartCourse(<?php echo $db_course["idCourses"];?>)">Thêm vào giỏ</a>
                        </div>
        			</div>
        		</div>
                <div class="product_tab_area">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Review (<?php echo $count?>)</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <p style="text-align: justify"><?php echo $db_course["Info"]?></p>
                            <p style="text-align: justify"><?php echo $db_course["Info"]?></p>
                        </div>
                        <?php
                        $laybl="SELECT * FROM comment_course INNER JOIN accounts ON comment_course.idAccounts = accounts.idAccounts WHERE idCourses= '".$db_course["idCourses"]."' ORDER BY idCCourse DESC ";
                        $cotbl=mysqli_query($conn,$laybl);
                        ?>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" >
                            <?php
                            if(mysqli_num_rows($cotbl) > 0) {
                            while ($result = mysqli_fetch_array($cotbl)) {
                            ?>
                            <div class="media" style="max-height: 100px; margin-bottom: 30px">
                                <div class="d-flex">
                                    <img src="../img/userimg/<?php echo $result["Image"]?>" alt="" style="width: 100px;height: 110px;margin-bottom: 30px;border-radius: 50%;">
                                </div>
                                <div class="media-body" style="margin-left: 20px; max-width: 500px"">
                                <h5>
                                    <?php
                                    if($result["NameCustomer"]== "") {
                                        echo $result["Username"];
                                    } else {
                                        echo $result["NameCustomer"];}?>
                                    <span style="float: right; font-size: 15px">
                                                <?php
                                                date_default_timezone_set("Asia/Ho_Chi_Minh");
                                                echo $result["DateCreate"]
                                                ?>
                                            </span>
                                </h5>
                                <div style="border: 1px solid #e2e2e2; border-radius: 2px; padding: 15px">
                                    <?php echo $result["Comments"]?>
                                </div>
                                <?php
                                if(isset($_SESSION["username"]) && $result["Username"] == $_SESSION["username"] ) {
                                    ?>
                                    <a style="font-size: 13px; float: right; cursor: pointer" onclick="XoaBinhLuanKhoahoc(<?php echo $result["idCCourse"];?>,<?php echo $db_course["idCourses"];?>)"><i class="fa fa-trash"></i> Xóa bình luận</a>
                                <?php }?>
                            </div>
                        </div>
                    <?php } } else {?>
                        <h5>Chưa có bình luận</h5>
                    <?php }?>
                        <?php
                        if(isset($_SESSION["username"])) {
                            ?>
                            <form class="row contact_us_form" action="<?php echo $_SERVER["PHP_SELF"]?>?idCourses=<?php echo $db_course['idCourses']?>" method="post" id="contactForm" novalidate="novalidate" style="margin-top: 30px">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="message" cols="50" rows="30" placeholder="Wrtie message" style="height: 100px; border: 1px solid black"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn order_s_btn form-control" style="float: right">Bình luận </button>
                                </div>
                            </form>
                        <?php } else {?>
                            <!--                           <p>Bạn phải đăng nhập mới được cmt</p>-->
                        <?php }?>
                    </div>
                </div>
            </div>
        	</div>
        </section>
        <!--================End Product Details Area =================-->
        <?php
            $sql2 = "SELECT * FROM products ORDER BY IdProducts DESC LIMIT 4";
            $query2 = mysqli_query($conn,$sql2);
        ?>
        <!--================Similar Product Area =================-->
        <section class="similar_product_area p_100">
        	<div class="container">
        		<div class="main_title">
        			<h2>Đề xuất sản phẩm</h2>
        		</div>
                <?php
                $sort = "SELECT * FROM detailorders INNER JOIN products ON detailorders.IdProducts = products.IdProducts GROUP BY detailorders.IdProducts ORDER BY SUM(detailorders.Quantitydetail) DESC LIMIT 10";
                $query_sort = mysqli_query($conn,$sort);
                ?>
                <div class="cake_feature_inner">
                    <div class="cake_feature_slider owl-carousel">
                        <?php
                        while ($dbdata2 = mysqli_fetch_array($query_sort)) {
                            ?>
                            <div class="item">
                                <div class="cake_feature_item">
                                    <a href="../page/product-details.php?Masp=<?php echo $dbdata2["IdProducts"]?>">
                                        <div class="cake_img">
                                            <img src="../img/cake-feature/<?php echo $dbdata2["Images"]?>" alt="">
                                        </div>
                                        <div class="cake_text">
                                            <input type="number" value="1" id="quantity" min="1" max="10" hidden>
                                            <h4 style="width: 160px"><?=number_format($dbdata2["Price"],0,",",".")?> VNĐ</h4>
                                            <h3><?php echo $dbdata2["Nameproducts"]?></h3>
                                            <a class="pest_btn" href="#" onclick="AddCart(<?php echo $dbdata2["IdProducts"];?>)">Thêm vào giỏ</a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                </div>
        	</div>
        </section>
        <!--================Comment =================-->
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $id = $_GET["idCourses"];
                $date= date("Y-m-d");
                $comment = $_POST["message"];
                $idKH = $sql["idAccounts"];
                $insert = "INSERT INTO comment_course(idAccounts,idCourses,Comments,DateCreate) VALUES ('".$idKH."','".$id."','".$comment."','".$date."')";
                if(mysqli_query($conn,$insert)) {
                    echo "<script>window.location='course-detail.php?idCourses=".$id."' </script>";
                } else {
                    echo "<script>alert('Bình luận thất bại')</script>";
                }
            }
        ?>
        <!-- Đánh giá sao -->
        <!--================Newsletter Area =================-->
<?php
include ('../layout/footer.php')
?>
