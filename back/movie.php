<style>
    .item div {
        box-sizing: border-box;
        color: black;
    }

    .item {
        background-color: white;
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
        margin: 3px 0;
    }

    .item>div:nth-child(1) {
        width: 15%;
    }

    .item>div:nth-child(2) {
        width: 12%;
    }

    .item>div:nth-child(3) {
        width: 73%;
    }
</style>
<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<div style="height: 450px;overflow:auto;">
    <?php
    $rows = $Movie->all(" order by rank");
    foreach ($rows as $idx => $row) {
    ?>
        <div class="item" style="display: flex;">
            <div><img src="./img/<?= $row['poster']; ?>" style="width:100%;"></div>
            <div>分級:<img src="./icon/03c0<?= $row['level']; ?>.png" style="width:25px;"></div>
            <div>
                <div style="display: flex;">
                    <div style="width:33%">片名:<?= $row['name']; ?></div>
                    <div style="width:33%">片長:<?= $row['length']; ?></div>
                    <div style="width:33%">上映時間:<?= $row['ondate']; ?></div>
                </div>
                <div>
                    <button class="show-btn" data-id="<?= $row['id']; ?>"><?= ($row['sh'] == 1) ? '顯示' : '隱藏'; ?></button>
                    <button class="sw-btn" data-id="<?= $row['id']; ?>" data-sw="<?= ($idx !== 0) ? $rows[$idx - 1]['id'] : $row['id']; ?>">往上</button>
                    <button class="sw-btn" data-id="<?= $row['id']; ?>" data-sw="<?= ((count($rows) - 1) != $idx) ? $rows[$idx + 1]['id'] : $row['id']; ?>">往下</button>
                    <button class="edit-btn" data-id="<?= $row['id']; ?>">編輯電影</button>
                    <button class="del-btn" data-id="<?= $row['id']; ?>">刪除電影</button>
                </div>
                <div>劇情介紹<?= $row['intro']; ?></div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<script>
    $(".sw-btn").on('click', function() {
        let id = $(this).data('id');
        let sw = $(this).data('sw');
        let table = 'movie';
        $.post("./api/sw.php", {
            id,
            sw,
            table
        }, () => {
            location.reload();
        })
    })
    //
    $(".show-btn").on('click', function() {
        let id = $(this).data('id');
        $.post("./api/show.php", {
            id
        }, () => {
            location.reload();
        })
    })
    $(".del-btn").on('click', function() {
        let table = 'movie';
        let id = $(this).data('id');
        $.post("./api/del.php", {
            table,
            id
        }, () => {
            location.reload();
        })
    })
</script>