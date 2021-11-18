// quận huyện
$(document).ready(function () {
    $(".city").change(function () {
        var id=$(".city").val();
        $.post("district.php",{id: id},function (data) {
            $(".tinh").html(data);
        })
    });
});
// phí ship
$(document).ready(function () {
    $(".city").change(function () {
        var id=$(".city").val();
        $.post("ship.php",{id: id},function (data) {
            $(".ship").html(data);
        })
    });
});
// tong tien
$(document).ready(function () {
    $(".city").change(function () {
        var id=$(".city").val();
        $.post("totalbill.php",{id: id},function (data) {
            $(".tong").html(data);
        })
    });
});