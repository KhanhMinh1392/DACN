<?php
    include ("../connect.php");
    $xoabinhluan="DELETE FROM comment_course WHERE idCCourse ='".$_POST["mabinhluan"]."'";

    if(mysqli_query($conn,$xoabinhluan))
        echo "Xoá bình luận thành công";
    else
        echo "Đã xảy ra lỗi";
?>
