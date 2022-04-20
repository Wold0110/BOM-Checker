<?php
    require_once("sql.php");
    $id = $_POST['id'];
    $sql = "INSERT INTO quality_web.timestamps VALUES ($id,DEFAULT)";
    $res = $mysql->query($sql);
    echo "log created";
?>