<?php
    include ('../layout/header.php')
?>
<?php
    $query = "SELECT * FROM accounts WHERE Username = '".$_SESSION["username"]."'";
    $dbdata = mysqli_query($conn,$query);
    $information = mysqli_fetch_array($dbdata);
?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Thông Tin Khách Hàng</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="faq.html">Info</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Faq Area =================-->
        <section class="faq_area p_100">
        	<div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main_title">
                            <h2>Đơn hàng khóa học</h2>
                        </div>
                        <?php
                        $getorders = "SELECT * FROM order_courses WHERE idAccounts = '".$information["idAccounts"]."' ORDER BY idCOrders DESC";
                        $orders = mysqli_query($conn,$getorders);

                        ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Đơn hàng#</th>
                                    <th scope="col">Ngày mua</th>
                                    <th scope="col">Giá trị đơn hàng</th>
                                    <th scope="col">Xem đơn hàng</th>
                                </tr>
                                </thead>
                                <?php if (mysqli_num_rows($orders) >0) {?>
                                    <tbody>
                                    <?php
                                        while ( $row = mysqli_fetch_array($orders)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row["idCOrders"]?></td>
                                            <td>
                                                <?php
                                                $date=date_create($row["DateCreate"]);
                                                echo date_format($date,"d/m/Y");?>
                                            </td>
                                            <td><?=number_format($row["Total"],0,",",".")?> VNĐ</td>
                                            <td>
                                                <div style="background: #E7FBE3;width: 110px; color: #0DB473; border-radius: 20px; padding-left: 12px">
                                                    <a href="../page/detail_order_courses.php?Ma=<?php echo $row["idCOrders"]?>">Xem chi tiết</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                <?php } else {?>
                                    <tbody>
                                    <tr>
                                        <td>Chưa có đơn hàng</td>
                                    </tr>
                                    </tbody>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>
        	</div>
        </section>
        <!--================End Faq Area =================-->

        
        <!--================Newsletter Area =================-->
<?php
include ('../layout/footer.php')
?>
