<?php
include ('../layout/header.php')
?>
        <!--================End Main Header Area =================-->
<?php
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page-1) * $item_per_page;
    $dbdata = "SELECT * FROM courses ORDER BY idCourses DESC LIMIT ".$item_per_page." OFFSET ".$offset;
    $query = mysqli_query($conn,$dbdata);

    $total = mysqli_query($conn,"SELECT * FROM courses");
    $total = $total->num_rows;
    $totalpage = ceil($total / $item_per_page);
?>
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Tất cả khóa học</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="service.html">Full Course</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
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
        			</div>
       				<div class="row">
                        <?php
                            while ($dbdata = mysqli_fetch_array($query)) {
                        ?>
       					<div class="col-lg-6">
       						<div class="discover_item_inner">
       							<div class="discover_item">
                                    <a href="../page/course-detail.php?idCourses=<?php echo $dbdata["idCourses"]?>"><h4><?php echo $dbdata["NameCourses"]?></h4></a>
									<p><?php echo $dbdata["TitleCourses"]?></p>
                                    <p><span><?=number_format($dbdata["Price"],0,",",".")?> VNĐ</span></p>
								</div>
       						</div>
       					</div>
       					<?php }?>
       				</div>
					   <div class="product_pagination">
						<div class="left_btn">
							<a href="#"><i class="lnr lnr-arrow-left"></i> New posts</a>
						</div>
						<div class="middle_list">
							<nav aria-label="Page navigation example">
								<ul class="pagination">
                                <?php for($num = 1 ; $num<= $totalpage; $num++){ ?>
                                    <li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
                                <?php } ?>
								</ul>
							</nav>
						</div>
						<div class="right_btn"><a href="#">Older posts <i class="lnr lnr-arrow-right"></i></a></div>
					</div>	
        		</div>
        	</div>
			
        </section>
		
        <!--================Service Offer Area =================-->

        <!--================End Service Offer Area =================-->
        
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
<?php
include ('../layout/footer.php')
?>
