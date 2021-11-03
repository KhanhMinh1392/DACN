<?php
    include('../connectPHP/connectPHPadmin.php');
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $callback = $_POST["callbackSignup"];
        //check mail
        $sqlcheckmail = "SELECT * FROM accounts WHERE Email = '".$email."'";
        $querymail = mysqli_query($conn,$sqlcheckmail);
        $checkmail = mysqli_fetch_row($querymail);

        if($checkmail){
            echo "<script>alert('Email đã tồn tại')</script>";
            echo "<script>location='../page/login.php'</script>";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                echo "<script>$('#thongbaoemail').text('Email không hợp lệ');</script>";
            else{
                $check="SELECT * FROM accounts WHERE Username = '".$username."'";
                $disquerry=mysqli_query($conn,$check);
                if(mysqli_num_rows($disquerry)>0) {
                    echo "<script>alert('Tài khoản đã tồn tại!')</script>";
                    echo "<script>location='../page/login.php'</script>";
                }
                else{
                    $querry = "INSERT INTO accounts(Username,Password,Email) VALUES ('$username','$password','$email')";
                    $querryinsert=mysqli_query($conn,$querry);
                    if($querryinsert)
                        echo "<script>alert('Đăng ký thành công')</script>";
                    echo "<script>location='../page/login.php'</script>";
                }
            }
        }
    }
?>
<script>
    location='<?php echo $callback?>'
</script>
