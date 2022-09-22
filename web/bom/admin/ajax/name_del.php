<?php
    $id = $_POST['id'];
    $delete = "DELETE FROM `operator` WHERE `id` = $id";
    require_once("sql.php");
    $mysql->query($delete);
?>