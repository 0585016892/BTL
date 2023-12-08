<?php 
for ($num = 1; $num <= $totalPage; $num++) {?> 
    <?php if($num != $current_page) { ?> 
        <?php if($num > $current_page -2 && $num < $current_page + 2) { ?>
            <button  class="btn"><a href="?tim_kiem=<?=$_GET['tim_kiem']?>&per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></button>
         <?php } ?>
         <?php } else { ?>
            <button style="background:red; width:36px; height:41px;"  class="btn"><?=$num?></button>
            <?php } ?>
            <?php } ?>
<?php

