<?php
    session_start();
    include ('../page/connect.php');
    $query = "SELECT * FROM accounts WHERE Username = '".$_SESSION["username"]."'";
    $dbdata = mysqli_query($conn,$query);
    $information = mysqli_fetch_array($dbdata);

    $passold = $_POST["passold"];
    $passnew = $_POST["passnew"];
    $confirm = $_POST["confirm"];

    if($passold == $information["Password"]) {
        if($passnew == $confirm) {
            $update = "UPDATE accounts SET Password = '".$passnew."' WHERE Username = '".$_SESSION["username"]."'";

            if(mysqli_query($conn,$update)) {
                echo "<script>alert('Đổi mật khẩu thành công')</script>";
                echo "<script>location='../page/infocustomer.php'</script>";
            } else {
                echo "<script>alert('Thất bại')</script>";
                echo "<script>location='../page/infocustomer.php'</script>";
            }

        } else {
            echo "<script>alert('Vui lòng kiểm tra lại mật khẩu')</script>";
            echo "<script>location='../page/infocustomer.php'</script>";
        }
    } else {
        echo "<script>alert('Mật khẩu cũ sai')</script>";
        echo "<script>location='../page/infocustomer.php'</script>";
    }
?>

