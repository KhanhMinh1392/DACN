<?php
    include ('../admin/layoutAdmin/header.php')
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password= $_POST["password"];
    $role = $_POST["role"];
    $status = $_POST["status"];

    $them="INSERT INTO staffs(NameStaff,Username,Password,idRole,idStatus) VALUES ('".$name."','".$username."','".$password."','".$role."','".$status."')";

    if(mysqli_query($conn,$them))
    {
        echo "<script>alert('Thêm thành công')</script>";
        echo "<script>location='listStaff.php';</script>";
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
                <a href="listStaff.php" style="margin-bottom: 100px"> <span>&#60;</span> Quay về danh sách</a>
            </div><!-- /.col -->
            <div class="col-sm-12">
                <h1 class="m-0">Thêm nhân viên mới </h1>
                <br>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="col-md-12">
          <div class="card">
              <div class="card-header" style="background-color: #007bff;">
                  <h3 class="card-title" style="color:#fff;" >Thêm nhân viên</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Tên nhân viên</label>
                                  <input type="text" class="form-control col-md-8" name="name" placeholder="Tên nhân viên" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Username</label>
                                  <input type="text" class="form-control col-md-8" name="username" placeholder="Tên đăng nhập" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Password</label>
                                  <input type="password" class="form-control col-md-8" name="password" placeholder="Mật khẩu" required>
                              </div>
                              <!-- /.form-group -->

                              <!-- /.form-group -->
                          </div>
                          <!-- /.col -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Quyền</label>
                                  <select class="form-control select2 select2-danger col-md-8" name="role" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                      <?php
                                      //loai sản phẩm
                                      $getgenres = "SELECT * FROM roles";
                                      $getgen=mysqli_query($conn,$getgenres);
                                      while ($genres = mysqli_fetch_array($getgen)) {
                                          ?>
                                          <option value="<?php echo $genres["idRole"]?>"><?php echo $genres["NameRole"]?></option>
                                      <?php }?>

                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Trạng thái</label>
                                  <select class="form-control select2 select2-danger col-md-8" name="status" id="" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                      <?php
                                      //status
                                      $getstatus = "SELECT * FROM status_staff";
                                      $status=mysqli_query($conn,$getstatus);
                                      while ($namest = mysqli_fetch_array($status)) {
                                              ?>
                                              <option value="<?php echo $namest["idStatus"]?>"><?php echo $namest["Status"]?></option>
                                          <?php }?>
                                  </select>
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

