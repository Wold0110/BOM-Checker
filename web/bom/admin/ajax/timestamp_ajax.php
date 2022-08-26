<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    require_once("sql.php");
    $from = $_POST['from'];
    $to = $_POST['to'];
    $sql = "SELECT products.name AS 'name', timestamps.time AS 'time', operator.name AS 'line-leader'"
        ." ,timestamps.vezkar AS 'vezkar', timestamps.kozpont AS 'kozpont', timestamps.csomag AS 'csomag', timestamps.`op-1` AS 'op-1', timestamps.`op-2` AS 'op-2'"
        ." ,timestamps.`op-3` AS 'op-3', timestamps.`op-4` AS 'op-4', timestamps.`op-5` AS 'op-5', timestamps.`op-6` AS 'op-6', timestamps.`op-7` AS 'op-7'"
        ." ,timestamps.`op-8` AS 'op-8', timestamps.`op-9` AS 'op-9', timestamps.`op-10` AS 'op-10'"
        ." FROM timestamps INNER JOIN products ON products.id = timestamps.prod_id INNER JOIN operator ON operator.id = timestamps.operator WHERE timestamps.time >= '$from' AND DATE(timestamps.time) <= '$to'";
    $res = $mysql->query($sql);
    echo "<table class='table table-striped table-bordered'><tbody><tr>"
        ."<th>Prod:</th><th>Time:</th><th>Line Leader:</th>"
        ."</tr>";
    while($row = $res->fetch_assoc()){
        echo "<tr><td>".$row['name']."</td><td>".$row['time']."</td><td>".$row['line-leader']
            ."</td></tr>";
    }
    echo "</tbody></table>";
?>