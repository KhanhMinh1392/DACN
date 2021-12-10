<?php
    include ('../admin/layoutAdmin/header.php')
?>
<?php
    if(!isset($_GET["Masp"]))
        echo "<script>location='listProduct.php'</script>";
    $getProducts = "SELECT * FROM products WHERE IdProducts = '".$_GET["Masp"]."'";
    $query = mysqli_query($conn,$getProducts);
    if (mysqli_num_rows($query) > 0) {
        $dbdata = mysqli_fetch_array($query);
    } else {
        echo "<script>location='listProduct.php'</script>";
    }

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $name = $_POST["namepro"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $detail = $_POST["detail"];
        $message = $_POST["message"];
        $genres = $_POST["genres"];
        $getstatus = $_POST["status"];
        $date = $_POST["date"];
        $img = $dbdata["Images"];
        if(($_FILES["image"]["name"]!="")) {
            unlink("../img/cake-feature/".$img);
            $img = $_FILES["image"]['name'];
            move_uploaded_file($_FILES["image"]['tmp_name'],'../img/cake-feature/'.$img);
        }

        $sql = "UPDATE products SET idStatus = '".$getstatus."',Nameproducts = '".$name."',Quantity = '".$quantity."',Images = '".$img."',Price = '".$price."', Info = '".$detail."',Detailinfo = '".$message."', DateCreate = '".$date."',idType = '".$genres."' WHERE IdProducts = '".$_GET["Masp"]."'";
        $queryupdate=mysqli_query($conn,$sql);
        if($queryupdate > 0) {
            echo "<script>alert('Cập nhật thành công')</script>";
        echo "<script>location='listProduct.php'</script>";
        } else {
            echo "<script>alert('Xay ra loi')</script>";
        }
    }

    //loai sản phẩm
    $getgenres = "SELECT * FROM genres WHERE idType = '".$dbdata["idType"]."'";
    $getgen=mysqli_query($conn,$getgenres);
    $genres = mysqli_fetch_array($getgen);
    //status
    $getstatus = "SELECT * FROM status_product WHERE idStatus = '".$dbdata["idStatus"]."'";
    $status=mysqli_query($conn,$getstatus);
    $get_status = mysqli_fetch_array($status);

    //status
    $get_material = "SELECT * FROM material WHERE IdProducts = '".$dbdata["IdProducts"]."'";
    $query_material=mysqli_query($conn,$get_material);

?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <a href="listProduct.php"> <span>&#60;</span> Quay về danh sách</a>
              <h1 class="m-0"><?php echo $dbdata["Nameproducts"]?> </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="col-md-12">
          <div class="card">
              <div class="card-header" style="background-color: #007bff;">
                  <h3 class="card-title" style="color:#fff;" >Thông tin sản phẩm</h3>
              </div>
              <div class="card-header border-0">
                  <div class="row">
                      <div class="col-md-4" style="margin-top: 20px">
                          <div class="d-flex justify-content-between">
                              <h3 class="card-title" style="font-size: 15px">Phân loại: <?php echo $genres["Typename"]?></h3>
                          </div>
                          <div class="d-flex justify-content-between">
                              <h3 class="card-title" style="font-size: 15px">Loại sản phẩm: <?php echo $genres["Typename"]?></h3>
                          </div>
                          <div class="d-flex justify-content-between">
                              <h3 class="card-title" style="font-size: 15px">Nhãn hiệu: Cake- Bakery</h3>
                          </div>
                      </div>
                      <div class="col-md-4" style="margin-top: 20px">
                          <div class="d-flex justify-content-between">
                              <h3 class="card-title" style="font-size: 15px">Trạng thái: <?php echo $get_status["NameStatus"]?> </h3>
                          </div>
                          <div class="d-flex justify-content-between">
                              <h3 class="card-title" style="font-size: 15px">Ngày tạo: <?php $date=date_create($dbdata["DateCreate"]);echo date_format($date,"d/m/Y");?></h3>
                          </div>
                          <div class="d-flex justify-content-between">
                              <h3 class="card-title" style="font-size: 15px">Nhân viên tạo: --</h3>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="d-flex justify-content-between">
                              <img src="../img/cake-feature/<?php echo $dbdata["Images"]?>" style="width: 150px">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0">Chi tiết sản phẩm</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">
                  <div class="card">
                      <div class="card-header" style="background-color: #007bff;">
                          <h3 class="card-title" style="color:#fff;" >Nguyên liệu</h3>
                      </div>
                      <div class="card-header border-0">
                          <div class="row">
                              <div class="col-md-12" >
                                  <?php
                                    if(mysqli_num_rows($query_material)) {
                                    $i=0;
                                    $total_material = 0;
                                    while ($material = mysqli_fetch_array($query_material)) {
                                        $i++;
                                        $total_material += $material["Price"];
                                  ?>
                                  <div class="d-flex justify-content-between">
                                      <h3 class="card-title" style="font-size: 15px">Nguyên liệu <?php echo $i?>: <?php echo $material["Material"]?> / <?php echo number_format($material["Price"],0,",",".")?> VNĐ</h3>
                                  </div>
                                 <?php } } else {
                                        $total_material = 0;
                                        ?>
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title" style="font-size: 15px">Chưa có thông tin</h3>
                                    </div>
                                 <?php } ?>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-sm-8">
                  <div class="card">
                      <div class="card-header" style="background-color: #007bff;">
                          <h3 class="card-title" style="color:#fff;" >Thông tin chi tiết sản phẩm</h3>
                      </div>
                      <div class="card-header border-0">
                          <div class="row">
                              <div class="col-md-6" >
                                  <div class="d-flex justify-content-between">
                                      <h3 class="card-title" style="font-size: 15px">Tên sản phẩm: <?php echo $dbdata["Nameproducts"]?></h3>
                                  </div>
                                  <div class="d-flex justify-content-between">
                                      <h3 class="card-title" style="font-size: 15px">Mã sản phẩm: <?php echo $dbdata["IdProducts"]?></h3>
                                  </div>
                                  <div class="d-flex justify-content-between">
                                      <h3 class="card-title" style="font-size: 15px">Giá bán lẻ: <?php echo number_format($dbdata["Price"],0,",",".")?> VNĐ</h3>
                                  </div>
                                  <div class="d-flex justify-content-between">
                                      <h3 class="card-title" style="font-size: 15px">Giá vốn gốc: <?php echo number_format($total_material,0,",",".")?> VNĐ</h3>
                                  </div>
                                  <div class="d-flex justify-content-between">
                                      <h3 class="card-title" style="font-size: 15px">Đơn vị tính: cái</h3>
                                  </div>
                                  <div class="d-flex justify-content-between">
                                      <h3 class="card-title" style="font-size: 15px">Khối lượng: 0.5kg</h3>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="d-flex justify-content-between">
                                      <img src="../img/cake-feature/<?php echo $dbdata["Images"]?>" style="width: 250px">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
      </div>

    </div>
</div>
<?php
include ('../admin/layoutAdmin/footer.php')
?>

