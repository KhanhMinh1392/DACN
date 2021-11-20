<?php
    session_start();
    include ("connect.php");
    if (isset($_POST["id"]) && isset($_POST["num"])) {
        $id = $_POST["id"];
        $num = $_POST["num"];
        $sqlselect = "SELECT * FROM courses WHERE idCourses ='" . $id . "'";
        $result = mysqli_query($conn, $sqlselect);
        $row = mysqli_fetch_row($result);

        if (!isset($_SESSION["khoahoc"])) {
            $giohang[$id] = array(
                'makh' => $row[0],
                'namekh' => $row[1],
                'price' => $row[3],
                'number' => $num
            );

        } else {
            $giohang = $_SESSION["khoahoc"];
            if (array_key_exists($id, $giohang)) {
                $giohang[$id] = array(
                    'makh' => $row[0],
                    'namekh' => $row[1],
                    'price' => $row[3],
                    'number' => $giohang[$id]["number"] + $num
                );
            } else {
                $giohang[$id] = array(
                    'makh' => $row[0],
                    'namekh' => $row[1],
                    'price' => $row[3],
                    'number' => $num
                );
            }

        }
        $_SESSION["khoahoc"] = $giohang;
        $number = 0;
        foreach ($giohang as $key => $value) {
            $number += (int)$value["number"];
        }
        echo $number;
    }
?>
