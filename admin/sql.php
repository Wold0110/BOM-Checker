<?php
    error_reporting(0);
    $mysql;
    if(getenv("DEPLOYED") !== false){
        $mysql= new mysqli("database","quality","Qu4l1ty","quality_web");
    }
    else{
        $mysql= new mysqli("localhost","quality","Qu4l1ty","quality_web");
    }
    if($mysql->connection_error){
        echo "Adatbázis hiba: ".$mysql->connect_error;
        die("Adatbázis hiba: ".$mysql->connect_error);
    }
?>