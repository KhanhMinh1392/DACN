<?php
include ('connect.php');
$key=$_POST["id"];
$sql="SELECT * FROM pvs_quanhuyen WHERE matp = '".$key."'";
$laytp=mysqli_query($conn,$sql);
$numtp=mysqli_num_rows($laytp);
if($numtp > 0) {?>
    <select class="product_select nice-select tinh" id="state1" name="districts" style="color: black">
        <?php
        while ($row = mysqli_fetch_array($laytp)){
            ?>
            <option value="<?php echo $row["maqh"]?>" style="color: black;"><?php echo $row["name_quanhuyen"]?></option>
        <?php }?>
    </select>
<?php }?>
