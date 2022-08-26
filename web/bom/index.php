<!-- inspiration from: https://people.inf.elte.hu/d36z4c/ -->
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/color.css" rel="stylesheet" type="text/css" media="screen">
    
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- custom js -->
    <script src="bom/js/user.js"></script>

    <title>Main page</title>
</head>
<body>
    <!-- #region title -->
    <header>
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <img class="img-thumbnail logo d-none d-sm-block" src="img/se.png" 
                    alt="Schneider Electric" title="Schneider Electric">
                <h1 class="display-3 text-center">
                    BOM Checker
                </h1>
            </div>
        </nav>
    </header>
    <!-- #endregion -->

    <!-- #region content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <form>
                    <!-- store user select -->
                    <?php
						require_once("ajax/sql.php");
                        $sql = "SELECT `id`,`name` FROM quality_web.operator;";
                        $res = $mysql->query($sql);
                        $userOptions = "";
                        while($row = $res->fetch_assoc()){
                            $userOptions = $userOptions."<option value='".$row['id']."' id='prod".$row['id']."'>".$row['name']."</option>";
                        }
                        function getLabelSelect($id,$text){
                            $var = "";
                            $var = $var.'<label class="col-form-label" for="'.$id.'">'.$text.'</label>';
                            $var = $var.'<select name="'.$id.'" id="'.$id.'" class="form-select form-select-lg mb-3">';
                            return $var;
                        }
                        function operatorRow($ids,$texts,$width){
                            for($i = 0; $i < count($ids); $i++){
                                echo "<div class='col-".$width."'>";
                                    echo getLabelSelect($ids[$i],$texts[$i]);
                                    echo $GLOBALS['userOptions'];
                                    echo "</select>";
                                echo "</div>";
                            }
                        }
                    ?>
                    <div class="row">
                        <div class="col-4">
                            <!-- product list -->
                            <label class="col-form-label" for="prod">Termék</label>
                            <select name="prod" id="prod" class="form-select form-select-lg mb-3">
                                
                                <?php
                                
                                $sql = "SELECT `id`,`name`,`ref` FROM quality_web.products;";
                                $res = $mysql->query($sql);
                                while($row = $res->fetch_assoc()){
                                    echo "<option value='".$row['id']."' id='prod".$row['id']."'>".$row['name']." - ".$row['ref']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-2">
                            <!-- line leaders -->
                            <label class="col-form-label" for="operator">Sorvezető</label>
                            <select name="operator" id="operator" class="form-select form-select-lg mb-3">
                                <?php
                                require_once("./ajax/sql.php");
                                $sql = "SELECT `id`,`name` FROM quality_web.operator;";
                                $res = $mysql->query($sql);
                                while($row = $res->fetch_assoc()){
                                    echo "<option value='".$row['id']."' id='prod".$row['id']."'>".$row['name']."</option>";
                                }
                            ?>
                            </select> 
                        </div>
                            <?php
                                $ids = array("vez-kar","kozpont","csomag");
                                $texts = array("Vezérlőkar","Központi","Csomagoló");
                                operatorRow($ids,$texts,2);
                            ?>
                    </div>
                    
                    <div class="row">
                        <?php
                            $ids = array("op-1","op-2","op-3","op-4","op-5");
                            $texts = array("Állomás 1/1","Állomás 1/2","Állomás 1/3","Állomás 1/4","Állomás 1/5");
                            operatorRow($ids,$texts,2);
                        ?>
                    </div>
                    <div class="row">
                        <?php
                            $ids = array("op-6","op-7","op-8","op-9","op-10");
                            $texts = array("Állomás 2/1","Állomás 2/2","Állomás 2/3","Állomás 2/4","Állomás 2/5");
                            operatorRow($ids,$texts,2);
                        ?>
                    </div>
                    

                    <!-- button to list BOM table -->
                    <input class="form-control btn btn-primary btn-block w-100" type="button" value="List BOM" onclick="listBom()">
                </form>
                <div id="confirm-pic">

                </div>
            </div>

            <div class="col-lg-4" id="bom">
                <!-- bom table -->
            </div>
    </div>
    <!-- #endregion -->

    <!-- bootstrap 5.1.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>