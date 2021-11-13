<?php
include ('../layout/header.php')
?>
<?php
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 12;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page-1) * $item_per_page;
    $dbdata = "SELECT * FROM products ORDER BY IdProducts ASC LIMIT ".$item_per_page." OFFSET ".$offset;
    $query = mysqli_query($conn,$dbdata);

    $total = mysqli_query($conn,"SELECT * FROM products");
    $total = $total->num_rows;
    $totalpage = ceil($total / $item_per_page);
?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Our Cakes</h3>
        			<ul>
        				<li><a href="../page/index.php">Home</a></li>
        				<li><a href="../page/cake.php">Cake</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Blog Main Area =================-->
        <section class="our_cakes_area p_100">
        	<div class="container">
        		<div class="main_title">
        			<h2>Our Cakes</h2>
        			<h5>Các chiếc bánh được yêu thích nhất</h5>
        		</div>
        		<div class="cake_feature_row row">
                    <?php
                        while ($row = mysqli_fetch_array($query)){
                    ?>
					<div class="col-lg-3 col-md-4 col-6">
						<div class="cake_feature_item">
                            <a href="../page/product-details.php?Masp=<?php echo $row["IdProducts"]?>">
                                <div class="cake_img">
                                    <img src="../img/cake-feature/<?php echo $row["Images"]?>" alt="">
                                </div>
                                <div class="cake_text">
                                    <input type="number" value="1" id="quantity" min="1" max="10" hidden>
                                    <h4 style="width: 160px"><?=number_format($row["Price"],0,",",".")?> VNĐ</h4>
                                    <h3><?php echo $row["Nameproducts"]?></h3>
                                    <a class="pest_btn" href="" onclick="AddCart(<?php echo $row["IdProducts"];?>)">Thêm vào giỏ</a>
                                </div>
                            </a>
						</div>
					</div>
                    <?php
                        }
                    ?>
				</div>
        	</div>
        </section>
        <!--================End Blog Main Area =================-->
        
        <!--================Special Recipe Area =================-->
<?php
include ('../layout/footer.php')
?>
