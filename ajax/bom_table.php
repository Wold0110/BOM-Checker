<?php
    require_once("sql.php");
    $id = $_POST['id'];
    $sql = "SELECT products.name AS 'prod' ,part_types.name AS 'type', bom.part_name FROM bom INNER JOIN products ON bom.product_id=products.id INNER JOIN part_types ON part_types.id = bom.part_type WHERE products.id = $id";
    $res = $mysql->query($sql);
    echo "<table class='table table-striped table-bordered'><tbody><tr>"
        ."<th>Termék:</th><th>Típus:</th><th>Név:</th><th>Megvan?</th>"
        ."</tr>";
                    
    while($row = $res->fetch_assoc()){
        echo "<tr><td>".$row['prod']."</td><td>".$row['type']."</td><td>".$row['part_name']."</td><td>"
            ."<input id='".$row['part_name']."' class='form-check-input-bg btn-lg' onclick='box_click(\"".$row['part_name']."\"); return false;' type='checkbox' readonly"
            ."</td></tr>";
    }
    echo "</tbody></table>";
?>