<html>
<head>
	<!-- https://people.inf.elte.hu/d36z4c/ -->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- css -->
    <link href="style.css" rel="stylesheet" type="text/css" media="screen">
    <link href="color.css" rel="stylesheet" type="text/css" media="screen">
    
    <!-- custom css -->
    <script src="js/ajax.js"></script> 
    
    <title>Admin page</title>
</head>
<body>
	<!-- #region header -->
    <section>
        <h1 class="display-3 text-center">
            BOM Creator Web Interface
        </h1>
    </section>
    <!-- #endregion -->
	
    <!-- #region content -->
    <div class="container-fluid">
        <div class="row">
            <!-- products -->
            <div class="col-4">
                <form>
                    <h4>Product managment</h4>
                    <div class="form-group">
                        <label class="col-form-label" for="newprod">Type the new product's reference/name</label>
                        <input class="form-control" placeholder="EEE114569" type="text" name="newprod" id="newprod">
                        <input class="form-control btn btn-primary btn-block w-100" type="button" value="Add" onclick="prod('new')">
                    </div>
                    <label class="col-form-label" for="oldprod">Select the product</label>
                    <div class="form-group">
                        <select class="form-select" name="oldprod" id="oldprod">
                        <?php
                            require_once(__DIR__."\..\sql.php");
                            $sql = "SELECT `id`,`name` FROM quality_web.products;";
                            $res = $mysql->query($sql);
                            while($row = $res->fetch_assoc()){
                                echo "<option value='".$row['id']."' id='prod".$row['id']."'>".$row['name']."</option>";
                            }
                        ?>

                        <input class="form-control btn btn-primary btn-block w-100" type="button" value="Delete" onclick="prod('del')">
                        </select>
                    </div>
                </form>
            </div>

            <!-- parts -->
            <div class="col-4">
                <h4>Add new Part Type</h4>
                <div class="form-group">
                    <label class="col-form-label" for="newpart">Type the new part type name</label>
                    <input class="form-control" placeholder="Magnetic Spring" type="text" name="newpart" id="newpart">
                    <input class="form-control btn btn-primary btn-block w-100" type="button" value="Add" onclick="parttype('new')">
                </div>
                
                <label class="col-form-label" for="oldpart">Select the part</label>
                <select class="form-select" name="oldpart" id="oldpart">
                    <?php
                        require_once(__DIR__."\..\sql.php");
                        $sql = "SELECT `id`,`name` FROM quality_web.part_types;";
                        $res = $mysql->query($sql);
                        while($row = $res->fetch_assoc()){
                            echo "<option value='".$row['id']."' id='part".$row['id']."'>".$row['name']."</option>";
                        }
                    ?>
                </select>
                <input class="form-control btn btn-primary btn-block w-100" type="button" value="Delete" onclick="parttype('del')">
            </div>

            <!-- bom -->
            <div class="col-4">
                <h4>Add new BOM</h4>
                <label class="col-form-label" for="bom_prod">Select the product</label>
                <select class="form-select" name="bom_prod" id="bom_prod">
                    <?php
                        require_once(__DIR__."\..\sql.php");
                        $sql = "SELECT `id`,`name` FROM quality_web.products;";
                        $res = $mysql->query($sql);
                        while($row = $res->fetch_assoc()){
                            echo "<option value='".$row['id']."' id='prod".$row['id']."'>".$row['name']."</option>";
                        }
                    ?>
                </select>
                <label class="col-form-label" for="bom_type">Select the part type</label>
                <select class="form-select"name="bom_type" id="bom_type">
                    <?php
                        require_once(__DIR__."\..\sql.php");
                        $sql = "SELECT `id`,`name` FROM quality_web.part_types;";
                        $res = $mysql->query($sql);
                        while($row = $res->fetch_assoc()){
                            echo "<option value='".$row['id']."' id='part".$row['id']."'>".$row['name']."</option>";
                        }
                    ?>
                </select>
                <label class="col-form-label" for="bom_name">Type the part type</label>
                <input class="form-control" type="text" name="bom_name" id="bom_name">
                <div class="row">
                    <div class="col-6">
                        <input class="form-control btn btn-primary btn-block w-100" type="button" value="Add" onclick="bom('new')">
                    </div>
                    
                    <div class="col-6">
                        <input class="form-control btn btn-primary btn-block w-100" type="button" value="Delete" onclick="bom('del')">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
            <label class="col-form-label" for="from_date">Select a FROM date:</label>
                <input class="form-control" id="from_date" name="from_date" type="date">
                <input class="form-control btn btn-primary btn-block w-100" type="button" value="List Timestamps from" onclick="listTimestamps()">
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div id="timestamp-table"></div>
        </div>
    </div>
	
	<!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>