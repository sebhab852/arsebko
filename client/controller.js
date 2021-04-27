$(document).ready(function () {
    getUsers();
    console.log("seawas")
});

function regsiterSingleUser(){
    let jsonData ={
        method: "querySingleTermineFor",
        param: {
            anschrift:{
                ort:"testort",
                strasse:"teststrasse 22",
                plz:5555
            },
            person:{
                vorname:"Marta",
                nachname:"Musterfrau"
            }
        }
      } 

    $.ajax({
        type: "POST",
        url: "./servicehandler.php",
        cache: false,
        //data: {method: "registerNewSingleUser", param: null},
        data: JSON.stringify(jsonData),
        dataType: "json",
        success: function (response) {  
            console.log(response)
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
