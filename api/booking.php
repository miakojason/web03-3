<?php include_once "./db.php"; ?>
<style>
    #room {
        background-image: url("./icon/03D04.png");
        /* background-position: center; */
        /* background-repeat:no-repeat; */
        width: 540px;
        height: 370px;
        margin: auto;
        box-sizing: border-box;
        /* 上右下左 */
        padding: 19px 112px 0 112px;
    }

    .seats {
        display: flex;
        flex-wrap: wrap;
    }

    .seat {
        width: 63px;
        height: 85px;
        position: relative;
    }

    .chk {
        position: absolute;
        right: 2px;
        bottom: 2px;
    }
</style>
<?php
$movie = $Movie->find($_GET['movie_id']);
$date = $_GET['date'];
$session = $_GET['session'];
$ords = $Orders->all(
    [
        'movie' => $movie['name'],
        'date' => $date,
        'session' => $session
    ]
);
// 建空陣列存放所有訂單座位資料
$seats = [];
foreach ($ords as $ord) {
    $tmp = unserialize($ord['seats']);
    $seats = array_merge($seats, $tmp);
}
?>
<div id="room">
    <div class="seats">
        <?php
        for ($i = 0; $i < 20; $i++) {
        ?>
            <div class="seat">
                <div class="ct">
                    <?= (floor($i / 5) + 1); ?>排<?= (($i % 5) + 1); ?>號
                </div>
                <div class="ct">
                    <?php
                    // 檢查當前座位編號 $i 是否存在於已被選中的座位陣列 $seats 中
                    if (in_array($i, $seats)) {
                        echo "<img src='./icon/03D03.png'>";
                    } else {
                        echo "<img src='./icon/03D02.png'>";
                    }
                    ?>
                </div>
                <?php
                if (!in_array($i, $seats)) {
                ?>
                    <input type="checkbox" name="chk" value="<?= $i; ?>" class="chk">
                <?php
                }
                ?>
            </div>
        <?php
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
    let seats = new Array();
    $(".chk").on("change", function() {
        // prop檢查checked當前狀態是true,false，被勾選或無。
        if ($(this).prop('checked')) {
            if (seats.length + 1 <= 4) {
                seats.push($(this).val())
            } else {
                $(this).prop('checked', false)
                alert("每個人只能勾選四張票")
            }
        } else {
            seats.splice(seats.indexOf($(this).val()), 1)
        }
        $("#tickets").text(seats.length)
    })

    function checkout() {
        $.post("./api/checkout.php", {
            movie: '<?= $movie['name']; ?>',
            date: '<?= $date; ?>',
            session: '<?= $session; ?>',
            qt: seats.length,
            seats
        }, (no) => {
            location.href = `?do=result&no=${no}`;
        })
    }
 
</script>