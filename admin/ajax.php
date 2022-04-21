<?php
    require_once(__DIR__."\..\sql.php");
    session_start();
    $priv = $_SESSION['priv'];
    $sql = "SELECT `un`, (SELECT `name` FROM lds_data.roles WHERE `id` = `priv`) AS 'role', `priv` FROM lds_data.users WHERE `priv` <= $priv;";
    $res = $mysql->query($sql);
    while($row = $res->fetch_assoc()){
        echo "<tr onclick='update(\"".$row['un']."\",\"".$row['priv']."\")'><td>".$row['un']."</td><td>".$row['role']."</td></tr>";
    }
?>