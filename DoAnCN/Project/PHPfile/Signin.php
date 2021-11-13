<?php
    session_start();
    include ('../page/connect.php');
    $username = $_POST["username"];
    $password = $_POST["password"];
    $callback = $_POST["callbackSignin"];

    $callData = "SELECT * FROM accounts WHERE Username='".$username."' and Password='".$password."'";

    $querry = mysqli_query($conn,$callData);

    if(mysqli_num_rows($querry) > 0) {
        echo "<script>alert('Đăng nhập thành công')</script>";
        $_SESSION['username'] = $username;
        echo "<script>location='../page/index.php'</script>";
    } else {
        echo "<script>alert('Đăng nhập thất bại')</script>";
        echo "<script>location='../page/login.php'</script>";
    }
?>
<script>
    location='<?php echo $callback?>'
</script>
