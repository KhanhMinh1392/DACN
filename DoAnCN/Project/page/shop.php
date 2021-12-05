<?php
include ('../layout/header.php')
?>
<?php
$item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:9;
$current_page = !empty($_GET['page'])?$_GET['page']:1;
$offset = ($current_page-1) * $item_per_page;

error_reporting(0);
$search = isset($_GET["search"])? $_GET["search"] : "" ;
if($search) {
    $get = "WHERE Nameproducts LIKE '%".$search."%' ";
}
if ($search) {
    $dbdata = "SELECT * FROM products WHERE Nameproducts LIKE '%".$search."%' ORDER BY IdProducts ASC LIMIT ".$item_per_page." OFFSET ".$offset;
    $query = mysqli_query($conn,$dbdata);

    $total = mysqli_query($conn,"SELECT * FROM products WHERE Nameproducts LIKE '%".$search."%' ");
} else {
    $dbdata = "SELECT * FROM products ORDER BY IdProducts DESC LIMIT ".$item_per_page." OFFSET ".$offset;
    $query = mysqli_query($conn,$dbdata);

    $total = mysqli_query($conn,"SELECT * FROM products");
}

//    $getData = "SELECT * FROM products WHERE Nameproducts LIKE '%".$_POST["search"]."%' ORDER BY IdProducts ASC LIMIT ".$item_per_page." OFFSET ".$offset;
//    $query = mysqli_query($conn,$getData);
//
//    $total = mysqli_query($conn,"SELECT * FROM products WHERE Nameproducts LIKE '%".$_POST["search"]."%' ORDER BY IdProducts");
$total = $total->num_rows;
$totalpage = ceil($total / $item_per_page);
?>

        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Shop</h3>
        			<ul>
        				<li><a href="../page/index.php">Home</a></li>
        				<li><a href="../page/shop.php">Shop</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Product Area =================-->
        <section class="product_area p_100">
        	<div class="container">
        		<div class="row product_inner_row">
        			<div class="col-lg-9">
        				<div class="row m0 product_task_bar"> 
							<div class="product_task_inner"> 
								<div class="float-left">
									<a class="active" href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-th-list" aria-hidden="true"></i></a>
									<span>Showing 1 - 10 of 55 results</span>
								</div>
								<div class="float-right">
									<h4>Sort by :</h4>
									<select class="short">
										<option data-display="Default">Default</option>
										<option value="1">Default</option>
										<option value="2">Default</option>
										<option value="4">Default</option>
									</select>
								</div>
							</div>
        				</div>
        				<div class="row product_item_inner">
                            <?php
                                 while ($row = mysqli_fetch_array($query)){
                            ?>
        					<div class="col-lg-4 col-md-4 col-6">
        						<div class="cake_feature_item">
                                    <a href="../page/product-details.php?Masp=<?php echo $row["IdProducts"]?>">
									    <div class="cake_img">
										    <img src="../img/cake-feature/<?php echo $row["Images"]?>" alt="">
									    </div>
									    <div class="cake_text">
                                            <input type="number" value="1" id="quantity" min="1" max="10" hidden>
										    <h4 style="min-width: 200px"><?=number_format($row["Price"],0,",",".")?> VNĐ</h4>
										    <h3><?php echo $row["Nameproducts"]?></h3>
                                            <?php if($row["Quantity"] == 0) {?>
                                                <button class="pest_btn" href="" disabled style="border: none">Hết hàng</button>
                                            <?php } else {?>
                                                <a class="pest_btn" href="" onclick="AddCart(<?php echo $row["IdProducts"];?>)" >Thêm vào giỏ</a>
                                            <?php } ?>
									    </div>
                                    </a>
								</div>
        					</div>
                             <?php
                                 }
                            ?>
        				</div>
                        <?php
                            include("../PHPfile/Pagination.php");
                        ?>
        			</div>
        			<div class="col-lg-3">
        				<div class="product_left_sidebar">
        					<aside class="left_sidebar search_widget">
        						<div class="input-group">
                                    <form action="../PHPfile/Search.php" method="get">
                                        <input type="text" class="form-control" name="search" placeholder="Enter Search Keywords">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit"><i class="icon icon-Search"></i></button>
                                        </div>
                                    </form>
								</div>
        					</aside>
        					<aside class="left_sidebar p_catgories_widget">
        						<div class="p_w_title">
        							<h3>Danh Sách Các Loại</h3>
        						</div>
                                <?php
                                    $getType = 'SELECT * FROM genres';
                                    $dbdata = mysqli_query($conn,$getType);

                                    while ($row = mysqli_fetch_array($dbdata)){
                                        //count SL sp
                                        $getcount = "SELECT * FROM products WHERE idType = '".$row["idType"]."'";
                                        $db = mysqli_query($conn,$getcount);
                                        $count = mysqli_num_rows($db);
                                ?>
                                    <ul class="list_style">
                                        <li><a href="../PHPfile/ListGenres.php?loaisp=<?php echo $row["idType"]?>"><?php echo $row["Typename"]?> (<?php echo $count?>)</a></li>
                                    </ul>
                                <?php
                                    }
                                ?>
        					</aside>
        					<aside class="left_sidebar p_price_widget">
        						<div class="p_w_title">
        							<h3>Giá</h3>
        						</div>
        						<div class="filter_price">
									<div id="slider-range"></div>
       								<label for="amount">Giá:</label>
									<input type="text" id="amount" readonly />
       								<a href="#">Filter</a>
        						</div>
        					</aside>
        					<aside class="left_sidebar p_sale_widget">
        						<div class="p_w_title">
        							<h3>Sản Phẩm Bán Chạy</h3>
        						</div>
                                <?php
                                $sort = "SELECT * FROM detailorders INNER JOIN products ON detailorders.IdProducts = products.IdProducts GROUP BY detailorders.IdProducts ORDER BY SUM(detailorders.Quantitydetail) DESC LIMIT 4";
                                $query_sort = mysqli_query($conn,$sort);

                                while ($row_sort = mysqli_fetch_array($query_sort)){
                                ?>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img style="width: 100px" src="../img/cake-feature/<?php echo $row_sort["Images"]?>" alt="">
                                        </div>
                                        <div class="media-body">
                                            <a href="#"><h4><?php echo $row_sort["Nameproducts"]?></h4></a>
<!--                                            <ul class="list_style">-->
<!--                                                <li><a href="#"><i class="fa fa-star-o"></i></a></li>-->
<!--                                                <li><a href="#"><i class="fa fa-star-o"></i></a></li>-->
<!--                                                <li><a href="#"><i class="fa fa-star-o"></i></a></li>-->
<!--                                                <li><a href="#"><i class="fa fa-star-o"></i></a></li>-->
<!--                                                <li><a href="#"><i class="fa fa-star-o"></i></a></li>-->
<!--                                            </ul>-->
                                            <h5><?=number_format($row_sort["Price"],0,",",".")?> VNĐ</h5>
                                        </div>
                                    </div>
                                <?php }?>
        						</div>
        					</aside>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Product Area =================-->

        <!--================Newsletter Area =================-->
<?php
include ('../layout/footer.php')
?>
