function enter_code(e){
    if(e.keyCode == 13)
    {
        try{
            var code = document.getElementById("code_input").value; //get ref
            document.getElementById("code_input").value = "";       //clear text input
            if(!document.getElementById(code).checked){             //if already checked
                document.getElementById(code).checked = true;       //check the checkbox
                console.log(code+" checked");                       //log to console
                count--;                                            //decrease the count
                if(count == 0){                                     //is all checked?
                    console.log("all checked");                     //log 'all checked'
                    timestampRef();                                 //create timestamp at server
                    alert("All checked!");                          //alert all checked to user
                                
                }
            }
        }
        catch{
            alert("Ref not found!");
        }
        
        return false; // returning false will prevent the event from bubbling up.
    }
}