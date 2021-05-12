$(document).ready(function () {
    // console.log("seawas");
    
    //getUsers();
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


let loginAlert = false;
let loginFailed = false;
function loginUser() {
    let usernameLogin = $("#usernameLogin").val();
    let passwordLogin = $("#passwordLogin").val();

    if(usernameLogin == '' || passwordLogin == '') {
        if(!loginAlert) {
            let loginTitle = document.getElementById("login-title");
            let alertDiv = document.createElement("div");
            $(alertDiv).attr("id", "login-alert");
            $(alertDiv).attr("class", "alert alert-danger");
            $(alertDiv).attr("role", "alert");        
            $(alertDiv).text("Bitte füllen Sie alle Felder aus!");
    
            $(alertDiv).css("margin-top", "1em");
            $(alertDiv).css("font-size", "0.75em");
            $(alertDiv).css("display", "block");
            $(alertDiv).css("margin-left", "auto");
            $(alertDiv).css("margin-right", "auto");
            $(alertDiv).css("width", "40%");
            $(alertDiv).css("font-weight", "bold");
    
            loginTitle.append(alertDiv);
            loginAlert = true;
            
            return;
        }
        else if(loginAlert == true && loginFailed == true) {
            let loginAlert = document.getElementById("login-alert");
            $(loginAlert).text("Bitte füllen Sie alle Felder aus!");
            
            loginAlert = true;
            return;
        }
    }


    $('#login-form').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "./servicehandler.php",
            cache: false,
            data: {method: "loginUser", param: {"username":""+usernameLogin+"", "password":""+passwordLogin+""} },
            dataType: "json",
            success: function(response) {
                // console.log(response)

                if(response == -1) {
                    if( (loginAlert == true && loginFailed == false) || (loginAlert && loginFailed) ) {
                        let loginAlert = document.getElementById("login-alert");
                        $(loginAlert).text("Der Benutzername oder das Passwort ist falsch!");
                        
                        loginFailed = true;
                        return;
                    }
                }
                else if(response == usernameLogin) {
                    window.location.replace("./index.php");
                }
            }
        });
    });
}


let currentUser = '';
function getUserData(username) {
    // console.log(username);
    currentUser = username;
    
    $.ajax({
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: {method: "getUserByUsername", param: username},
        dataType: "json",
        success: function(response) {  
            // console.log(response);

            let userdataTop = document.getElementById("userdata-top");
            let usernameUserpage = document.getElementById("username-userpage");
            let nameOfUser = document.createElement("h4");
            let nameOfUserString = response['firstname'] + ' ' + response['lastname']
            nameOfUser.innerHTML = nameOfUserString;

            userdataTop.appendChild(nameOfUser);
            nameOfUser.after(usernameUserpage);
        }        
    });
}


function redirectAfterLogout() {
    window.location.replace("./index.php");
}


function fillUserData(username) {
    // console.log(username);
    
    $.ajax({
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: {method: "getUserByUsername", param: username},
        dataType: "json",
        success: function(response) {  
            // console.log(response);

            $("#edituser-vorname").attr("value", ""+response['firstname']+"");
            $("#edituser-nachname").attr("value", ""+response['lastname']+"");
            $("#edituser-username").attr("value", ""+response['username']+"");
            $("#edituser-email").attr("value", ""+response['email']+"");

            fillUserAddress(username);
        }
    });
}


function fillUserAddress(username) {
    $.ajax({
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: {method: "getAdressByUsername", param: username},
        dataType: "json",
        success: function(response) {  
            // console.log(response);

            $("#edituser-ort").attr("value", ""+response['ort']+"");
            $("#edituser-adresse").attr("value", ""+response['strasse']+"");
            $("#edituser-plz").attr("value", ""+response['plz']+"");
        }
    });
}


function checkAndApplyChanges() { // Funktion ist noch nicht fertig
    let username = currentUser;

    let editedVorname = $("#edituser-vorname").val();
    let editedNachname = $("#edituser-nachname").val();
    let editedUsername = $("#edituser-username").val();
    let editedEmail = $("#edituser-email").val();

    let editedOrt = $("#edituser-ort").val();
    let editedStrasse = $("#edituser-adresse").val();
    let editedPlz = $("#edituser-plz").val();


    $.ajax({
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: {method: "getUserByUsername", param: username},
        dataType: "json",
        success: function(response) {  
            // console.log(response);

            if(editedVorname != response['firstname']) {
                changeVorname(username, editedVorname);
            }

            if(editedNachname != response['nachname']) {
                changeNachname(username, editedNachname);
            }

            if(editedUsername != response['username']) {
                changeUsername(username, editedUsername);
            }

            if(editedEmail != response['email']) {
                changeEmail(username, editedEmail);
            }
        }
    });


    $.ajax({
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: {method: "getAdressByUsername", param: username},
        dataType: "json",
        success: function(response) {  
            // console.log(response);

            if(editedOrt != response['ort']) {
                changeOrt(username, editedOrt);
            }

            if(editedStrasse != response['strasse']) {
                changeStrasse(username, editedStrasse);
            }

            if(editedPlz != response['plz']) {
                changePlz(username, editedPlz);
            }
        }
    });
}