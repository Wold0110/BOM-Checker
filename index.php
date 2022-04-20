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

    <!-- custom js -->
    <script src="js/ajax.js"></script> 
    <script src="js/code_check.js"></script> 
    <title>Main page</title>
</head>
<body>
	<!-- #region header -->
    <section>
        <h1 class="display-3 text-center">
            BOM Checker
        </h1>
    </section>
    <!-- #endregion -->
	
	<!-- #region navbar -->
	<header>
        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            szia    
            </div>
        </nav>
    </header>
    <!-- #endregion -->

    

    <!-- #region concent -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">
                <br>
                <form>
                    <select name="prod" id="prod" class="form-select form-select-lg mb-3">
                    <!-- php list -->
                    <?php
                        require_once("sql.php");
                        $sql = "SELECT `id`,`name` FROM quality_web.products;";
                        $res = $mysql->query($sql);
                        while($row = $res->fetch_assoc()){
                            echo "<option value='".$row['id']."' id='prod".$row['id']."'>".$row['name']."</option>";
                        }
                    ?>
                    </select>
                    <input class="form-control btn btn-primary btn-block w-100" type="button" value="Listázás" onclick="listBom()">
                    
                    <br>
                    <label class="col-form-label" for="code_input">Type the product REF</label>
                    <input class="form-control" type='text' onkeypress='return enter_code(event)' id='code_input'>
                </form>
                
            </div>
            <div class="col-7" id="bom">
                
            </div>
        </div class="col-7">
    </div>
	<!-- #endregion -->

	<!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>