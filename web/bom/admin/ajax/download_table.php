<?php
    require_once("sql.php");    
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    /*
    */
    
    $from = $_POST['from'];
    $to = $_POST['to'];
    
    $sql = "SELECT products.name AS 'name', timestamps.time AS 'time', operator.name AS 'line-leader'"
        ." ,(SELECT `name` FROM operator WHERE `id` = timestamps.`vezkar` ) AS 'vezkar', (SELECT `name` FROM operator WHERE `id` = timestamps.`kozpont` ) AS 'kozpont', (SELECT `name` FROM operator WHERE `id` = timestamps.`csomag` ) AS 'csomag', (SELECT `name` FROM operator WHERE `id` = timestamps.`op-1` ) AS 'op-1', (SELECT `name` FROM operator WHERE `id` = timestamps.`op-2` ) AS 'op-2'"
        ." ,(SELECT `name` FROM operator WHERE `id` = timestamps.`op-3` ) AS 'op-3', (SELECT `name` FROM operator WHERE `id` = timestamps.`op-4`) AS 'op-4', (SELECT `name` FROM operator WHERE `id` = timestamps.`op-5` ) AS 'op-5', (SELECT `name` FROM operator WHERE `id` = timestamps.`op-6` ) AS 'op-6', (SELECT `name` FROM operator WHERE `id` = timestamps.`op-7` ) AS 'op-7'"
        ." ,(SELECT `name` FROM operator WHERE `id` = timestamps.`op-1` ) AS 'op-8', (SELECT `name` FROM operator WHERE `id` = timestamps.`op-9`) AS 'op-9', (SELECT `name` FROM operator WHERE `id` = timestamps.`op-10` ) AS 'op-10'"
        ." FROM timestamps INNER JOIN products ON products.id = timestamps.prod_id INNER JOIN operator ON operator.id = timestamps.operator WHERE timestamps.time >= '$from' AND DATE(timestamps.time) <= '$to'";
    $res = $mysql->query($sql);

    $fileName = date("Y-m-d-H-i-s").".csv";
    
    //if exists, DELETE
    if(file_exists($fileName)){ unlink($fileName); }

    //write data
    $file = fopen($fileName,"w");
    fwrite($file,"sep=;\r\nTermek;Ido;SorVezeto;VezKar;Kozpont;Csomag;Op1;Op2;Op3;Op4;Op5;Op6;Op7;Op8;Op9;Op10\r\n");
    while($row = $res->fetch_assoc()){ 
        fwrite($file,$row['name'].";".$row['time'].";".$row['line-leader'].";".$row['vezkar'].";".$row['kozpont'].";".$row['csomag'].";"
            .$row['op-1'].";".$row['op-2'].";".$row['op-3'].";".$row['op-4'].";".$row['op-5'].";"
            .$row['op-5'].";".$row['op-6'].";".$row['op-8'].";".$row['op-9'].";".$row['op-10'].";"
            ."\r\n");
    }
    fclose($file); //close

    //move
    rename($fileName,"../reports/".$fileName);

    //keep only top N
    $topN = 5;
    $glob = glob("../reports/*.csv",GLOB_BRACE);
    for($i = 0;$i+$topN < count($glob);$i++){ unlink($glob[$i]); }
    
    echo $fileName;
?>