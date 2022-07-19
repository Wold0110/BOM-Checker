<?php
    require_once("sql.php");

    $from = $_POST['from'];
    $to = $_POST['to'];
    
    $sql = "SELECT products.name AS 'name', timestamps.time AS 'time', operator.name AS 'user' FROM timestamps INNER JOIN products ON products.id = timestamps.prod_id INNER JOIN operator ON operator.id = timestamps.operator WHERE timestamps.time >= '$from' AND DATE(timestamps.time) <= '$to'";
    $res = $mysql->query($sql);

    $fileName = date("Y-m-d-H-i-s").".csv";
    
    //if exists, DELETE
    if(file_exists($fileName)){ unlink($fileName); }

    //write data
    $file = fopen($fileName,"w");
    fwrite($file,"Termek,Ido,Felhasznalo\r\n");
    while($row = $res->fetch_assoc()){ fwrite($file,$row['name'].",".$row['time']."".$row['user']."\r\n"); }
    fclose($file); //close

    //move
    rename($fileName,"../reports/".$fileName);

    //keep only top N
    $topN = 5;
    $glob = glob("../reports/*.csv",GLOB_BRACE);
    for($i = 0;$i+$topN < count($glob);$i++){ unlink($glob[$i]); }
    
    echo $fileName;
?>