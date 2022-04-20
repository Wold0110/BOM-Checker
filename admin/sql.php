<?php
    error_reporting(0);
    $mysql = new mysqli("172.17.0.2","quality","Qu4l1ty","quality_web");
    if($mysql->connection_error){
        echo "Adatbázis hiba: ".$mysql->connect_error;
        die("Adatbázis hiba: ".$mysql->connect_error);
    }
    //else{
    //    echo "Sikeres adatbázis csatlakozás";
    //}
?>