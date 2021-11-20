<?php
include ('../layout/header.php')
?>
<?php
    $getcourse = "SELECT * FROM courses LIMIT 6";
    $query_get = mysqli_query($conn,$getcourse);

?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Course</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="service.html">Course</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Service Offer Area =================-->
        <section class="service_offer_area p_100">
        	<div class="container">
        		<div class="main_title">
        			<h2>Các loại bánh có thể làm tại nhà</h2>
        		</div>
        		<div class="row service_main_item_inner">
        			<div class="col-lg-4 col-sm-6">
        				<div class="service_m_item">
        					<div class="service_img_inner">
								<div class="service_img">
									<img class="rounded-circle" src="../img/service/service-1.png" alt="">
								</div>
        					</div>
        					<div class="service_text">
        						<a href="#"><h4>Valentines Day Cakes</h4></a>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4 col-sm-6">
        				<div class="service_m_item">
        					<div class="service_img_inner">
								<div class="service_img">
									<img class="rounded-circle" src="../img/service/service-2.png" alt="">
								</div>
        					</div>
        					<div class="service_text">
        						<a href="#"><h4>Valentines Day Cakes</h4></a>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4 col-sm-6">
        				<div class="service_m_item">
        					<div class="service_img_inner">
								<div class="service_img">
									<img class="rounded-circle" src="../img/service/service-3.png" alt="">
								</div>
        					</div>
        					<div class="service_text">
        						<a href="#"><h4>Valentines Day Cakes</h4></a>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4 col-sm-6">
        				<div class="service_m_item">
        					<div class="service_img_inner">
								<div class="service_img">
									<img class="rounded-circle" src="../img/service/service-4.png" alt="">
								</div>
        					</div>
        					<div class="service_text">
        						<a href="#"><h4>Valentines Day Cakes</h4></a>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4 col-sm-6">
        				<div class="service_m_item">
        					<div class="service_img_inner">
								<div class="service_img">
									<img class="rounded-circle" src="../img/service/service-5.png" alt="">
								</div>
        					</div>
        					<div class="service_text">
        						<a href="#"><h4>Valentines Day Cakes</h4></a>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4 col-sm-6">
        				<div class="service_m_item">
        					<div class="service_img_inner">
								<div class="service_img">
									<img class="rounded-circle" src="../img/service/service-6.png" alt="">
								</div>
        					</div>
        					<div class="service_text">
        						<a href="#"><h4>Valentines Day Cakes</h4></a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Service Offer Area =================-->
        
        <!--================Special Recipe Area =================-->
		<section class="special_recipe_area">
        	<div class="container">
        		<div class="special_recipe_slider owl-carousel">
        			<div class="item">
        				<div class="media">
        					<div class="d-flex">
        						<img src="../img/recipe/recipe-1.png" alt="">
        					</div>
        					<div class="media-body">
        						<h4>Công thức đặc biệt</h4>
        						<p>Bởi vì, để tôi có thể coi thường, bất kỳ ai trong chúng ta thực hiện bất kỳ bài tập thể dục nặng nhọc nào, ngoại trừ một số bài tập có thể có lợi, nhưng sức mạnh của cơ thể có thể tương đương với người đó.</p>
        						<a class="w_view_btn" href="#">Chi tiết</a>
        					</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="media">
        					<div class="d-flex">
        						<img src="../img/recipe/recipe-1.png" alt="">
        					</div>
        					<div class="media-body">
        						<h4>Công thức đặc biệt</h4>
        						<p>Bởi vì, để tôi có thể coi thường, bất kỳ ai trong chúng ta thực hiện bất kỳ bài tập thể dục nặng nhọc nào, ngoại trừ một số bài tập có thể có lợi, nhưng sức mạnh của cơ thể có thể tương đương với người đó.</p>
        						<a class="w_view_btn" href="#">Chi tiết</a>
        					</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="media">
        					<div class="d-flex">
        						<img src="../img/recipe/recipe-1.png" alt="">
        					</div>
        					<div class="media-body">
        						<h4>Công thức đặc biệt</h4>
        						<p>Bởi vì, để tôi có thể coi thường, bất kỳ ai trong chúng ta thực hiện bất kỳ bài tập thể dục nặng nhọc nào, ngoại trừ một số bài tập có thể có lợi, nhưng sức mạnh của cơ thể có thể tương đương với người đó.</p>
        						<a class="w_view_btn" href="#">Chi tiết</a>
        					</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="media">
        					<div class="d-flex">
        						<img src="../img/recipe/recipe-1.png" alt="">
        					</div>
        					<div class="media-body">
        						<h4>Công thức đặc biệt</h4>
        						<p>Bởi vì, để tôi có thể coi thường, bất kỳ ai trong chúng ta thực hiện bất kỳ bài tập thể dục nặng nhọc nào, ngoại trừ một số bài tập có thể có lợi, nhưng sức mạnh của cơ thể có thể tương đương với người đó.</p>
        						<a class="w_view_btn" href="#">Chi tiết</a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Special Recipe Area =================-->
        
        <!--================Discover Menu Area =================-->
        <section class="discover_menu_area service_menu">
        	<div class="discover_menu_inner">
        		<div class="container">
        			<div class="s_dis_title">
        				<div class="float-left">
        					<div class="main_title">
								<h2>Khóa Học Làm Bánh</h2>
								<h5>Các khóa học làm bánh</h5>
							</div>
        				</div>
        				<div class="float-right">
        					<a class="pest_w_btn" href="allcourses.php">Xem Tất Cả</a>
        				</div>
        			</div>
       				<div class="row">
                        <?php
                            while ($dbdata = mysqli_fetch_array($query_get)) {
                        ?>
       					<div class="col-lg-6" style="margin-bottom: 20px">
       						<div class="discover_item_inner">
       							<div class="discover_item">
                                    <a href="../page/course-detail.php?idCourses=<?php echo $dbdata["idCourses"]?>"><h4><?php echo $dbdata["NameCourses"]?></h4></a>
									<p><?php echo $dbdata["TitleCourses"]?></p>
                                    <p><span><?=number_format($dbdata["Price"],0,",",".")?> VNĐ</span></p>
								</div>
       						</div>
       					</div>
                        <?php }?>
<!--       					<div class="col-lg-6">-->
<!--       						<div class="discover_item_inner">-->
<!--       							<div class="discover_item">-->
<!--									<h4>Bread </h4>-->
<!--									<p>Khóa học hướng dẫn làm bánh tại nhà<span>1.300.000VNĐ</span></p>-->
<!--									<li class="dropdown submenu" style="list-style-type: none;">-->
<!--										<a class="dropdown-toggle cource" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: black;" >Khóa Học-->
<!--										</a>-->
<!--                                        <ul class="dropdown-menu subnav" style="padding: 10px">-->
<!--                                            <li class="item">-->
<!--                                                <a href="">Chuẩn bị nguyên liệu</a>-->
<!--                                                <div class="d-flex" style="float: right; margin-left: 50px">-->
<!--                                                    <a class="d-flex popup-youtube" href="https://www.youtube.com/watch?v=dFTNHTxd394"><i class="flaticon-play-button"></i></a>-->
<!--                                                </div>-->
<!--                                            </li>-->
<!--                                            <li class="item">-->
<!--                                                <a href="">Nhồi bột</a>-->
<!--                                                <div class="d-flex" style="float: right;">-->
<!--                                                    <a class="d-flex popup-youtube" href="https://www.youtube.com/watch?v=dFTNHTxd394"><i class="flaticon-play-button"></i></a>-->
<!--                                                </div>-->
<!--                                            </li>-->
<!--                                            <li class="item">-->
<!--                                                <a href="">Để bột tạo hình</a>-->
<!--                                                <div class="d-flex" style="float: right;">-->
<!--                                                    <a class="d-flex popup-youtube" href="https://www.youtube.com/watch?v=dFTNHTxd394"><i class="flaticon-play-button"></i></a>-->
<!--                                                </div>-->
<!--                                            </li>-->
<!--                                            <li class="item">-->
<!--                                                <a href="">Nướng bánh</a>-->
<!--                                                <div class="d-flex" style="float: right;">-->
<!--                                                    <a class="d-flex popup-youtube" href="https://www.youtube.com/watch?v=dFTNHTxd394"><i class="flaticon-play-button"></i></a>-->
<!--                                                </div>-->
<!--                                            </li>-->
<!--                                        </ul>-->
<!--									</li>-->
<!--								</div>-->
<!--       						</div>-->
<!--       					</div>-->
       				</div>
        		</div>
        	</div>
        </section>
        <!--================End Discover Menu Area =================-->
        
        <!--================Bakery Video Area =================-->
<?php
include ('../layout/footer.php')
?>
