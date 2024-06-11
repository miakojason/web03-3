<?php
for($i=0;$i<9;$i++){
    $seats=serialize([$i*2,$i*2+1]);
    $sql="INSERT INTO `orders` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seat`) 
                        VALUES (NULL, '20240612000{$i}', '院線片0{$i}', '2024-06-12', '14:00~16:00', '2', '{$seats}');";
    echo $sql;
    echo "<br>";
}


?>