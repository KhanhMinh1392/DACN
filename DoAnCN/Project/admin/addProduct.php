<?php
    include ('../admin/layoutAdmin/header.php')
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $nameproduct = $_POST["namepro"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $detail = $_POST["detail_info"];
    $message = $_POST["content"];
    $genres = $_POST["genres"];
    $getstatus = $_POST["status"];
    $date = $_POST["date"];
    $img = $_FILES["image"];

    if($img["type"]!="image/jpeg" && $img["type"]!="image/png")
    {
        echo "<script>alert('Hãy chọn đúng định dạng hình')</script>";
        echo "<script>location='addProduct.php';</script>";
        return;
    }

    move_uploaded_file($img["tmp_name"],"../img/cake-feature/".$img["name"]);

    $them="INSERT INTO products(idStatus,Nameproducts,Quantity,Images,Price,Info,Detailinfo,DateCreate,idType) VALUES ('".$getstatus."','".$nameproduct."','".$quantity."','".$img["name"]."','".$price."','".$detail."','".$message."','".$date."','".$genres."')";

    if(mysqli_query($conn,$them))
    {
        echo "<script>alert('Thêm thành công')</script>";
        echo "<script>location='listProduct.php';</script>";
    }
    else{
        echo "<script>alert('Xảy ra lỗi')</script>";
    }

}
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <a href="listProduct.php" style="margin-bottom: 100px"> <span>&#60;</span> Quay về danh sách</a>
            </div><!-- /.col -->
            <div class="col-sm-12">
                <h1 class="m-0">Thêm sản phẩm mới </h1>
                <br>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="col-md-12">
          <div class="card">
              <div class="card-header" style="background-color: #007bff;">
                  <h3 class="card-title" style="color:#fff;" >Thêm sản phẩm</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Tên sản phẩm</label>
                                  <input type="text" class="form-control col-md-8" name="namepro" placeholder="Tên sản phẩm">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Số lượng bán</label>
                                  <input type="text" class="form-control col-md-8" name="quantity" placeholder="Số lượng">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Mô tả</label>
                                  <textarea class="form-control col-md-8" name="detail_info" cols="50" rows="30" style="height: 100px; color: black">Donut là chiếc bánh ngọt đặc trưng của vùng Vienna, được sáng tạo bởi đầu bếp Franz Sacher vào năm 1832. Theo tương truyền, vào thời điểm ra đời món bánh này, Franz Sacher khi đó chỉ mới vừa bước sang tuổi 16, khi đó vì bếp trưởng ốm không thể phục vụ món tráng miệng cho hoàng tử Wenzel von Metternich và những vị khách quan trọng khác trong buổi tiệc hoàng gia. Franz Sacher đã tự tay sáng tạo và làm nên món bánh ngọt tráng miệng hấp dẫn này. </textarea>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Mô tả chi tiết</label>
                                  <textarea class="form-control col-md-8" name="content" cols="50" rows="30" style="height: 100px; color: black">Donut là chiếc bánh ngọt đặc trưng của vùng Vienna, được sáng tạo bởi đầu bếp Franz Sacher vào năm 1832. Theo tương truyền, vào thời điểm ra đời món bánh này, Franz Sacher khi đó chỉ mới vừa bước sang tuổi 16, khi đó vì bếp trưởng ốm không thể phục vụ món tráng miệng cho hoàng tử Wenzel von Metternich và những vị khách quan trọng khác trong buổi tiệc hoàng gia. Franz Sacher đã tự tay sáng tạo và làm nên món bánh ngọt tráng miệng hấp dẫn này. </textarea>
                              </div>
                              <!-- /.form-group -->
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Loại bánh</label>
                                  <select class="form-control select2 select2-danger col-md-8" name="genres" id="genres" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                      <?php
                                      //loai sản phẩm
                                      $getgenres = "SELECT * FROM genres";
                                      $getgen=mysqli_query($conn,$getgenres);
                                      while ($genres = mysqli_fetch_array($getgen)) {
                                              ?>
                                          <option value="<?php echo $genres["idType"]?>"><?php echo $genres["Typename"]?></option>
                                          <?php }?>

                                  </select>
                              </div>
                              <!-- /.form-group -->
                          </div>
                          <!-- /.col -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Giá sản phẩm</label>
                                  <input type="text" class="form-control col-sm-8" name="price" placeholder="Giá sản phẩm">
                              </div>
                              <!-- /.form-group -->
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Ngày tạo</label>
                                  <input type="date" name="date" class="form-control col-sm-8">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Trạng thái</label>
                                  <select class="form-control select2 select2-danger col-md-8" name="status" id="" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                      <?php
                                      //status
                                      $getstatus = "SELECT * FROM status_product";
                                      $status=mysqli_query($conn,$getstatus);
                                      while ($namest = mysqli_fetch_array($status)) {
                                              ?>
                                              <option value="<?php echo $namest["idStatus"]?>"><?php echo $namest["NameStatus"]?></option>
                                          <?php }?>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Hình ảnh</label>
                                  <div>
                                      <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" style="width: 200px" class="avatar img-circle img-thumbnail" alt="avatar">
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

