var count = 0;
var ids = [];

function listBom(){
    prodid = document.getElementById("prod").value;
    var msg = "id="+prodid;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var msg = this.responseText;
            document.getElementById("bom").innerHTML = msg;
        }
    };
    xmlhttp.open("POST","./ajax/bom_table.php",true);
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
            ids = [];
        }
    };
    xmlhttp.open("POST","./ajax/bom_count.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(msg);
}

function box_click(id){
    var picid = id.replace("/","^");
    var question = "<p>"+id+"</p>" 
    +"<img class='img-fluid' "
    +"src='img/parts/"+picid+".JPG' alt='Kép nem található' title='"+id+"'>"
    +"<div class='row'>"
    +"<div class='col-6'><input onclick='box_correct(\""+id+"\")' class='form-control btn btn-primary btn-block w-100' type='button' value='Correct'></div>"
    +"<div class='col-6'><input onclick='box_wrong(\""+id+"\")' class='form-control btn btn-danger btn-block w-100' type='button' value='Wrong'></div>"
    +"</div>"
    ;
    document.getElementById('confirm-pic').innerHTML = question;
}

function box_correct(id){
    document.getElementById(id).checked = true;
    if(!ids.includes(id)){
        ids.push(id);
        if(ids.length == count){
            timestampRef();
            alert("Product recorded with timestamp attached.")
        }
    }
    
}
function box_wrong(id){
    document.getElementById(id).checked = false;
    if(ids.includes(id)){
        var index = ids.indexOf(id);
        if(index > -1){
            ids.splice(index,1);
        }
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
    xmlhttp.open("POST","./ajax/log.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(msg);
}
