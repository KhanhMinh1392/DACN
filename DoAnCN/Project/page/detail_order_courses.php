<?php
include ('../layout/header.php')
?>
<?php

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
                <a href="../page/courseofcustumer.php">&lt; Quay về đơn hàng khóa học</a>
                <div class="main_title">
                    <h2>Chi tiết đơn hàng</h2>
                </div>
                <?php
                $getorders = "SELECT * FROM detailorders_courses WHERE idCOrders = '".$_GET["Ma"]."' ORDER BY idCOrders DESC";
                $orders = mysqli_query($conn,$getorders);
                ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Tên khóa học</th>
                            <th scope="col">Học phí</th>
                            <th scope="col">Xem khóa học</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $row = mysqli_fetch_array($orders);
                        $laybl="SELECT * FROM detailorders_courses INNER JOIN courses ON detailorders_courses.idCourses = courses.idCourses WHERE idCOrders ='".$row["idCOrders"]."' ORDER BY idCOrders DESC ";
                        $cotbl=mysqli_query($conn,$laybl);
                        while ( $result = mysqli_fetch_array($cotbl)){
                            ?>
                            <tr>
                                <td>
                                    <?php echo $result["NameCourses"] ?>
                                </td>
                                <td><?=number_format($result["Price"],0,",",".")?> VNĐ</td>
                                <td>
                                    <div style="background: #E7FBE3;width: 130px; color: #0DB473; border-radius: 20px; padding-left: 12px">
                                        <a href="../page/watchcourse.php?Makh=<?php echo $result["idCourses"]?>">Xem khóa học</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
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
