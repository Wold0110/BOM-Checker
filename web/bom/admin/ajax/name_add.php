<?php
    $name = $_POST['name'];
    $insert = "INSERT INTO `operator` VALUES(NULL,'$name')";
    require_once("sql.php");
    $mysql->query($insert);
?>