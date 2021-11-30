<?php
    include ('../admin/layoutAdmin/header.php')
?>
<?php
    if(!isset($_GET["matp"]))
        echo "<script>location='listBlog.php'</script>";
    $getProducts = "SELECT * FROM pvs_tinhthanhpho WHERE matp = '".$_GET["matp"]."'";
    $query = mysqli_query($conn,$getProducts);
    if (mysqli_num_rows($query) > 0) {
        $dbdata = mysqli_fetch_array($query);
    } else {
        echo "<script>location='listCity.php'</script>";
    }

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $name = $_POST["name"];
        $type = $_POST["type"];
        $ship = $_POST["ship"];

        $sql = "UPDATE pvs_tinhthanhpho SET name_city = '".$name."',type = '".$type."',ship = '".$ship."' WHERE matp = '".$_GET["matp"]."'";
        $queryupdate=mysqli_query($conn,$sql);
        if($queryupdate > 0) {
            echo "<script>alert('Cập nhật thành công')</script>";
        echo "<script>location='listCity.php'</script>";
        } else {
            echo "<script>alert('Xay ra loi')</script>";
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
                <a href="listCity.php"> <span>&#60;</span> Quay về danh sách</a>
              <h1 class="m-0">Chỉnh sửa thành phố </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="col-md-12">
          <div class="card">
              <div class="card-header" style="background-color: #007bff;">
                  <h3 class="card-title" style="color:#fff;" >Chỉnh sửa thành phố</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên thành phố</label>
                          <input type="text" class="form-control col-md-8" name="name" value="<?php echo empty($_POST["name"])? $dbdata["name_city"] : $_POST["name"]?>">
                        </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Type</label>
                              <input type="text" class="form-control col-md-8" name="type" value="<?php echo empty($_POST["type"])? $dbdata["type"] : $_POST["type"]?>">
                          </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <!-- /.form-group -->
                          <div class="form-group">
                              <label for="exampleInputEmail1">Ship</label>
                              <input type="text" class="form-control col-md-8" name="ship" value="<?php echo empty($_POST["ship"])? $dbdata["ship"] : $_POST["ship"]?>">
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

