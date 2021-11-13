<?php
    session_start();
    include ("connect.php");
    if (isset($_POST["id"]) && isset($_POST["num"])) {
        $id = $_POST["id"];
        $num = $_POST["num"];
        $sqlselect = "SELECT * FROM products WHERE IdProducts='" . $id . "'";
        $result = mysqli_query($conn, $sqlselect);
        $row = mysqli_fetch_row($result);

        if (!isset($_SESSION["giohang"])) {
            $giohang[$id] = array(
                'masp' => $row[0],
                'name' => $row[1],
                'image' => $row[3],
                'price' => $row[4],
                'number' => $num
            );

        } else {
            $giohang = $_SESSION["giohang"];
            if (array_key_exists($id, $giohang)) {
                $giohang[$id] = array(
                    'masp' => $row[0],
                    'name' => $row[1],
                    'image' => $row[3],
                    'price' => $row[4],
                    'number' => $giohang[$id]["number"] + $num
                );
            } else {
                $giohang[$id] = array(
                    'masp' => $row[0],
                    'name' => $row[1],
                    'image' => $row[3],
                    'price' => $row[4],
                    'number' => $num
                );
            }

        }
        $_SESSION["giohang"] = $giohang;
        //echo "<prE>";
        //print_r($_SESSION["giohang"]);
        $number = 0;
        foreach ($giohang as $key => $value) {
            $number += (int)$value["number"];
        }
        echo $number;
    }
?>
