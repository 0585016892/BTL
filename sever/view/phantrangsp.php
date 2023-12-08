<?php
if($current_page > 2) {$fisrt_page = 1;?>
     <button  class="btn"><a href="?per_page=<?=$item_per_page?>&page=<?=$fisrt_page?>">Fisrt</a></button>
<?php } ?>

<?php 
for ($num = 1; $num <= $totalPage; $num++) {?> 
    <?php if($num != $current_page) { ?> 
        <?php if($num > $current_page -2 && $num < $current_page + 2) { ?>
            <button  class="btn"><a href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></button>
         <?php } ?>
         <?php } else { ?>
            <button style="background:red; width:36px; height:41px;"  class="btn"><?=$num?></button>
            <?php } ?>
            <?php } ?>
<?php
if($current_page < $totalPage -2) {
    $end_page = $totalPage;
?>
     <button  class="btn"><a href="?per_page=<?=$item_per_page?>&page=<?=$end_page?>">End</a></button>
<?php } ?>
