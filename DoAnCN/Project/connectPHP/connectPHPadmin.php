<?php
     $dbhost = "localhost";
     $dbuser = "root";
     $dbpass = "";
     $dbname = "cakeshop2";
     $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
     
     if($conn)
     {
         mysqli_query($conn,"SET NAMES 'utf8'");
     }
     else{
         echo "Bạn đã kết nối thất bại".mysqli_connect_error();
     }


?>
