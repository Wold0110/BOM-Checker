<?php
    require_once("sql.php");
    $id = $_POST['id'];
    $sql = "SELECT COUNT(*) AS 'count' FROM bom WHERE bom.product_id = $id";
    $res = $mysql->query($sql);  
    while($row = $res->fetch_assoc()){
        echo $row['count'];
    }
?>