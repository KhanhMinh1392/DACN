<?php
include ('../page/connect.php');
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $email=$_POST["email"];
    $kttk="SELECT * FROM accounts WHERE Email = '".$email."'" ;
    $truyvantk=mysqli_query($conn,$kttk);
    if(mysqli_num_rows($truyvantk)>0)
    {
//              error_reporting(0);
        $cot=mysqli_fetch_array($truyvantk);
        if(mail($cot["Email"],"Lấy lại mật khẩu website","Xin Chào ! \nMật khẩu của bạn là:".$cot["Password"],"From:minhkhanh99312@gmail.com"))
            echo "<script>alert('Lấy lại mật khẩu thành công');window.location='login.php'</script>";
        else
            echo "<script>alert('Đã xảy ra lỗi')</script>";
    }
    else
    {
        echo "<script>alert('Tài khoản không tồn tại')</script>";
    }
}
?>