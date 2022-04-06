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
    <script>
        function listBom(){
            var prodid = document.getElementById("prod").value;
            var msg = "id="+prodid;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var msg = this.responseText;
                    document.getElementById("bom").innerHTML = msg;
                }
            };
            xmlhttp.open("POST","ajax.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(msg);
        }
        function enter_code(e){
            if(e.keyCode == 13 || event.which == 13)
            {
                var code = document.getElementById("code_input").value;
                document.getElementById("code_input").value = "";
                document.getElementById(code).checked = true;
                console.log(code+" checked");
                return false; // returning false will prevent the event from bubbling up.
            }
        }
    </script>
    <title>Főoldal</title>
</head>
<body>
	
	<!-- #region header -->
    <section>
        <h1 class="display-3 text-center">
            BOM ellenőrző
        </h1>
    </section>
    <!-- #endregion -->
	
	
	<header>
        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    szia
                </ul>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">
                <br>
                <form>
                    <select name="prod" id="prod" class="form-select form-select-lg mb-3">
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
                    <input class="btn btn-primary" type="button" value="Listázás" onclick="listBom()">
                    
                    <br><br>
                    <br>
                    <input type='text' onkeypress='return enter_code(event)' id='code_input'>
                </form>
                
            </div>
            <div class="col-7" id="bom">
                
            </div>
        </div class="col-7">
    </div>
	
	<!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>