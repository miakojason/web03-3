<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <!-- 海報區 -->
    <div class="lists">
      <!-- 單一海報區塊 -->
      <div class="item">
        <!-- 海報圖片 -->
        <div><img src="./img/" alt=""></div>
        <!-- 預告名稱 -->
        <div></div>
      </div>
    </div>
    <!-- 按鈕區 -->
    <div class="controls">
      <!-- 向左按鈕 -->
      <div class="left"></div>
      <!-- 海報按鈕區塊 -->
      <div class="btns">
        <!-- 單一按鈕 -->
        <div class="btn">
          <!-- 按鈕圖片 -->
          <div><img src="./img/" alt=""></div>
          <!-- 預告片名 -->
          <div></div>
        </div>
      </div>
      <!-- 向右按鈕 -->
      <div class="right"></div>
    </div>
  </div>
</div>
<style>
  .movies {
    display: flex;
    flex-wrap: wrap;
  }

  .movie {
    display: flex;
    flex-wrap: wrap;
    box-sizing: border-box;
    padding: 2px;
    margin: 0.5%;
    border: 1px solid white;
    border-radius: 5px;
    width: 49%;
  }
</style>
<div class="half">
  <h1>院線片清單</h1>
  <div class="rb tab" style="width:95%;">
    <div class="movies">
      <?php
      $today = date("Y-m-d");
      $ondate = date("Y-m-d", strtotime("-2 days"));
      $total = $Movie->count(" where `ondate`>='$ondate' && `ondate` <='$today' && `sh`=1 ");
      $div = 4;
      $pages = ceil($total / $div);
      $now = $_GET['p'] ?? 1;
      $start = ($now - 1) * $div;
      $rows = $Movie->all(" where `ondate`>='$ondate' && `ondate`<='$today' && `sh`=1 order by rank limit $start,$div");
      foreach ($rows as $row) {
      ?>
        <div class="movie">
          <div style="width: 35%;">
            <a href="?do=intro&id=<?= $row['id']; ?>">
              <img src="./img/<?= $row['poster']; ?>" style="width:60px;border:3px solid white">
            </a>
          </div>
          <div style="width: 65%;">
            <div><?= $row['name']; ?></div>
            <div style="font-size:13px;">分級:<img src="./icon/03C0<?= $row['level']; ?>.png" alt=""> </div>
            <div style="font-size:13px;">上映日期:<?= $row['ondate']; ?></div>
          </div>
          <div style="width: 100%;">
            <button onclick="location.href='?do=intro&id=<?= $row['id']; ?>'">劇情介紹</button>
            <button onclick="location.href='?do=order&id=<?= $row['id']; ?>'">線上訂票</button>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <div class="ct">
      <?php
      if ($now > 1) {
        $prev = $now - 1;
        echo "<a href='?do=$do&p=$prev'><</a>";
      }
      for ($i = 1; $i <= $pages; $i++) {
        $fontsize = ($now == $i) ? '24px' : '16px';
        echo "<a href='?do=$do&p=$i'style='font-size:$fontsize'>$i</a>";
      }
      if ($now < $pages) {
        $next = $now + 1;
        echo "<a href='?do=$do&p=$next'>></a>";
      }
      ?>
    </div>
  </div>
</div>