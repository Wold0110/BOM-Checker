<?php
    require_once(__DIR__."\..\sql.php");
    $op = $_POST['op'];

    switch($op){
        case "new":
            $name = $_POST['name'];
            $sql = "INSERT INTO quality_web.products VALUES(NULL,'$name')";
            $mysql->query($sql);
            echo "Sikeresen létrehozva.";
            break;
        case "del":
            $id = $_POST['id'];
            $sql = "DELETE from quality_web.products WHERE `id` = $id";
            $mysql->query($sql);
            echo "Sikeresen törölve.";
            break;
    }
?>