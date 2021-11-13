<div class="product_pagination">
    <div class="left_btn">
        <a href="#" hidden><i class="lnr lnr-arrow-left" ></i> New posts</a>
    </div>
    <div class="middle_list">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for($num = 1 ; $num<= $totalpage; $num++){ ?>
                    <li class="page-item "><a class="page-link active" href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
    <div class="right_btn"><a href="#" hidden>Older posts <i class="lnr lnr-arrow-right"></i></a></div>
</div>