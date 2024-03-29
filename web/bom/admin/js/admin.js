

function prod(action){
    switch(action){
        case 'new':
            var newname = document.getElementById("newprod").value;
            var newref = document.getElementById("newprodref").value;
            var msg = "op=new&name="+newname+"&ref="+newref;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            xmlhttp.open("POST","/bom/admin/ajax/prod_ajax.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(msg);
            
            break;
        case 'del':
            var todel = document.getElementById("oldprod").value;
            var msg = "op=del&id="+todel;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            xmlhttp.open("POST","/bom/admin/ajax/prod_ajax.php",true);
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
                    console.log(this.responseText);
                }
            };
            xmlhttp.open("POST","/bom/admin/ajax/part_ajax.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(msg);
            
            break;
        case 'del':
            var todel = document.getElementById("oldpart").value;
            var msg = "op=del&id="+todel;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            xmlhttp.open("POST","/bom/admin/ajax/part_ajax.php",true);
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
            xmlhttp.open("POST","/bom/admin/ajax/bom_ajax.php",true);
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
            xmlhttp.open("POST","/bom/admin/ajax/bom_ajax.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(msg);
            break;
    }
}

function listTimestamps(){
    var from_date = document.getElementById("from_date").value;
    var to_date = document.getElementById("to_date").value;
    var msg = "from="+from_date+"&to="+to_date;

    if(from_date != "" && to_date != ""){
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("timestamp-table").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","/bom/admin/ajax/timestamp_ajax.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(msg);
    }   
}

function downloadList(){
    var from_date = document.getElementById("from_date").value;
    var to_date = document.getElementById("to_date").value;
    var msg = "from="+from_date+"&to="+to_date;

    if(from_date != "" && to_date != ""){
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText.includes(".csv")){
                    document.getElementById("timestamp-table").innerHTML="<a class='form-control btn btn-primary btn-block w-100' href='reports/"+this.responseText+"'>Click to download data</a>";
                    console.log(this.responseText);
                }
            }
        };
        xmlhttp.open("POST","/bom/admin/ajax/download_table.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(msg);
    }
}

function newName(){
    var name = $('#newname').val();
    var data = new FormData();
    data.append("name",name);

    $.ajax({
        url: "/bom/admin/ajax/name_add.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        success: function (msg){
            console.log("success");
        },
    });
}

function delName(){
    var id = $("#oldname").find(":selected").val();
    var data = new FormData();
    data.append("id",id)
    $.ajax({
        url: "/bom/admin/ajax/name_del.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        success: function (msg){
            console.log("success");
        },
    });
}