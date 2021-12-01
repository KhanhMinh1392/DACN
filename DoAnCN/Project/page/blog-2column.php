<?php
include ('../layout/header.php')
?>
<?php
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page-1) * $item_per_page;
    $dbdata = "SELECT * FROM blog ORDER BY IdBlog DESC LIMIT ".$item_per_page." OFFSET ".$offset;
    $query = mysqli_query($conn,$dbdata);

    $total = mysqli_query($conn,"SELECT * FROM blog");
    $total = $total->num_rows;
    $totalpage = ceil($total / $item_per_page);
?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Blog</h3>
        			<ul>
        				<li><a href="../page/index.php">Home</a></li>
        				<li><a href="../page/blog-2column.php">Blog</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Blog Main Area =================-->
        <section class="main_blog_area p_100">
        	<div class="container">
        		<div class="blog_area_inner">
					<div class="main_blog_column row">
						<?php
                            while ($row = mysqli_fetch_array($query)){
                                $getstaff = "SELECT * FROM staffs WHERE idStaffs = '".$row["idStaffs"]."'";
                                $stf = mysqli_query($conn,$getstaff);
                                $namestf = mysqli_fetch_array($stf);
                        ?>
                        <div class="col-lg-6">
							<div class="blog_item">
								<div class="blog_img">
									<img class="img-fluid" src="../img/blog/column/<?php echo $row["Images"]?>" alt="">
								</div>
								<div class="blog_text">
									<div class="blog_time">
										<div class="float-left">
											<a href="#">
                                                <?php
                                                $date=date_create($row["Date"]);
                                                echo date_format($date,"d/m/Y");?>
                                            </a>
										</div>
										<div class="float-right">
											<ul class="list_style">
												<li><a href="#">By :  <?php echo $namestf["NameStaff"]?></a></li>
												<li><a href="#">bekery, sweet</a></li>
												<li><a href="#">Comments: 8</a></li>
											</ul>
										</div>
									</div>
									<a href="#"><h4><?php echo $row["Content"]?></h4></a>
									<p><?php echo $row["DetailContent"]?></p>
									<a class="pink_more" href="#">Read more</a>
								</div>
							</div>
						</div>
                        <?php }?>
					</div>
					<nav aria-label="Page navigation example" class="blog_pagination">
						<ul class="pagination">
                            <?php for($num = 1 ; $num<= $totalpage; $num++){
                                if ($num != $current_page) {
                                    if ($num > $current_page - 3 && $num < $current_page + 3) {?>
                                        <li class="page-item"><a class="page-link active" href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
                                    <?php } } else { ?>
                                    <li class="page-item active"><a class="page-link active" href=""><?=$num?></a></li>
                                <?php } } ?>
						</ul>
					</nav>
        		</div>
        	</div>
        </section>
        <!--================End Blog Main Area =================-->
        
        <!--================Newsletter Area =================-->
<?php
include ('../layout/footer.php')
?>
