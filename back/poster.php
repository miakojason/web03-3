<style>
    .item{
        padding: 3px;
        margin: 3px;
        align-items: center;
        color:black;
        background-color: white;
    }
    .item div{
        width: 24.5%;
        margin:0 0.25%;
        margin: auto;
        text-align: center;
    }
</style>
<h3 class="ct">預告片清單</h3>
<div class="ct posterdiv" style="display: flex;justify-content:space-around">
    <div>預告片海報</div>
    <div>預告片片名</div>
    <div>預告片排序</div>
    <div>操作</div>
</div>
<form action="./api/save_poster.php" method="post">
    <div style="height: 190px;overflow:auto;">
        <?php
        $rows = $Poster->all(" order by rank");
        foreach ($rows as $idx=>$row) {
        ?>
        <div class="item" style="display: flex; justify-content:space-between;">
            <div><img src="./img/<?=$row['img'];?>" style="width:60px;height:80px;"></div>
            <div><input type="text" name="name[]" value="<?=$row['name'];?>"></div>
            <div>
                <input class="btn" type="button" value="往上" data-id="<?=$row['id'];?>" data-sw="<?=($idx!==0)?$rows[$idx-1]['id']:$row['id'];?>" >
                <input class="btn" type="button" value="往下" data-id="<?=$row['id'];?>" data-sw="<?=((count($rows)-1)!=$idx)?$rows[$idx+1]['id']:$row['id'];?>" >
            </div>
            <div>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <input type="checkbox" name="sh[]" value="<?=$row['id'];?><?=($row['sh']==1)?'checked':'';?>">顯示
                <input type="checkbox" name="del[]" value="<?=$row['id'];?>">刪除
                <select name="ani[]" id="">
                    <option value="1"<?=($row['ani']==1)?'selected':'';?>>淡入淡出</option>
                    <option value="2"<?=($row['ani']==2)?'selected':'';?>>收縮</option>
                    <option value="3"<?=($row['ani']==3)?'selected':'';?>>滑入滑出</option>
                </select>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="ct">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
</form>

<h3 class="ct">新增預告片海報</h3>
<form action="./api/save_poster.php" method="post" enctype="multipart/form-data">
<table class="ts">
<tr>
    <td>預告片海報</td>
    <td><input type="file" name="poster" id=""></td>
    <td>預告片名</td>
    <td><input type="text" name="name" id=""></td>
</tr>
</table>
<div class="ct">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>
</form>
<script>
    $(".btn").on("click",function(){
        let id =$(this).data('id');
        let sw=$(this).data('sw');
        let table='poster';
        $.post("./api/sw.php",{id,sw,table},()=>{
            location.reload()
        })
    })
</script>