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
    xmlhttp.open("POST","/bom/ajax/bom_table.php",true);
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
    xmlhttp.open("POST","/bom/ajax/bom_count.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(msg);
}

function box_click(id){
    var picid = id.replace("/","^");
    var question = "<p>"+id+"</p>" 
    +"<img class='img-fluid' "
    +"src='/bom/img/parts/"+picid+".JPG' alt='Kép nem található' title='"+id+"'>"
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

    var data = new FormData();
    data.append("id",prodid);
    data.append("operator",operator);
    data.append("vez-kar",$("#vez-kar").find(":selected").val());
    data.append("vez-kar2",$("#vez-kar").find(":selected").val());
    data.append("csomag",$("#csomag").find(":selected").val());
    data.append("kozpont",$("#kozpont").find(":selected").val());
    data.append("kozpont2",$("#kozpont").find(":selected").val());
    
    
    for(var i = 1; i < 11; i++){
        data.append("op-"+i,$("#op-"+i).find(":selected").val());
    }
    $.ajax({
        url: "/bom/ajax/log.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        success: function (msg){
            alert("Product recorded with timestamp attached.")
            console.log(msg);
        },
        failure: function(msg){ alert("Critical Error!");}
     });
}
