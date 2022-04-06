<?php
    require_once("sql.php");
    $op = $_POST['op'];
    $prod = $_POST['prod'];
    $type = $_POST['type'];
    $name = $_POST['name'];

    switch($op){
        case "new":
            $sql = "INSERT INTO quality_web.bom VALUES($prod,$type,'$name')";
            $mysql->query($sql);
            echo "Sikeresen létrehozva.";
            break;
        case "del":
            $sql = "DELETE FROM quality_web.bom WHERE `product_id` = $prod AND `part_type` = $type AND `name` = '$name' ";
            echo $sql;
            $mysql->query($sql);
            echo "Sikeresen törölve.";
            break;
    }
?>