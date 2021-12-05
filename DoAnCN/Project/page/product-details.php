<?php
include ('../layout/header.php')
?>
<?php
    if(!isset($_GET["Masp"]))
        header("location:shop-full-width.php");
    $getProducts = "SELECT * FROM products WHERE IdProducts = '".$_GET["Masp"]."'";
    $query = mysqli_query($conn,$getProducts);
    $dbdata = mysqli_fetch_array($query);

    $getid = "SELECT idAccounts FROM accounts WHERE Username = '".$_SESSION["username"]."'";
    $data = mysqli_query($conn,$getid);
    $sql = mysqli_fetch_array($data);

    $getcount = "SELECT id_Comment FROM comments WHERE IdProducts = '".$_GET["Masp"]."'";
    $db = mysqli_query($conn,$getcount);
    $count = mysqli_num_rows($db);
?>
<?php
    $dbdanhgia = "SELECT * FROM reviews WHERE IdProducts = '".$dbdata["IdProducts"]."'";
    $truyvandanhgia = mysqli_query($conn, $dbdanhgia);

    $idaccounts = "";
    $sosao = "0";
    if(isset($_SESSION["username"]))
    {
        $idaccounts = $sql["idAccounts"];
        $layDG_ND = "SELECT * FROM reviews WHERE IdProducts='".$dbdata["IdProducts"]."' and idAccounts='".$idaccounts."'";
        $truyvanND = mysqli_query($conn, $layDG_ND);
        if(mysqli_num_rows($truyvanND) > 0){
            $cotDG = mysqli_fetch_array($truyvanND);
            $sosao = $cotDG["Star"];
        }
    }
?>
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Product Details</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="product-details.html">Product Details</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        <!--================Product Details Area =================-->
        <section class="product_details_area p_100">
        	<div class="container">
                <?php
                    if($dbdata["Quantity"] == 0 && $dbdata["idStatus"] == 2) {
                ?>
        		<div class="row product_d_price">
        			<div class="col-lg-6" style="position: relative">
        				<div class="product_img"><img class="img-fluid" style="width: 1500px;opacity: 0.5" src="../img/cake-feature/<?php echo $dbdata["Images"]?>" alt=""></div>
                        <div class="product_img" style="position: absolute;top: 200px;width: 100%;text-align: center;color: white;font-size: 35px;font-weight: 600"><p style="background: #f195b2;width: 525px;padding: 10px">Hết hàng</p></div>
        			</div>
        			<div class="col-lg-6">
        				<div class="product_details_text">
        					<h4><?php echo $dbdata["Nameproducts"]?></h4>
        					<p style="text-align: justify"><?php echo $dbdata["Detailinfo"]?></p>
        					<h5>Giá : <span><?=number_format($dbdata["Price"],0,",",".")?> VNĐ</span></h5>
                        </div>
        			</div>
        		</div>
                <?php } else {?>
                    <div class="row product_d_price">
                        <div class="col-lg-6" style="position: relative">
                            <div class="product_img"><img class="img-fluid" style="width: 1500px;" src="../img/cake-feature/<?php echo $dbdata["Images"]?>" alt=""></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product_details_text">
                                <h4><?php echo $dbdata["Nameproducts"]?></h4>
                                <ul class="list_style" style="display: flex;width: 400px">
                                    <li onclick="DanhGiaSao(<?php echo $dbdata["IdProducts"];?>, '<?php echo $sql["idAccounts"] ?>', 1)"><a href="#"><i class="fa fa-star sao sao1" data-sao="1"></i></a></li>
                                    <li onclick="DanhGiaSao(<?php echo $dbdata["IdProducts"];?>, '<?php echo $sql["idAccounts"] ?>', 2)"><a href="#"><i class="fa fa-star sao sao2" data-sao="2"></i></a></li>
                                    <li onclick="DanhGiaSao(<?php echo $dbdata["IdProducts"];?>, '<?php echo $sql["idAccounts"] ?>', 3)"><a href="#"><i class="fa fa-star sao sao3" data-sao="3"></i></a></li>
                                    <li onclick="DanhGiaSao(<?php echo $dbdata["IdProducts"];?>, '<?php echo $sql["idAccounts"] ?>', 4)"><a href="#"><i class="fa fa-star sao sao4" data-sao="4"></i></a></li>
                                    <li onclick="DanhGiaSao(<?php echo $dbdata["IdProducts"];?>, '<?php echo $sql["idAccounts"] ?>', 5)"><a href="#"><i class="fa fa-star sao sao5" data-sao="5"></i></a></li>
                                    <span style="margin-left: 10px;margin-top: 2px">(<?php echo mysqli_num_rows($truyvandanhgia)?> Đánh giá)</span>
                                </ul>
                                <br>
                                <div class="fb-like" data-href="https://www.huongnghiepaau.com/hoc-lam-banh/bep-truong-bep-banh" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
                                <p style="text-align: justify"><?php echo $dbdata["Detailinfo"]?></p>
                                <h5>Giá : <span><?=number_format($dbdata["Price"],0,",",".")?> VNĐ</span></h5>
                                <div class="quantity_box">
                                    <label>Số lượng :</label>
                                    <input type="number" value="1" id="quantity" min="1" max="10">
                                </div>
                                <a class="pink_more" href="#" onclick="AddCart(<?php echo $dbdata["IdProducts"];?>)">Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>
                <?php }?>
        		<div class="product_tab_area">
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Bình luận</a>
							<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Review (<?php echo $count ?>)</a>
						</div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							<p style="text-align: justify"><?php echo $dbdata["Info"]?></p>
                            <p style="text-align: justify"><?php echo $dbdata["Info"]?></p>
						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
<!--                            <p style="text-align: justify">--><?php //echo $dbdata["Info"]?><!--</p>-->
<!--                            <p style="text-align: justify">--><?php //echo $dbdata["Info"]?><!--</p>-->
                            <div class="fb-comments" data-href="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fhhsb.vn%2Fposts%2F5410538482294474&show_text=true&width=500" data-width="1000" data-numposts="3"></div>
						</div>
                        <?php
                        $laybl="SELECT * FROM comments INNER JOIN accounts ON comments.idAccounts = accounts.idAccounts WHERE IdProducts='".$dbdata["IdProducts"]."' ORDER BY id_Comment DESC ";
                        $cotbl=mysqli_query($conn,$laybl);
                        ?>
						<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" >
                            <?php
                            if(mysqli_num_rows($cotbl) > 0) {
                            while ($result = mysqli_fetch_array($cotbl)) {
                                ?>
                            <div class="card" style="border: none">
                                <div class="media" style="max-height: 100px; margin-bottom: 30px">
                                    <div class="d-flex">
                                        <img src="../img/userimg/<?php echo $result["Image"]?>" alt="" style="width: 100px;height: 110px;margin-bottom: 30px;border-radius: 50%;">
                                    </div>
                                    <div class="media-body" style="margin-left: 20px; max-width: 1000px"">
                                    <h5>
                                        <?php
                                        if($result["NameCustomer"]== "") {
                                            echo $result["Username"];
                                        } else {
                                            echo $result["NameCustomer"];}?>
                                        <span style="float: right; font-size: 15px">
                                                <?php
                                                date_default_timezone_set("Asia/Ho_Chi_Minh");
                                                $date=date_create($result["Datecomments"]);
                                                echo date_format($date,"d/m/Y");
                                                ?>
                                            </span>
                                    </h5>

                                    <div style="border: 1px solid #e2e2e2; border-radius: 2px; padding: 15px" class="title">
                                        <?php echo $result["Title"]?>
                                    </div>

                                    <?php
                                    if(isset($_SESSION["username"]) && $result["Username"] == $_SESSION["username"] ) {
                                        ?>
                                        <div>
                                            <a style="font-size: 13px; float: right; cursor: pointer" onclick="XoaBinhLuan(<?php echo $result["id_Comment"];?>,<?php echo $dbdata["IdProducts"];?>)"><i class="fa fa-trash"></i> Xóa</a>
                                            <a style="font-size: 13px; float: right; cursor: pointer; margin-right: 10px" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="editcmt"><i class="fa fa-pencil"></i> Chỉnh sửa</a>
                                            <a style="font-size: 13px; float: right; cursor: pointer; margin-right: 10px" onclick="reply(this)"><i class="fa fa-reply"></i> Trả lời</a>
                                        </div>
                                    <?php }?>
                                    <input type="text" id="findcmt" value="<?php echo $result["id_Comment"]?>" hidden>
                                    <input type="text" id="findct" value="<?php echo $result["Title"]?>" hidden>
                                </div>
                            </div>
                            <?php } } else {?>
                                <h5>Chưa có bình luận</h5>
                            <?php }?>
                            <?php
                                if(isset($_SESSION["username"])) {
                            ?>
                            <form class="row contact_us_form" action="<?php echo $_SERVER["PHP_SELF"]?>?Masp=<?php echo $dbdata['IdProducts']?>" method="post" id="contactForm" novalidate="novalidate" style="margin-top: 30px">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="message" rows="1" placeholder="Wrtie message" style="height: 100px; border: 1px solid black"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn order_s_btn form-control" style="float: right">Bình luận</button>
                                </div>
                            </form>
                            <?php } ?>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa bình luận</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Bình luận</label>
                                <input type="text" id="edit" hidden>
                                <input type="text" id="masp" value="<?php echo $_GET["Masp"]?>" hidden>
                                <input type="text" class="form-control" name="txt" id="name" value="" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="btn">Chỉnh sửa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--================Comment =================-->
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $id = $_GET["Masp"];
                $date= date("Y-m-d");
                $title = $_POST["message"];
                $idKH = $sql["idAccounts"];
                $insert = "INSERT INTO comments(IdProducts,Datecomments,Title,idAccounts) VALUES ('".$id."','".$date."','".$title."','.$idKH.')";
                if(mysqli_query($conn,$insert)) {
                    echo "<script>window.location='product-details.php?Masp=".$id."' </script>";
                } else {
                    echo "<script>alert('Bình luận thất bại')</script>";
                }
            }
        ?>
        <!-- Đánh giá sao -->

<script>
    $(document).ready(function () {
        for (i=1;i <= <?php echo $sosao ?>;i++){
             $('.sao'+i).css('color','yellow');
         }
        $('.sao').mouseenter(function () {
             for(i=1;i<=$(this).attr('data-sao');i++){
                $('.sao'+i).addClass('saohover');
            }
        })
        $('.sao').mouseleave(function () {
            $('.sao').removeClass('saohover');
        })
        // $('.editcmt').click(function () {
        //     $('#edit').val($(this).parent().find('#findcmt').val());
        //     $('#name').val($(this).parent().find('#findct').val());
        // })
        $('.editcmt').click(function () {
            $('#edit').val($(this).parent().find("#findcmt").val());
            $('#name').val($(this).parent().find("#findct").val());
        })
    })
</script>
<style>
    .saohover {
        color: yellow;
    }
</style>

<script>
    function reply(caller) {
        $(".reply").insertAfter($(caller));
        $('.reply').show();
    }
</script>
        <!--================Newsletter Area =================-->
<?php
include ('../layout/footer.php')
?>
