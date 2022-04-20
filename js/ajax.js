var count = 0;
var proid = 0;
function listBom(){
    prodid = document.getElementById("prod").value;
    var msg = "id="+prodid;

    //get BOM
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

    //get BOM count
    getBOMcount(msg);
}
function getBOMcount(msg){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            count = parseInt(this.responseText);
            console.log("bom count:"+this.responseText);
        }
    };
    xmlhttp.open("POST","ajax_count.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(msg);
}

function timestampRef(){
    var msg = "id="+prodid;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if(this.responseText != "log created"){
                alert("Critical Error!");
            }
        }
    };
    xmlhttp.open("POST","all_checked.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(msg);
}
