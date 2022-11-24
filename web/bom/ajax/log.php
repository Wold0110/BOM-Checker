<?php
    
    $id = $_POST['id'];
    $op = $_POST['operator'];
    $vezkar = $_POST['vez-kar'];
    $vezkar2 = $_POST['vez-kar2'];
    $kozpont = $_POST['kozpont'];
    $kozpont2 = $_POST['kozponz2'];
    $csomag = $_POST['csomag'];

    $op1 = $_POST['op-1'];
    $op2 = $_POST['op-2'];
    $op3 = $_POST['op-3'];
    $op4 = $_POST['op-4'];
    $op5 = $_POST['op-5'];
    $op6 = $_POST['op-6'];
    $op7 = $_POST['op-7'];
    $op8 = $_POST['op-8'];
    $op9 = $_POST['op-9'];
    $op10 = $_POST['op-10'];
    
    require_once("sql.php");
    $sql = "INSERT INTO quality_web.timestamps VALUES ($id,DEFAULT,$op,$vezkar,$vezkar2,$kozpont,$kozpont2,$csomag,"
        ."$op1,$op2,$op3,$op4,$op5,$op6,$op7,$op8,$op9,$op10)";
    $res = $mysql->query($sql);
    echo "log created";
?>