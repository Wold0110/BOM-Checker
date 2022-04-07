<html>
<head>
	<!-- https://people.inf.elte.hu/d36z4c/ -->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
    <!-- css -->
    <link href="style.css" rel="stylesheet" type="text/css" media="screen">
    <link href="color.css" rel="stylesheet" type="text/css" media="screen">
    
    <!-- custom css -->
    <script src="js/ajax.js"></script> 
    
    <title>Főoldal</title>
</head>
<body>
	
	<!-- #region header -->
    <section>
        <h1 class="display-3 text-center">
            BOM készítő
        </h1>
    </section>
    <!-- #endregion -->
	
	
	<header>
        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <?php
                    $url;
                    $title;
                    $url = array("users.php","nodes.php","plc.php","downtime.php","upload_dialog.php","substation.php","logout.php");
                    $title = array("Felhasználók","Helyszínek","PLC","Állasokok","Fájl feltöltés","Alállomás","Kilépés");
                    for($i = 0; $i < count($url);$i++){
                        echo "<li class='nav-item active'><a class='nav-link' href='$url[$i]'>$title[$i]</a></li>";
                    }
                ?>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <div class="row">
            <!-- products -->
            <div class="col-4">
                <form>
                    <h4>Product managment</h4>
                    <div class="form-group">
                        <label class="col-form-label" for="newprod">Type the new produts reference/name</label>
                        <input class="form-control" placeholder="EEE114569" type="text" name="newprod" id="newprod">
                        <input class="form-control btn btn-primary btn-block" type="button" value="Add" onclick="prod('new')">
                    </div>
                    <div class="form-group">
                        <select class="form-select" name="oldprod" id="oldprod">
                        <?php
                            require_once("sql.php");
                            $sql = "SELECT `id`,`name` FROM quality_web.products;";
                            $res = $mysql->query($sql);
                            while($row = $res->fetch_assoc()){
                                echo "<option value='".$row['id']."' id='prod".$row['id']."'>".$row['name']."</option>";
                            }
                        ?>

                        <input class="form-control btn btn-primary btn-block" type="button" value="Törlés" onclick="prod('del')">
                        </select>
                    </div>
                </form>
            </div>

            <!-- parts -->
            <div class="col-4">
                <h4>Új termék felvitele</h4>
                <input type="text" name="newpart" id="newpart">
                <br>
                <br>
                <input type="button" value="Új típus létrehozás" onclick="parttype('new')">
                <br>
                <br>
                <br>
                <br>
                <select name="oldpart" id="oldpart">
                    <?php
                        require_once("sql.php");
                        $sql = "SELECT `id`,`name` FROM quality_web.part_types;";
                        $res = $mysql->query($sql);
                        while($row = $res->fetch_assoc()){
                            echo "<option value='".$row['id']."' id='part".$row['id']."'>".$row['name']."</option>";
                        }
                    ?>
                </select>
                <br>
                <br>
                <input type="button" value="Törlés" onclick="parttype('del')">
            </div>

            <!-- bom -->
            <div class="col-4">
                <h4>Új bom felvitele</h4>
                

                <br>
                <br>
                <select name="bom_prod" id="bom_prod">
                    <?php
                        require_once("sql.php");
                        $sql = "SELECT `id`,`name` FROM quality_web.products;";
                        $res = $mysql->query($sql);
                        while($row = $res->fetch_assoc()){
                            echo "<option value='".$row['id']."' id='prod".$row['id']."'>".$row['name']."</option>";
                        }
                    ?>
                </select>
                <br>
                <br>
                <select name="bom_type" id="bom_type">
                    <?php
                        require_once("sql.php");
                        $sql = "SELECT `id`,`name` FROM quality_web.part_types;";
                        $res = $mysql->query($sql);
                        while($row = $res->fetch_assoc()){
                            echo "<option value='".$row['id']."' id='part".$row['id']."'>".$row['name']."</option>";
                        }
                    ?>
                </select>
                <br>
                <br>
                <input type="text" name="bom_name" id="bom_name">
                <br>
                <br>
                <input type="button" value="Új típus létrehozás" onclick="bom('new')">
                <br>
                <br>
                <input type="button" value="Törlés" onclick="bom('del')">
            </div>


        </div>
    </div>
	
	<!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>