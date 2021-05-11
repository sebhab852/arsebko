$(document).ready(function () {
    //getUsers();
    console.log("seawas");
    $("#submitRegisterSingleUser").attr("onclick","regsiterSingleUser()");
    $("#registerBuisnessButton").attr("onclick","registerBusiness()");
});

$(document).ready(function () {
    let form = $("#registerSingleUserForm")
    form.onsubmit = function (event) { event.preventDefault() }
});

$(document).ready(function () {
    let form = $("#registerBusinessForm")
    form.onsubmit = function (event) { event.preventDefault() }
});


function regsiterSingleUser(){

    if($("#registerFormOrt").val() == "" || $("#registerFormStrasse").val() == "" || $("#registerFormPLZ").val() == ""|| $("#registerFormVorname").val() == ""|| $("#registerFormNachname").val() == "" || $("#registerFormUsername").val() == "" || $("#registerFormEmail").val() == "" || $("#registerFormPasswort").val() == ""){
        alert("Bitte füllen Sie alle verpflichtenden Felder aus!")
        return false;
    }
    if($("#registerFormPasswort").val() != $("#registerFormPasswortCheck").val()) {
        alert("Passwörter stimmen nicht überein!")
        return false;
    }

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
        data: jsonData,
        dataType: "json",
        success: function (response) {  
            console.log(response)
            $("#register-user-container").hide();  
            $("#resgister-user-success").show("slow"); 	
        }        
    });
}

function registerBusiness(){
    console.log("njoa")
    if($("#registerBizFirmenname").val() == "" || $("#registerBizStrasse").val() == "" || $("#registerBizPLZ").val() == ""|| $("#registerBizOrt").val() == ""|| $("#firmanachname").val() == "" || $("#firmavorname").val() == "" || $("#registerBizEmail").val() == "" || $("#registerBizUsername").val() == "" || $("#registerBizPasswort").val() == "" || $("#registerBizPasswortCheck").val() == ""){

        alert("Bitte füllen Sie alle verpflichtenden Felder aus!")
        return false;
    }
    if($("#registerFormPasswort").val() != $("#registerFormPasswortCheck").val()) {
        alert("Passwörter stimmen nicht überein!")
        return false;
    }

    let jsonData ={
        method: "registerBusiness",
        param: {
            firmaName: $("#registerBizFirmenname").val(),
            anschriftFirma:{
                ort:$("#registerBizOrt").val(),
                strasse:$("#registerBizStrasse").val(),
                plz:$("#registerBizPLZ").val()
            },
            person:{
                vorname:$("#firmavorname").val(),
                nachname:$("#firmanachname").val(),
                username:$("#registerBizUsername").val(),
                email:$("#registerBizEmail").val(),
                passwort:$("#registerBizPasswort").val()
            }
        }
    }
    
    $.ajax({
        type: "POST",
        url: "./servicehandler.php",
        cache: false,
        data: jsonData,
        dataType: "json",
        success: function (response) {  
            console.log(response)
            $("#register-business-container").hide();  
            $("#resgister-business-success").slideToggle(); 	
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
