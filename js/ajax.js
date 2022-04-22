var count = 0;
var proid = 0;
var ids = [];

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

function box_click(id){
    if(ids.includes(id)){
        var index = ids.indexOf(id);
        if(index > -1){
            ids.splice(index,1);
        }
    }
    else{
        ids.push(id);
    }
    if(ids.length == count){
        timestampRef();
        alert("Product recorded with timestamp attached.")
    }
}

function timestampRef(){
    var operator = document.getElementById("operator").value;
    var msg = "id="+prodid+"&operator="+operator;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if(this.responseText != "log created"){
                console.log(this.responseText);
                alert("Critical Error!");
            }
        }
    };
    xmlhttp.open("POST","all_checked.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(msg);
}
