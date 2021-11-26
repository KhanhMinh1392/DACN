<?php
    include ('../admin/layoutAdmin/header.php')
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $id = $_GET["Makh"];
    $namestep = $_POST["namestep"];
    $link = $_POST["link"];

    $them="INSERT INTO detailcourses(idCourses,Content,Link) VALUES ('".$id."','".$namestep."','".$link."')";

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
                <h1 class="m-0">Thêm chi tiết khóa học số #<?php echo $_GET["Makh"]?> </h1>
                <br>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="col-md-12">
          <div class="card">
              <div class="card-header" style="background-color: #007bff;">
                  <h3 class="card-title" style="color:#fff;" >Thêm chi tiết khóa học</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Các bước khóa học: </label>
                                  <input type="text" class="form-control col-md-8" name="namestep" placeholder="Các bước khóa học">
                              </div>
                          </div>
                          <!-- /.col -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Link video: </label>
                                  <input type="text" class="form-control col-md-8" name="link" placeholder="https://www.youtube.com/">
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

