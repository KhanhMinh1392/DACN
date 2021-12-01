<div class="product_pagination">
    <div class="left_btn">
        <a href="#" hidden><i class="lnr lnr-arrow-left" ></i> New posts</a>
    </div>
    <div class="middle_list">
        <nav aria-label="Page navigation example">
            <?php
            $get_pa = "";
            if($search) {
                $get_pa = "search=".$search."&";
            }
            ?>
            <ul class="pagination">
                <?php for($num = 1 ; $num<= $totalpage; $num++){
                        if ($num != $current_page) {
                            if ($num > $current_page - 3 && $num < $current_page + 3) {?>
                                <li class="page-item"><a class="page-link active" href="?<?=$get_pa?>per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
                        <?php } } else { ?>
                                <li class="page-item active"><a class="page-link active" href=""><?=$num?></a></li>
                <?php } } ?>
            </ul>
        </nav>
    </div>
    <div class="right_btn"><a href="#" hidden>Older posts <i class="lnr lnr-arrow-right"></i></a></div>
</div>