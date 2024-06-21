<h2 class="ct">訂單清單</h2>
<div class="qdel">
    快速刪除:
    <input type="radio" name="type" value="date">依日期
    <input type="text" name="date" id="date">
    <input type="radio" name="type" value="movie">依電影
    <select name="movie" id="movie">
        <?php
        $movies = $Orders->q("select `movie` from `orders` Group by `movie`");
        foreach ($movies as $movie) {
            echo "<option value='{$movie['movie']}'>{$movie['movie']}</option>";
        }
        ?>
    </select>
    <button onclick="qdel()">刪除</button>
</div>
<style>
    .header div,
    .item div {
        width: calc(100%/7);
    }

    .header {
        display: flex;
        justify-content: space-between;
    }

    .lists {
        height: 330px;
        width: 100%;
        overflow: auto;
    }

    .item {
        width: 100%;
        display: flex;
    }
</style>
<div class="header">
    <div>訂單編號</div>
    <div>電影名稱</div>
    <div>日期</div>
    <div>場次時間</div>
    <div>訂購數量</div>
    <div>訂購位置</div>
    <div>操作</div>
</div>
<div class="lists">
    <?php
    $orders = $Orders->all();
    foreach ($orders as $order) {
    ?>
        <div class="item">
            <div><?= $order['no']; ?></div>
            <div><?= $order['movie']; ?></div>
            <div><?= $order['date']; ?></div>
            <div><?= $order['session']; ?></div>
            <div><?= $order['qt']; ?></div>
            <div>
                <?php
                $seats = unserialize($order['seats']);
                foreach ($seats as $seat) {
                    echo (floor($seat / 5) + 1) . "排" . (($seat % 5) + 1) . "號";
                    echo "<br>";
                }
                ?>
            </div>
            <button onclick="del(<?= $order['id']; ?>)">刪除</button>
        </div>
    <?php
    }
    ?>
</div>
<script>
    function del(id) {
        $.post("./api/del.php", {
            table: 'orders',
            id
        }, () => {
            location.reload();
        })
    }

    function qdel() {
        let type = $("input[name='type']:checked").val()
        let val = $("#" + type).val()
        let chk = confirm(`您確定要刪除${type}為${val}的所有資料嗎?`)
        // 如果確定傳true就會執行刪除，取消flase就沒有
        if (chk) {
            $.post("./api/qdel.php", {
                type,
                val
            }, () => {
                location.reload();
            })
        }
    }
</script>