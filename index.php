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

    <!-- custom js -->
    <script src="js/ajax.js"></script>

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
            <div class="col-lg-5">
                <form>
                    <!-- product list -->
                    <label class="col-form-label" for="prod">Select the product</label>
                    <select name="prod" id="prod" class="form-select form-select-lg mb-3">
                        
                        <?php
                        require_once("ajax/sql.php");
                        $sql = "SELECT `id`,`name`,`ref` FROM quality_web.products;";
                        $res = $mysql->query($sql);
                        while($row = $res->fetch_assoc()){
                            echo "<option value='".$row['id']."' id='prod".$row['id']."'>".$row['name']." - ".$row['ref']."</option>";
                        }
                        ?>
                    </select>

                    <!-- user list -->
                    <label class="col-form-label" for="operator">Select the user</label>
                    <select name="operator" id="operator" class="form-select form-select-lg mb-3">
                        
                        <?php
                        require_once("ajax/sql.php");
                        $sql = "SELECT `id`,`name` FROM quality_web.operator;";
                        $res = $mysql->query($sql);
                        while($row = $res->fetch_assoc()){
                            echo "<option value='".$row['id']."' id='prod".$row['id']."'>".$row['name']."</option>";
                        }
                    ?>
                    </select>

                    <!-- button to list BOM table -->
                    <input class="form-control btn btn-primary btn-block w-100" type="button" value="List BOM" onclick="listBom()">
                </form>
                <div id="confirm-pic">

                </div>
            </div>

            <div class="col-lg-7" id="bom">
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