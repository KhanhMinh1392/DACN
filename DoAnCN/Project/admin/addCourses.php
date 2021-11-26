<?php
    include ('../admin/layoutAdmin/header.php')
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $namecourse = $_POST["namecourse"];
    $price = $_POST["price"];
    $detail = $_POST["detail_info"];
    $message = $_POST["content"];
    $link = $_POST["link"];
    $datestart = $_POST["datestart"];
    $dateend = $_POST["dateend"];

    $them="INSERT INTO courses(NameCourses,TitleCourses,Price,TimeStart,TimeEnd,Link,Info) VALUES ('".$namecourse."','".$detail."','".$price."','".$datestart."','".$dateend."','".$link."','".$message."')";

    if(mysqli_query($conn,$them))
    {
        echo "<script>alert('Thêm thành công')</script>";
        echo "<script>location='listCourses.php';</script>";
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
                <a href="listCourses.php" style="margin-bottom: 100px"> <span>&#60;</span> Quay về danh sách</a>
            </div><!-- /.col -->
            <div class="col-sm-12">
                <h1 class="m-0">Thêm khóa học mới </h1>
                <br>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="col-md-12">
          <div class="card">
              <div class="card-header" style="background-color: #007bff;">
                  <h3 class="card-title" style="color:#fff;" >Thêm khóa học</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Tên khóa học</label>
                                  <input type="text" class="form-control col-md-8" name="namecourse" placeholder="Tên khóa học">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Học phí</label>
                                  <input type="text" class="form-control col-sm-8" name="price" placeholder="Giá khóa học">
                              </div>
                              <!-- /.form-group -->
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Ngày bắt đầu</label>
                                  <input type="date" name="datestart" class="form-control col-sm-8">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Ngày kết thúc</label>
                                  <input type="date" name="dateend" class="form-control col-sm-8">
                              </div>
                          </div>
                          <!-- /.col -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Link video</label>
                                  <input type="text" name="link" class="form-control col-sm-8" placeholder="Link video">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Mô tả khóa học</label>
                                  <textarea class="form-control col-md-8" name="detail_info" cols="50" rows="30" style="height: 100px; color: black">Cách làm bánh Tiramisu siêu ngon dể làm với công thức chuẩn hương vị Ý và cực kỳ đẹp mắt do chuyên</textarea>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Thông tin khóa học</label>
                                  <textarea class="form-control col-md-8" name="content" cols="50" rows="30" style="height: 100px; color: black">Cách làm bánh Tiramisu siêu ngon dể làm với công thức chuẩn hương vị Ý và cực kỳ đẹp mắt do chuyên</textarea>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer" style="float:right;" >
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                      <!-- /.card-body -->
                  </div>>
              </form>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
include ('../admin/layoutAdmin/footer.php')
?>

