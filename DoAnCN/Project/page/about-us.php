<?php
include ('../layout/header.php')
?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>About Us</h3>
        			<ul>
        				<li><a href="#">Home</a></li>
        				<li><a href="#">About Us</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Our Bakery Area =================-->
        <section class="our_bakery_area p_100">
        	<div class="container">
        		<div class="our_bakery_text">
        			<h2>Our Bakery Approach </h2>
        			<h6>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</h6>
        			<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem.</p>
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
        </section>
        <!--================End Our Bakery Area =================-->
        
        <!--================Bakery Video Area =================-->
        <section class="bakery_video_area">
        	<div class="container">
        		<div class="video_inner">
        			<h3>Real Taste</h3>
        			<p>A light, sour wheat dough with roasted walnuts and freshly picked rosemary, thyme, poppy seeds, parsley and sage</p>
        			<div class="media">
        				<div class="d-flex">
        					<a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="flaticon-play-button"></i></a>
        				</div>
        				<div class="media-body">
        					<h5>Watch intro video <br />about us</h5>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Bakery Video Area =================-->
        
        <!--================Our Mission Area =================-->
        <section class="our_mission_area p_100">
        	<div class="container">
        		<div class="row our_mission_inner">
        			<div class="col-lg-3">
        				<div class="single_m_title">
        					<h2>Our Mission</h2>
        				</div>
        			</div>
        			<div class="col-lg-9">
        				<div class="mission_inner_text">
        					<h6>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudan-tium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</h6>
        					<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatu</p>
        					<ul class="nav">
        						<li><a href="#">Custom cakes</a></li>
        						<li><a href="#">Birthday cakes</a></li>
        						<li><a href="#">Wedding cakes</a></li>
        						<li><a href="#">European delicacies</a></li>
        					</ul>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Our Mission Area =================-->
        <?php
        $cmt = "SELECT * FROM comments";
        $query_cmt = mysqli_query($conn,$cmt);

        $laybl="SELECT * FROM comments INNER JOIN accounts ON comments.idAccounts = accounts.idAccounts ORDER BY id_Comment DESC LIMIT 6 ";
        $cotbl=mysqli_query($conn,$laybl);
        ?>
        <!--================Client Says Area =================-->
        <section class="client_says_area p_100">
        	<div class="container">
        		<div class="client_says_inner">
        			<div class="c_says_title">
        				<h2>What Our Client Says</h2>
        			</div>
        			<div class="client_says_slider owl-carousel">
                        <?php
                        while ($comment = mysqli_fetch_array($cotbl)) {
                            ?>
                            <div class="item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="../img/userimg/<?php echo $comment["Image"]?>" alt="" style="width: 100px;border-radius: 50%">
                                        <h3>“</h3>
                                    </div>
                                    <div class="media-body">
                                        <p><?php echo $comment["Title"]?></p>
                                        <h5><?php echo $comment["NameCustomer"]?></h5>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Client Says Area =================-->
        
        <!--================End Client Says Area =================-->
        <section class="our_chef_area p_100">
        	<div class="container">
        		<div class="row our_chef_inner">
        			<div class="col-lg-3">
        				<div class="chef_text_item">
        					<div class="main_title">
								<h2>Our Chefs</h2>
								<p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec odios Suspe ndisse cursus mal suada faci lisis. Lorem ipsum dolor sit ametion.</p>
							</div>
        				</div>
        			</div>
        			<div class="col-lg-3 col-6">
        				<div class="chef_item">
        					<div class="chef_img">
        						<img class="img-fluid" src="../img/chef/chef-1.jpg" alt="">
        					</div>
        					<a href="#"><h4>Michale Joe</h4></a>
        					<h5>Expert in Cake Making</h5>
        				</div>
        			</div>
        			<div class="col-lg-3 col-6">
        				<div class="chef_item">
        					<div class="chef_img">
        						<img class="img-fluid" src="../img/chef/chef-2.jpg" alt="">
        					</div>
        					<a href="#"><h4>Michale Joe</h4></a>
        					<h5>Expert in Cake Making</h5>
        				</div>
        			</div>
        			<div class="col-lg-3 col-6">
        				<div class="chef_item">
        					<div class="chef_img">
        						<img class="img-fluid" src="../img/chef/chef-3.jpg" alt="">
        					</div>
        					<a href="#"><h4>Michale Joe</h4></a>
        					<h5>Expert in Cake Making</h5>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Client Says Area =================-->
        
        <!--================Newsletter Area =================-->
<?php
include ('../layout/footer.php')
?>