<?php
    include ('../admin/layoutAdmin/header.php')
?>
<?php
    if(!isset($_GET["Makh"]))
        echo "<script>location='listCourses.php'</script>";
    $getCourses = "SELECT * FROM courses WHERE idCourses = '".$_GET["Makh"]."'";
    $query = mysqli_query($conn,$getCourses);
    if (mysqli_num_rows($query) > 0) {
        $dbdata = mysqli_fetch_array($query);
    } else {
//        echo "<script>location='listCourses.php'</script>";
    }

//    if($_SERVER["REQUEST_METHOD"]=="POST") {
//        $name = $_POST["namepro"];
//        $quantity = $_POST["quantity"];
//        $price = $_POST["price"] * 1000;
//        $detail = $_POST["detail"];
//        $message = $_POST["message"];
//        $genres = $_POST["genres"];
//        $getstatus = $_POST["status"];
//        $date = $_POST["date"];
//        $img = $dbdata["Images"];
//        if(($_FILES["image"]["name"]!="")) {
//            unlink("../img/cake-feature/".$img);
//            $img = $_FILES["image"]['name'];
//            move_uploaded_file($_FILES["image"]['tmp_name'],'../img/cake-feature/'.$img);
//        }
//
//        $sql = "UPDATE products SET idStatus = '".$getstatus."',Nameproducts = '".$name."',Quantity = '".$quantity."',Images = '".$img."',Price = '".$price."', Info = '".$detail."',Detailinfo = '".$message."', DateCreate = '".$date."',idType = '".$genres."' WHERE IdProducts = '".$_GET["Masp"]."'";
//        $queryupdate=mysqli_query($conn,$sql);
//        if($queryupdate > 0) {
//            echo "<script>alert('Cập nhật thành công')</script>";
//        echo "<script>location='listProduct.php'</script>";
//        } else {
//            echo "<script>alert('Xay ra loi')</script>";
//        }
//    }

?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <a href="listCourses.php"> <span>&#60;</span> Quay về danh sách</a>
                <h1 class="m-0">Chỉnh sửa khóa học </h1>
            </div><!-- /.col -->
          <div class="col-sm-6" >
              <br>
              <a href="addDetailCourses.php?Makh=<?php echo $_GET["Makh"]?>" class="btn btn-success float-right"><i class="fa fa-plus-circle"></i>Thêm</a>
          </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="col-md-12">
          <div class="card">
              <div class="card-header" style="background-color: #007bff;">
                  <h3 class="card-title" style="color:#fff;" >Chỉnh sửa khóa học</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên khóa học</label>
                          <input type="text" class="form-control col-md-8" name="namecourse" value="<?php echo empty($_POST["namecourse"])? $dbdata["NameCourses"] : $_POST["namecourse"]?>" placeholder="Tên khóa học">
                        </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Mô tả khóa học</label>
                              <textarea class="form-control col-md-8" name="detail" rows="1" style="height: 100px; color: black"><?php echo empty($_POST["detail"])? $dbdata["Info"] : $_POST["detail"]?></textarea>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Mô tả chi tiết</label>
                              <textarea class="form-control col-md-8" name="message" rows="1" style="height: 100px; color: black"><?php echo empty($_POST["message"])? $dbdata["TitleCourses"] : $_POST["message"]?></textarea>
                          </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Học phí</label>
                          <input type="text" class="form-control col-sm-8" name="price" value="<?=number_format($dbdata["Price"],0,",",".")?>" placeholder="Học phí">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label for="exampleInputPassword1">Ngày bắt đầu</label>
                          <input type="date" name="datestart" value="<?php echo empty($_POST["datestart"]) ? $dbdata["TimeStart"] : $_POST["datestart"]?>" class="form-control col-sm-8">
                        </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">Ngày kết thúc</label>
                              <input type="date" name="dateend" value="<?php echo empty($_POST["dateend"]) ? $dbdata["TimeEnd"] : $_POST["dateend"]?>" class="form-control col-sm-8">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">Link video</label>
                              <input type="text" name="linkintro" value="<?php echo empty($_POST["linkintro"]) ? $dbdata["Link"] : $_POST["linkintro"]?>" class="form-control col-sm-8">
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

