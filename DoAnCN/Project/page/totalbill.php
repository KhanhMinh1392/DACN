<?php
    include ('connect.php');
    session_start();
    $number=0;
    $total=0;
    $tongtien=0;
    $giohang=$_SESSION["giohang"];
    foreach ($giohang as $key=> $value){
        $total = $value["number"] * $value["price"];
        $tongtien += $total;
    }
    $key=$_POST["id"];
    $query="SELECT * FROM pvs_tinhthanhpho WHERE matp = '".$key."'";
    $layship=mysqli_query($conn,$query);
    $rowship = mysqli_fetch_array($layship);
    if($rowship > 0) {
        $_SESSION["tongbill"] = $tongtien+$rowship["ship"];
        $_SESSION["ship"] = $rowship["ship"];
        ?>
        <span class="tong"><?=number_format($_SESSION["tongbill"],0,",",".")?> VNĐ</span>
<?php }?>
