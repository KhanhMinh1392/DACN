$(document).ready(function () {
    $(".city").change(function () {
        var id=$(".city").val();
        $.post("district.php",{id: id},function (data) {
            $(".tinh").html(data);

        })

    });

});