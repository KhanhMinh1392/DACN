<?php
    include ('../layout/header.php')
?>
<?php
    if(!isset($_GET["loaisp"]))
        header("location:product-details.php");
?>
<?php
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }
    $rowperpage = 6;
    $perrow = $page * $rowperpage-$rowperpage;

    $sql ="SELECT * FROM products WHERE idType= '".$_GET["loaisp"]."' ORDER BY IdProducts DESC LIMIT $perrow,$rowperpage";
    $query = mysqli_query($conn,$sql);
    $totalrow = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM products WHERE idType= '".$_GET["loaisp"]."'"));
    $totalpage = ceil($totalrow/$rowperpage);
    $listpage = "";
    for($i=1; $i <= $totalpage; $i++){
        if($page == $i){
            $listpage .='<li class="page-item"><a class="page-link active" href="../PHPfile/ListGenres.php?loaisp='.$_GET["loaisp"].'&page='.$i.'">'.$i.'</a></li>';
        }
        else {
            $listpage .= '<li class="page-item"><a class="page-link active" href="../PHPfile/ListGenres.php?loaisp=' . $_GET["loaisp"] . '&page=' . $i . '">' . $i . '</a></li>';
        }
    }
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
                                        <h4 style="width: 160px"><?=number_format($row["Price"],0,",",".")?> VND</h4>
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
                <div class="product_pagination">
                    <div class="left_btn">
                        <a href="#" hidden><i class="lnr lnr-arrow-left"></i> New posts</a>
                    </div>
                    <div class="middle_list">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                    echo $listpage
                                ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="right_btn" hidden><a href="#">Older posts <i class="lnr lnr-arrow-right"></i></a></div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="product_left_sidebar">
                    <aside class="left_sidebar search_widget">
                        <div class="input-group">
                            <form action="../PHPfile/Search.php" method="post">
                                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm">
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
                            <label for="amount">Price range:</label>
                            <input type="text" id="amount" readonly />
                            <a href="#">Filter</a>
                        </div>
                    </aside>
                    <aside class="left_sidebar p_sale_widget">
                        <div class="p_w_title">
                            <h3>Sản Phẩm Bán Chạy</h3>
                        </div>
                        <div class="media">
                            <div class="d-flex">
                                <img src="../img/product/sale-product/s-product-1.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#"><h4>Brown Cake</h4></a>
                                <ul class="list_style">
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                </ul>
                                <h5>350.000VNĐ</h5>
                            </div>
                        </div>
                        <div class="media">
                            <div class="d-flex">
                                <img src="../img/product/sale-product/s-product-2.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#"><h4>Brown Cake</h4></a>
                                <ul class="list_style">
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                </ul>
                                <h5>350.000VNĐ</h5>
                            </div>
                        </div>
                        <div class="media">
                            <div class="d-flex">
                                <img src="../img/product/sale-product/s-product-3.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#"><h4>Brown Cake</h4></a>
                                <ul class="list_style">
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                </ul>
                                <h5>350.000VNĐ</h5>
                            </div>
                        </div>
                        <div class="media">
                            <div class="d-flex">
                                <img src="../img/product/sale-product/s-product-4.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#"><h4>Brown Cake</h4></a>
                                <ul class="list_style">
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                </ul>
                                <h5>350.000VNĐ</h5>
                            </div>
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