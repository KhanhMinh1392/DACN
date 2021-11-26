<?php
include ('../layout/header.php')
?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Courses Cart</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="cart.html">Courses Cart</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Cart Table Area =================-->
        <section class="cart_table_area p_100">
        	<div class="container">
                <?php
                    if(empty($_SESSION["khoahoc"])) {
                ?>
                    <img src="../img/empty-cart.png" alt="" style="margin-left: 29%;">
                    <br>
                    <a class="pest_btn" href="../page/shop.php" style="margin-left: 45%; margin-top: 25px; background: #f195b2">Tiếp tục mua</a>
                <?php }else {?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã</th>
                                        <th scope="col">Tên khóa học</th>
                                        <th scope="col" style="width: 200px">Học phí</th>
                                        <th scope="col" style="width: 100px">SL</th>
                                        <th scope="col" style="width: 200px">Tổng</th>
                                        <th scope="col" style="width: 130px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $number=0;
                                $total=0;
                                $count = 0;
                                $tongtien=0;
                                $giohang=$_SESSION["khoahoc"];
                                foreach ($giohang as $key=> $value){
                                    $total_quantity = $value["number"];
                                    $count += $total_quantity;
                                    ?>
                                    <tr>
<!--                                        <td>-->
<!--                                            <img src="../img/cake-feature/--><?php //echo $value["image"]?><!--" alt="" style="width: 150px">-->
<!--                                        </td>-->
                                        <td><?php echo $value["makh"]?></td>
                                        <td><?php echo $value["namekh"]?></td>
                                        <td><?=number_format($value["price"],0,",",".")?> VNĐ</td>
                                        <td>
                                            <input type="number" id="num_<?php echo $key?>" min="1" max="50" value="<?php echo $value["number"]?>" onclick="UpdateCart(<?php echo $key?>)" disabled>
                                        </td>
                                        <td><?php
                                            $total = $value["number"] * $value["price"];
                                            $tongtien += $total;
                                            echo number_format($total,0,",",".")
                                            ?> VNĐ</td>
                                        <td><i class="fa fa-times" onclick="DeleteCart(<?php echo $key?>)" style="cursor: pointer"></i></td>
                                    </tr>
                                <?php }?>
                                    <tr>
                                        <td>
                                            <form class="form-inline">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Coupon code">
                                                </div>
                                                <button type="submit" class="btn">Apply Coupon</button>
                                            </form>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><a class="pest_btn" href="../page/courses.php">Tiếp tục mua</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row cart_total_inner">
                            <div class="col-lg-7"></div>
                            <div class="col-lg-5">
                                <div class="cart_total_text">
                                    <div class="cart_head">
                                        Tổng tiền
                                    </div>
                                    <div class="sub_total">
                                        <h5>Tổng số lượng
                                            <span>
                                                <?php echo $count?>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="total">
                                        <h4>Tổng hóa đơn <span><?php echo number_format($tongtien,0,",",".")?> VNĐ</span> </h4>
                                    </div>
                                    <div class="cart_footer">
                                        <?php if(isset($_SESSION["username"])){?>
                                            <a class="pest_btn" href="checkoutCourse.php">Thanh toán</a>
                                        <?php }else{?>
                                                <div style="float: right; margin: 10px 12px">
                                                    <span>Bạn cần đăng nhập để đặt hàng!!</span>
                                                </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }?>
        	</div>
        </section>
        <!--================End Cart Table Area =================-->
        
        <!--================Newsletter Area =================-->
<?php
include ('../layout/footer.php')
?>
