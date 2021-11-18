<?php
include ('../connect.php');

if($_POST["idaccount"] == ""){
    echo "Bạn hãy đăng nhập để đánh giá";
}
else{
    $laydanhgia = "SELECT * FROM reviews WHERE IdProducts='".$_POST["masanpham"]."' and idAccounts='".$_POST["idaccount"]."' ";
    $truyvan = mysqli_query($conn, $laydanhgia);
    if(mysqli_num_rows($truyvan)>0){
        echo "Bạn đã đánh giá sản phẩm này";
    }
    else{
        $themdanhgia = "INSERT INTO reviews(IdProducts,idAccounts,Star) VALUES ('".$_POST["masanpham"]."', '".$_POST["idaccount"]."', '".$_POST["noidung"]."')";
        if(mysqli_query($conn,$themdanhgia))
            echo "Đánh giá sản phẩm thành công";
        else
            echo "Đã xảy ra lỗi";
    }
}
?>
