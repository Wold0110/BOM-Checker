<?php
    require_once("sql.php");
    $from = $_POST['from'];
    
    $sql = "SELECT products.name AS 'name', timestamps.time AS 'time', operator.name AS 'user' FROM timestamps INNER JOIN products ON products.id = timestamps.prod_id INNER JOIN operator ON operator.id = timestamps.operator WHERE timestamps.time >= '$from'";
    $res = $mysql->query($sql);
    echo "<table class='table table-striped table-bordered'><tbody><tr>"
        ."<th>Prod:</th><th>Time:</th><th>User:</th>"
        ."</tr>";
    while($row = $res->fetch_assoc()){
        echo "<tr><td>".$row['name']."</td><td>".$row['time']."</td><td>".$row['user']
            ."</td></tr>";
    }
    echo "</tbody></table>";
?>