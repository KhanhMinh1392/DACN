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
        $price = $_POST["price"] * 1000;
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
    $getgenres = "SELECT * FROM genres";
    $getgen=mysqli_query($conn,$getgenres);
    //status
    $getstatus = "SELECT * FROM status_product";
    $status=mysqli_query($conn,$getstatus);

?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <a href="listProduct.php"> <span>&#60;</span> Quay về danh sách</a>
              <h1 class="m-0">Chỉnh sửa sản phẩm </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="col-md-12">
          <div class="card">
              <div class="card-header" style="background-color: #007bff;">
                  <h3 class="card-title" style="color:#fff;" >Chỉnh sửa sản phẩm</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên sản phẩm</label>
                          <input type="text" class="form-control col-md-8" name="namepro" value="<?php echo empty($_POST["namepro"])? $dbdata["Nameproducts"] : $_POST["namepro"]?>" placeholder="Tên sản phẩm">
                        </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Số lượng bán</label>
                              <input type="text" class="form-control col-md-8" name="quantity" value="<?php echo empty($_POST["quantity"])? $dbdata["Quantity"] : $_POST["quantity"]?>" placeholder="Số lượng">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Mô tả</label>
                              <textarea class="form-control col-md-8" name="detail" rows="1" style="height: 100px; color: black"><?php echo empty($_POST["detail"])? $dbdata["Info"] : $_POST["detail"]?></textarea>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Mô tả chi tiết</label>
                              <textarea class="form-control col-md-8" name="message" rows="1" style="height: 100px; color: black"><?php echo empty($_POST["message"])? $dbdata["Detailinfo"] : $_POST["message"]?></textarea>
                          </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label for="exampleInputPassword1">Loại bánh</label>
                          <select class="form-control select2 select2-danger col-md-8" name="genres" id="genres" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <?php
                                while ($genres = mysqli_fetch_array($getgen)) {
                                    if($genres["idType"] == $dbdata["idType"]) {
                            ?>
                                        <option selected="selected" value="<?php echo $genres["idType"]?>"><?php echo $genres["Typename"]?></option>
                            <?php } else {?>
                                        <option value="<?php echo $genres["idType"]?>"><?php echo $genres["Typename"]?></option>
                                    <?php } }?>
                          </select>
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Giá sản phẩm</label>
                          <input type="text" class="form-control col-sm-8" name="price" value="<?=number_format($dbdata["Price"],0,",",".")?>" placeholder="Giá sản phẩm">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label for="exampleInputPassword1">Ngày tạo</label>
                          <input type="date" name="date" value="<?php echo empty($_POST["date"]) ? $dbdata["DateCreate"] : $_POST["date"]?>" class="form-control col-sm-8">
                        </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">Trạng thái</label>
                              <select class="form-control select2 select2-danger col-md-8" name="status" id="" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                  <?php
                                  while ($namest = mysqli_fetch_array($status)) {
                                      if($namest["idStatus"] == $dbdata["idStatus"]) {
                                          ?>
                                          <option selected="selected" value="<?php echo $namest["idStatus"]?>"><?php echo $namest["NameStatus"]?></option>
                                      <?php } else {?>
                                          <option value="<?php echo $namest["idStatus"]?>"><?php echo $namest["NameStatus"]?></option>
                                      <?php } }?>
                              </select>
                          </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Hình ảnh</label>
                          <div>
                              <img src="../img/cake-feature/<?php echo $dbdata["Images"]?>" style="width: 200px" class="avatar img-circle img-thumbnail" alt="avatar">
                              <h6>Upload a different photo...</h6>
                              <input type="file" name="image" class="text-center center-block file-upload">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="card-footer" style="float:right;" >
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  <!-- /.card-body -->
              </form>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
include ('../admin/layoutAdmin/footer.php')
?>

