function XoaBinhLuan(mabinhluan,masanpham) {
    $.ajax({
        url:"ajax/XoaBinhLuan.php",
        type:"POST",
        data:{
            mabinhluan:mabinhluan
        },
        success:function (giatri) {
            alert(giatri);
            window.location="product-details.php?Masp="+masanpham;
        }
    });
}

function AddCart(id) {
    num= parseInt($("#quantity").val());
    $.post("addCart.php",{'id':id,'num':num},function (data,status) {
        //location.reload();
        item=data.split("-");
        $("#numcart").text(item[0]);
        //$("#listcart").load("cart.php #listcart");
    });
}
function UpdateCart(id) {
    num=$("#num_"+id).val();
    $.post('updatecart.php',{'id':id,'num':num},function (data) {
        location.reload();
    });
}
function DeleteCart(id) {
    $.post('updatecart.php',{'id':id,'num':0},function (data) {
        location.reload();
    });
}

function DanhGiaSao(masanpham, idaccount, noidung) {
    $.ajax({
        url:"ajax/danhgiasaoajax.php",
        type:"POST",
        data:{
            masanpham: masanpham,
            idaccount: idaccount,
            noidung: noidung
        },
        success:function (giatri) {
            alert(giatri);
            window.location='product-details.php?Masp='+masanpham;
        }
    });
}
