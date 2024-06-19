<?php include_once "./db.php"; ?>
<style>
    #room{
        background-image: url("./icon/03D04.png");
        /* background-position: center; */
        /* background-repeat:no-repeat; */
        width: 540px;
        height: 370px;
        margin: auto;
        box-sizing: border-box;
        /* 上右下左 */
        padding:19px 112px 0 112px ;
    }
    .seats{
        display: flex;
        flex-wrap: wrap;
    }
    .seat{
        width: 63px;
        height: 85px;
        position: relative;
    }
   .chk{
    position: absolute;
    right: 2px;
    bottom:2px;
   }
</style>
<div id="room">
    <div class="seats">
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
<div id="info">
    <div>您選擇的電影是:</div>
    <div>您選擇的時刻是:</div>
    <div>您已經勾選<span id="tickes">0</span>張票，最多可以購買四張票</div>
<div>
    <button onclick="$('#select').show();$('#booking').hide()">上一步</button>
    <button onclick="checkout()">訂購</button>
</div>
</div>
