<?php
    include ('../admin/layoutAdmin/header.php')
?>
<?php
    $getstaff = "SELECT * FROM staffs WHERE Username = '".$_SESSION["email"]."'";
    $namestaff=mysqli_query($conn,$getstaff);
    $result = mysqli_fetch_array($namestaff);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $nameproduct = $_POST["namepro"];
    $message = $_POST["content"];
    $date = $_POST["date"];
    $img = $_FILES["image"];

    if($img["type"]!="image/jpeg" && $img["type"]!="image/png")
    {
        echo "<script>alert('Hãy chọn đúng định dạng hình')</script>";
        echo "<script>location='addBlog.php';</script>";
        return;
    }

    move_uploaded_file($img["tmp_name"],"../img/blog/column/".$img["name"]);

    $them="INSERT INTO blog(idStaffs,Images,Content,DetailContent,Date) VALUES ('".$result["idStaffs"]."','".$img["name"]."','".$nameproduct."','".$message."','".$date."')";

    if(mysqli_query($conn,$them))
    {
//        echo "<script>alert('Thêm thành công')</script>";
//        echo "<script>location='listBlog.php';</script>";
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
                <a href="listBlog.php" style="margin-bottom: 100px"> <span>&#60;</span> Quay về danh sách</a>
            </div><!-- /.col -->
            <div class="col-sm-12">
                <h1 class="m-0">Thêm blog mới </h1>
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
                                  <label for="exampleInputEmail1">Tiêu đề blog</label>
                                  <input type="text" class="form-control col-md-8" name="namepro" placeholder="Tiêu đề blog" value="Công nghệ làm bánh hiện đại, tạo ra những chiếc bánh ngon và đẹp nhất">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Nhân viên tạo</label>
                                  <input type="text" class="form-control col-md-8" name="namestaff" value="<?php echo $result["NameStaff"]?>" disabled>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Mô tả chi tiết</label>
                                  <textarea class="form-control col-md-8" name="content" cols="50" rows="30" style="height: 100px; color: black">Donut là chiếc bánh ngọt đặc trưng của vùng Vienna, được sáng tạo bởi đầu bếp Franz Sacher vào năm 1832. Theo tương truyền, vào thời điểm ra đời món bánh này, Franz Sacher khi đó chỉ mới vừa bước sang tuổi 16, khi đó vì bếp trưởng ốm không thể phục vụ món tráng miệng cho hoàng tử Wenzel von Metternich và những vị khách quan trọng khác trong buổi tiệc hoàng gia. Franz Sacher đã tự tay sáng tạo và làm nên món bánh ngọt tráng miệng hấp dẫn này. </textarea>
                              </div>

                          </div>
                          <!-- /.col -->
                          <div class="col-md-6">
                              <!-- /.form-group -->
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Ngày tạo</label>
                                  <input type="date" name="date" class="form-control col-sm-8">
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

