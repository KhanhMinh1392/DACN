<div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
        <?php
            $get_pa = "";
            if($search) {
                $get_pa = "city=".$search."&";
            }
        ?>
        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
        <?php for($num = 1 ; $num <= $totalpage; $num++){ ?>
            <li class="page-item"><a class="page-link" href="?<?=$get_pa?>per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
        <?php } ?>
        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
    </ul>
</div>