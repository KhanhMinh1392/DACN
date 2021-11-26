<?php
    include ('../admin/layoutAdmin/header.php')
?>
<?php
    if(!isset($_GET["idBlog"]))
        echo "<script>location='listBlog.php'</script>";
    $getProducts = "SELECT * FROM blog WHERE IdBlog = '".$_GET["idBlog"]."'";
    $query = mysqli_query($conn,$getProducts);
    if (mysqli_num_rows($query) > 0) {
        $dbdata = mysqli_fetch_array($query);
    } else {
        echo "<script>location='listBlog.php'</script>";
    }

    $getstaff1 = "SELECT * FROM staffs WHERE Username = '".$_SESSION["email"]."' ";
    $namestaff1=mysqli_query($conn,$getstaff1);
    $result1= mysqli_fetch_array($namestaff1);

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $name = $_POST["name"];
        $detail = $_POST["detail"];
        $date = $_POST["date"];
        $img = $dbdata["Images"];
        if(($_FILES["image"]["name"]!="")) {
            unlink("../img/cake-feature/".$img);
            $img = $_FILES["image"]['name'];
            move_uploaded_file($_FILES["image"]['tmp_name'],'../img/cake-feature/'.$img);
        }

        $sql = "UPDATE blog SET idStaffs = '".$result1["idStaffs"]."',Images = '".$img."',Content = '".$name."',DetailContent = '".$detail."',Date = '".$date."' WHERE IdBlog = '".$_GET["idBlog"]."'";
        $queryupdate=mysqli_query($conn,$sql);
        if($queryupdate > 0) {
            echo "<script>alert('Cập nhật thành công')</script>";
        echo "<script>location='listBlog.php'</script>";
        } else {
            echo "<script>alert('Xay ra loi')</script>";
        }
    }

    $getstaff = "SELECT * FROM staffs WHERE idStaffs = '".$_GET["idStaff"]."' ";
    $namestaff=mysqli_query($conn,$getstaff);
    $result = mysqli_fetch_array($namestaff);

?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <a href="listBlog.php"> <span>&#60;</span> Quay về danh sách</a>
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
                          <label for="exampleInputEmail1">Tên tiêu đề</label>
                          <input type="text" class="form-control col-md-8" name="name" value="<?php echo empty($_POST["name"])? $dbdata["Content"] : $_POST["name"]?>" required>
                        </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Nhân viên tạo</label>
                              <input type="text" class="form-control col-md-8" name="staff" value="<?php echo empty($_POST["staff"])? $result["NameStaff"] : $_POST["staff"]?>" disabled>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Chi tiết</label>
                              <textarea class="form-control col-md-8" name="detail" rows="1" style="height: 100px; color: black"><?php echo empty($_POST["detail"])? $dbdata["DetailContent"] : $_POST["detail"]?></textarea>
                          </div>
                        <!-- /.form-group -->
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label for="exampleInputPassword1">Ngày tạo</label>
                          <input type="date" name="date" value="<?php echo empty($_POST["date"]) ? $dbdata["Date"] : $_POST["date"]?>" class="form-control col-sm-8">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Hình ảnh</label>
                          <div>
                              <img src="../img/blog/column/<?php echo $dbdata["Images"]?>" style="width: 200px" class="avatar img-circle img-thumbnail" alt="avatar">
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

