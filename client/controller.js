$(document).ready(function () {
    getUsers();
    console.log("seawas");
    $("#submitRegisterSingleUser").attr("onclick","regsiterSingleUser()")
});


function regsiterSingleUser(){

    //.log($("#registerFormOrt").val())

    let jsonData ={
        method: "registerSingleUser",
        param: {
            anschrift:{
                ort:$("#registerFormOrt").val(),
                strasse:$("#registerFormStrasse").val(),
                plz:$("#registerFormPLZ").val()
            },
            person:{
                vorname:$("#registerFormVorname").val(),
                nachname:$("#registerFormNachname").val(),
                username:$("#registerFormUsername").val(),
                email:$("#registerFormEmail").val(),
                passwort:$("#registerFormPasswort").val()
            }
        }
      } 
    console.log(jsonData)

    $.ajax({
        type: "POST",
        url: "./servicehandler.php",
        cache: false,
        //data: {method: "registerNewSingleUser", param: null},
        data: jsonData,
        dataType: "json",
        success: function (response) {  
            console.log(response)
            console.log("boih")
        }        
    });
}

function getUsers(){
    $.ajax({
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: {method: "getAllUsers", param: null},
        dataType: "json",
        success: function (response) {  
            console.log(response)
        }        
    });
}
