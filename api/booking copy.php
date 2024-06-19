<?php include_once "./db.php";
$movie = $Movie->find($_GET['movie_id']);
$date = $_GET['date'];
$session = $_GET['session'];

$ords = $Orders->all([
    'movie' => $movie['name'],
    'date' => $date,
    'session' => $session
]);
$seats = [];
foreach ($ords as $ord) {
    $tmp = unserialize($ord['seats']);
    $seats = array_merge($seats, $tmp);
}
?>
<style>
    #room {
        background-image: url("./icon/03D04.png");
        background-position: center;
        background-repeat: none;
        width: 540px;
        height: 370px;
        margin: auto;
        box-sizing: border-box;
        padding: 19px 112px 0 112px;
    }

    .seat {
        width: 63px;
        height: 85px;
        position: relative;
    }

    .seats {
        display: flex;
        flex-wrap: wrap;
    }

    .chk {
        position: absolute;
        right: 2px;
        bottom: 2px;
    }
</style>
<div id="room">
    <div class="seats">
        <?php
        for ($i = 0; $i < 20; $i++) {
            echo "<div class='seat'>";
            echo "<div class='ct'>";
            echo (floor($i / 5) + 1) . "排";
            echo (($i % 5) + 1) . "號";
            echo "</div>";
            echo "<div class='ct'>";
            if (in_array($i, $seats)) {
                echo "<img src='./icon/03D03.png'>";
            } else {
                echo "<img src='./icon/03D02.png'>";
            }
            echo "</div>";
            if (!in_array($i, $seats)) {
                echo "<input type='checkbox' name='chk' value='$i'class='chk'>'";
            }
            echo "</div>";
        }
        ?>
    </div>
</div>
<div id="info">
    <div>您選擇的電影是:<?= $movie['name']; ?></div>
    <div>您選擇的時刻是:<?= $date; ?> <?= $session; ?></div>
    <div>您已經勾選<span id="tickets">0</span>張票，最多可以購買四張票</div>
    <div>
        <button onclick="$('#select').show();$('#booking').hide()">上一步</button>
        <button onclick="checkout()">訂購</button>
    </div>
</div>
<script>
    //建立一個js陣列用來儲存使用者選中的座位    
    let seats = new Array();
    //監聽checkbox的改變事件
    $(".chk").on("change", function() {
        //根據屬性checked的狀態來決定下一步是選擇位置還是取消位置
        if ($(this).prop('checked')) {
            //如果是選中的狀態，
            //先判斷目前選中的座位有沒有超過四個
            if (seats.length + 1 <= 4) {
                //如果選中的座位數還沒有超過四個，
                //就把座位號碼放入陣列中
                seats.push($(this).val())
            } else {
                $(this).prop('checked', false)
                //接著將選中的座位還原為不選中的狀態
                alert("每個人只能勾選四張票")
            }
        } else {
            //如果是要取消選中的座位，
            //則同時也在座位陣列中移除該座位號碼
            // console.log(seats.indexOf($(this).val()));
            seats.splice(seats.indexOf($(this).val()), 1)
        }

        // console.log($(this).prop('checked'), seats)
        // console.log(seat.length)
        //更新票數的文字內容
        $("#ticket").text(seats.length)
    })
    //確認訂單的函式
    function checkout() {
        //使用ajax向api傳送訂單的資料
        $.post("./api/checkout.php", {
            movie: '<?= $movie['name']; ?>',
            date: '<?= $date; ?>',
            session: '<?= $session; ?>',
            qt: seats.length,
            seats
        }, (no) => {
            //如果訂單成功，就將網址導向到訂單資料頁面，並帶上訂單編號
            location.href = `?do=result&no=${no}`;
        })
    }
</script>