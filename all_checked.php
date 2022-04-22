<?php
    require_once("sql.php");
    $id = $_POST['id'];
    $op = $_POST['operator'];
    $sql = "INSERT INTO quality_web.timestamps VALUES ($id,DEFAULT,$op)";
    $res = $mysql->query($sql);
    echo "log created";
?>