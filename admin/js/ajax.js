function prod(action){
    switch(action){
        case 'new':
            var newname = document.getElementById("newprod").value;
            var msg = "op=new&name="+newname;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var msg = this.responseText;
                    console.log(msg);
                }
            };
            xmlhttp.open("POST","prod_ajax.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(msg);
            
            break;
        case 'del':
            var todel = document.getElementById("oldprod").value;
            var msg = "op=del&id="+todel;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var msg = this.responseText;
                    console.log(msg);
                }
            };
            xmlhttp.open("POST","prod_ajax.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(msg);
            break;
    }
}
function parttype(action){
    switch(action){
        case 'new':
            var newname = document.getElementById("newpart").value;
            var msg = "op=new&name="+newname;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var msg = this.responseText;
                    console.log(msg);
                }
            };
            xmlhttp.open("POST","part_ajax.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(msg);
            
            break;
        case 'del':
            var todel = document.getElementById("oldpart").value;
            var msg = "op=del&id="+todel;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var msg = this.responseText;
                    console.log(msg);
                }
            };
            xmlhttp.open("POST","part_ajax.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(msg);
            break;
    }
}

function bom(action){
    var prod = document.getElementById("bom_prod").value;
    var type = document.getElementById("bom_type").value;
    var name = document.getElementById("bom_name").value;
    
    switch(action){
        case 'new':
            var msg = "op=new&prod="+prod+"&type="+type+"&name="+name;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var msg = this.responseText;
                    console.log(msg);
                }
            };
            xmlhttp.open("POST","bom_ajax.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(msg);
            
            break;
        case 'del':
            var msg = "op=del&prod="+prod+"&type="+type+"&name="+name;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var msg = this.responseText;
                    console.log(msg);
                }
            };
            xmlhttp.open("POST","bom_ajax.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(msg);
            break;
    }
}