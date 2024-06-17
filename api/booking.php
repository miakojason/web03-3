<?php include_once "php"; ?>

<div id="room">
    <div class="seat">
        <?php
        for ($i = 0; $i < 20; $i++) {
        ?>
        <div class="seat">
            <div class="ct">
                <?=(floor($i/5)+1);?>排<?=(($i%5)+1);?>號
            </div>
            <div class="ct">
                <img src="./icon/03D02.png" alt="">
            </div>
            <input type="checkbox" name="chk" value="<?=$i;?>" class="chk">
        </div>
        <?php
        }
        ?>
    </div>
</div>
