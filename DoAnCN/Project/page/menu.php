<?php
include ('../layout/header.php')
?>
<?php
    $getcourse = "SELECT * FROM products LIMIT 12";
    $query_get = mysqli_query($conn,$getcourse);
?>
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Menu</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="menu.html">Menu</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Recipe Menu list Area =================-->
        <section class="price_list_area p_100">
        	<div class="container">
        		<div class="price_list_inner">
        			<div class="single_pest_title">
        				<h2>Danh Sách Giá Các Loại Bánh</h2>
        				<p></p>
        			</div>
       				<div class="row">
                        <?php
                        while ($dbdata = mysqli_fetch_array($query_get)) {
                            ?>
                            <div class="col-lg-6" style="margin-bottom: 20px">
                                <div class="discover_item_inner">
                                    <div class="discover_item">
                                        <a href="../page/product-details.php?Masp=<?php echo $dbdata["IdProducts"]?>"><h4><?php echo $dbdata["Nameproducts"]?></h4></a>
                                        <p>Tất cả những nguyên liệu này sẽ được bọc ngoài bởi lớp glaze rượu rum anh đào</p>
                                        <p><span><?=number_format($dbdata["Price"],0,",",".")?> VNĐ</span></p>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
       				</div>
       				<div class="row our_bakery_image">
						<div class="col-md-4 col-6">
							<img class="img-fluid" src="../img/our-bakery/bakery-1.jpg" alt="">
						</div>
						<div class="col-md-4 col-6">
							<img class="img-fluid" src="../img/our-bakery/bakery-2.jpg" alt="">
						</div>
						<div class="col-md-4 col-6">
							<img class="img-fluid" src="../img/our-bakery/bakery-3.jpg" alt="">
						</div>
					</div>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Newsletter Area =================-->
		<section class="newsletter_area">
        	<div class="container">
        		<div class="row newsletter_inner">
        			<div class="col-lg-6">
        				<div class="news_left_text">
        					<h4>Tham gia danh sách để nhận bản tin của chúng tôi để nhận được tất cả các ưu đãi, chiết khấu mới nhất và các lợi ích khác</h4>
        				</div>
        			</div>
        			<div class="col-lg-6">
        				<div class="newsletter_form">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Enter your email address">
								<div class="input-group-append">
									<button class="btn btn-outline-secondary" type="button">Subscribe Now</button>
								</div>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Newsletter Area =================-->
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
        	<div class="footer_widgets">
        		<div class="container">
        			<div class="row footer_wd_inner">
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_about_widget">
        						<img src="img/footer-logo.png" alt="">
        						<p>Trong những năm trở lại đây, bánh Pháp và Mỹ được xếp vào loại những loại tráng miệng ngon nhất thế giới, các loại bánh ngon đến từ hai đất nước này đang ngày một chiếm gần tình cảm và được giới trẻ Việt Nam ưa chuộng.</p>
        						<ul class="nav">
        							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
        							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
        							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        						</ul>
        					</aside>
        				</div>
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_link_widget">
        						<div class="f_title">
        							<h3>Đường Dẫn Nhanh</h3>
        						</div>
        						<ul class="list_style">
        							<li><a href="#">Tài khoản của bạn</a></li>
        							<li><a href="#">Đơn đặt hàng</a></li>
        							<li><a href="#">Chích sách bảo mật</a></li>
        							<li><a href="#">Điều khoản và điều kiện</a></li>
        						</ul>
        					</aside>
        				</div>
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_link_widget">
        						<div class="f_title">
        							<h3>Thời Gian</h3>
        						</div>
        						<ul class="list_style">
        							<li><a href="#">Mon. : Fri.: 8 am - 8 pm</a></li>
        							<li><a href="#">Sat. : 9am - 4pm</a></li>
        							<li><a href="#">Sun. : Closed</a></li>
        						</ul>
        					</aside>
        				</div>
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_contact_widget">
        						<div class="f_title">
        							<h3>Liên Hệ</h3>
        						</div>
        						<h4>(1800) 574 9687</h4>
        						<p>HUTECH <br />475A Điện Biên Phủ, Phường 25, Bình Thạnh, Thành phố Hồ Chí Minh</p>
        						<h5>cakebakery@contact.co.in</h5>
        					</aside>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="footer_copyright">
        		<div class="container">
        			<div class="copyright_inner">
        				<div class="float-left">
        					<h5><a target="_blank" href="https://www.templatespoint.net"></a></h5>
        				</div>
        				<div class="float-right">
        					<a href="#">Mua Ngay</a>
        				</div>
        			</div>
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        <!--================Search Box Area =================-->
        <div class="search_area zoom-anim-dialog mfp-hide" id="test-search">
            <div class="search_box_inner">
                <h3>Search</h3>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="icon icon-Search"></i></button>
                    </span>
                </div>
            </div>
        </div>
        <!--================End Search Box Area =================-->
        
        
        
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <!-- Extra plugin js -->
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/magnifc-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/datetime-picker/js/moment.min.js"></script>
        <script src="vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        
        <script src="js/theme.js"></script>
    </body>

</html>