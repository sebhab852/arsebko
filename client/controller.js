var activeUser;

$(document).ready(function() {
    // console.log("seawas");

    //getUsers();
    $("#submitRegisterSingleUser").attr("onclick", "regsiterSingleUser()");
    $("#registerBuisnessButton").attr("onclick", "registerBusiness()");

    $('#details-content').show();
    $('#kontakt-content').hide();
    $('#firma-content').hide();

    // $("#sendCommentPost").attr("onclick", "postComment()")
});

$(document).ready(function() {
    let form = $("#registerSingleUserForm")
    form.onsubmit = function(event) { event.preventDefault() }
});

$(document).ready(function() {
    let form = $("#registerBusinessForm")
    form.onsubmit = function(event) { event.preventDefault() }
});

function setActiveUser(val) {
    activeUser = val;
    console.log(activeUser);
}

function unsetActiveUser() {
    activeUser = null;
    console.log("active user unset" + activeUser);
}

function regsiterSingleUser() {

    if ($("#registerFormOrt").val() == "" || $("#registerFormStrasse").val() == "" || $("#registerFormPLZ").val() == "" || $("#registerFormVorname").val() == "" || $("#registerFormNachname").val() == "" || $("#registerFormUsername").val() == "" || $("#registerFormEmail").val() == "" || $("#registerFormPasswort").val() == "") {
        alert("Bitte füllen Sie alle verpflichtenden Felder aus!")
        return false;
    }
    if ($("#registerFormPasswort").val() != $("#registerFormPasswortCheck").val()) {
        alert("Passwörter stimmen nicht überein!")
        return false;
    }

    let jsonData = {
        method: "registerSingleUser",
        param: {
            anschrift: {
                ort: $("#registerFormOrt").val(),
                strasse: $("#registerFormStrasse").val(),
                plz: $("#registerFormPLZ").val()
            },
            person: {
                vorname: $("#registerFormVorname").val(),
                nachname: $("#registerFormNachname").val(),
                username: $("#registerFormUsername").val(),
                email: $("#registerFormEmail").val(),
                passwort: $("#registerFormPasswort").val()
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
        success: function(response) {
            console.log(response)
            $("#register-user-container").hide();
            $("#resgister-user-success").show("slow");
        }
    });
}

function registerBusiness() {
    //console.log("njoa")
    if ($("#registerBizFirmenname").val() == "" || $("#registerBizStrasse").val() == "" || $("#registerBizPLZ").val() == "" || $("#registerBizOrt").val() == "" || $("#firmanachname").val() == "" || $("#firmavorname").val() == "" || $("#registerBizEmail").val() == "" || $("#registerBizUsername").val() == "" || $("#registerBizPasswort").val() == "" || $("#registerBizPasswortCheck").val() == "") {

        alert("Bitte füllen Sie alle verpflichtenden Felder aus!")
        return false;
    }
    if ($("#registerFormPasswort").val() != $("#registerFormPasswortCheck").val()) {
        alert("Passwörter stimmen nicht überein!")
        return false;
    }

    let jsonData = {
        method: "registerBusiness",
        param: {
            firmaName: $("#registerBizFirmenname").val(),
            anschriftFirma: {
                ort: $("#registerBizOrt").val(),
                strasse: $("#registerBizStrasse").val(),
                plz: $("#registerBizPLZ").val()
            },
            person: {
                vorname: $("#firmavorname").val(),
                nachname: $("#firmanachname").val(),
                username: $("#registerBizUsername").val(),
                email: $("#registerBizEmail").val(),
                passwort: $("#registerBizPasswort").val()
            }
        }
    }

    $.ajax({
        type: "POST",
        url: "./servicehandler.php",
        cache: false,
        data: jsonData,
        dataType: "json",
        success: function(response) {
            console.log(response)
            $("#register-business-container").hide();
            $("#resgister-business-success").slideToggle();
        }
    });
}

function getUsers() {
    $.ajax({
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "getAllUsers", param: null },
        dataType: "json",
        success: function(response) {
            console.log(response)
        }
    });
}


let loginAlert = false;
let loginFailed = false;

function loginUser() {
    let usernameLogin = $("#usernameLogin").val();
    let passwordLogin = $("#passwordLogin").val();

    if (usernameLogin == '' || passwordLogin == '') {
        if (!loginAlert) {
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
        } else if (loginAlert == true && loginFailed == true) {
            let loginAlert = document.getElementById("login-alert");
            $(loginAlert).text("Bitte füllen Sie alle Felder aus!");

            return;
        }
    }


    $('#login-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "./servicehandler.php",
            cache: false,
            data: { method: "loginUser", param: { "username": "" + usernameLogin + "", "password": "" + passwordLogin + "" } },
            dataType: "json",
            success: function(response) {
                // console.log(response)

                if (response == -1) {
                    if ((loginAlert == true && loginFailed == false) || (loginAlert && loginFailed)) {
                        if (document.getElementById("login-alert")) {
                            let loginAlert = document.getElementById("login-alert");
                            $(loginAlert).text("Der Benutzername oder das Passwort ist falsch!");
                            loginFailed = true;
                            return;
                        }
                    } else {
                        let loginTitle = document.getElementById("login-title");
                        let alertDiv = document.createElement("div");
                        $(alertDiv).attr("id", "login-alert");
                        $(alertDiv).attr("class", "alert alert-danger");
                        $(alertDiv).attr("role", "alert");
                        $(alertDiv).text("Der Benutzername oder das Passwort ist falsch!");

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



                    // if( (loginAlert == true && loginFailed == false) || (loginAlert && loginFailed) ) {
                    //     let loginAlert = document.getElementById("login-alert");
                    //     $(loginAlert).text("Der Benutzername oder das Passwort ist falsch!");

                    //     loginFailed = true;
                    //     return;
                    // }
                } else if (response == usernameLogin) {
                    window.location.replace("./index.php");
                }
            }
        });
    });
}



function getUserData(username) {
    // console.log(username);
    //$(currentUser).val(username);
    //console.log("Current User in getUserData "+username);

    $.ajax({
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "getUserByUsername", param: username },
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
    //console.log("Current User in fillUserdate "+ username);

    $.ajax({
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "getUserByUsername", param: username },
        dataType: "json",
        success: function(response) {
            // console.log(response);

            $("#edituser-vorname").attr("value", "" + response['firstname'] + "");
            $("#edituser-nachname").attr("value", "" + response['lastname'] + "");
            $("#edituser-username").attr("value", "" + response['username'] + "");
            $("#edituser-email").attr("value", "" + response['email'] + "");

            fillUserAddress(username);
        }
    });
}


function fillUserAddress(username) {
    $.ajax({
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "getAdressByUsername", param: username },
        dataType: "json",
        success: function(response) {
            // console.log(response);

            $("#edituser-ort").attr("value", "" + response['ort'] + "");
            $("#edituser-adresse").attr("value", "" + response['strasse'] + "");
            $("#edituser-plz").attr("value", "" + response['plz'] + "");
        }
    });
}


function checkAndApplyChanges(username) { // Funktion ist noch nicht fertig
    //let username = currentUser;

    let editedVorname = $("#edituser-vorname").val();
    let editedNachname = $("#edituser-nachname").val();
    let editedUsername = $("#edituser-username").val();
    let editedEmail = $("#edituser-email").val();

    let editedOrt = $("#edituser-ort").val();
    let editedStrasse = $("#edituser-adresse").val();
    let editedPlz = $("#edituser-plz").val();

    if (editedEmail == "" || editedVorname == "" || editedNachname == "" || editedUsername == "" || editedOrt == "" || editedStrasse == "" || editedPlz == "") {
        alert("Bitte keine Felder leer lassen!");
        return;
    }

    let dataJS = {
        method: "editUser",
        param: {
            anschrift: {
                ort: editedOrt,
                strasse: editedStrasse,
                plz: editedPlz,
            },
            person: {
                vorname: editedVorname,
                nachname: editedNachname,
                username: editedUsername,
                email: editedEmail
            }
        }
    }

    $.ajax({
        type: "POST",
        url: "./servicehandler.php",
        cache: false,
        data: dataJS,
        dataType: "json",
        success: function(response) {
            console.log("yeet")
            console.log(response);
        }
    });


    // $.ajax({
    //     type: "GET",
    //     url: "./servicehandler.php",
    //     cache: false,
    //     data: {method: "getAdressByUsername", param: username},
    //     dataType: "json",
    //     success: function(response) {  
    //         console.log(response);

    //         if(editedOrt != response['ort']) {
    //             changeOrt(username, editedOrt);
    //         }

    //         if(editedStrasse != response['strasse']) {
    //             changeStrasse(username, editedStrasse);
    //         }

    //         if(editedPlz != response['plz']) {
    //             changePlz(username, editedPlz);
    //         }
    //     }
    // });
}


function uploadPost(username) {
    var postTitle = $("#new-post-title").val();
    var postContent = $("#new-post-text").val();
    if ($('#privacycheck').is(":checked")) {
        var privateCheck = 1;
    } else {
        var privateCheck = 0;
    }

    if (postTitle == '' || postContent == '') {
        alert("Bitte füllen Sie alle Felder aus!");
    }

    let postObject = {
        method: "uploadPost",
        param: {
            post: {
                username: username,
                title: postTitle,
                content: postContent,
                private: privateCheck
            }
        }
    };

    $('#upload-new-post').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "./servicehandler.php",
            cache: false,
            data: postObject,
            dataType: "json",
            success: function(response) {
                // console.log(response)

                if (response) {
                    location.reload();
                }
            }
        });
    });
}


function getAllPostRows() {
    $.ajax({
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "getAllPostRows", param: null },
        dataType: "json",
        success: function(response) {
            // console.log(response);

            showAllPosts(response);
        }
    });
}


function showAllPosts(rows) {

    if (rows > 0) {
        $.ajax({
            type: "GET",
            url: "./servicehandler.php",
            cache: false,
            data: { method: "getAllPosts", param: null },
            dataType: "json",
            success: function(response) {
                console.log(response);
                printPosts(response);
            }
        });
    } else {
        var postsMainContainer = document.getElementById("posts-main-container");
        var postContainer = document.createElement("h2");
        $(postContainer).attr("class", "text-center");
        $(postContainer).text("Es existieren noch keine Beiträge!");

        postsMainContainer.appendChild(postContainer);
    }
}

const printPosts = async(response) => {
    for (let x = 0; x < response.length; x++) {
        var titel = response[x]['titel'];
        var inhalt = response[x]['inhalt'];
        var datum = response[x]['datum'];
        var autorID = response[x]['autorID'];
        let private = response[x]['private'];

        if ((activeUser == null && private == 0) || activeUser != null) {

            var postsMainContainer = document.getElementById("posts-main-container");
            var postContainer = document.createElement("div");
            $(postContainer).attr("id", "userpost" + response[x]['postid']);
            $(postContainer).attr("class", "container rounded post-container pb-2");


            console.log(response[x]['private']);
            var autorName;
            $.ajax({
                async: false,
                type: "GET",
                url: "./servicehandler.php",
                cache: false,
                data: { method: "getUserByID", param: { id: autorID } },
                dataType: "json",
                success: function(res) {
                    autorName = res.username;

                }
            });

            var breakLine = document.createElement("br");
            var horizontalLine = document.createElement("hr");
            var horizontalLine2 = document.createElement("hr");

            var h2 = document.createElement("h2");
            $(h2).text("" + titel + "");

            var h6 = document.createElement("h6");
            $(h6).text("Autor: " + autorName + "");

            var smallText = document.createElement("small");
            $(smallText).text("Hochgeladen am: " + datum + "");

            var p = document.createElement("p");
            $(p).attr("class", "post-content");
            $(p).text("" + inhalt + "");

            let group = document.createElement("div");
            $(group).attr("class", "input-group");
            let commentInput = document.createElement("textarea");
            let button = document.createElement("button");
            $(button).attr("class", "btn btn-outline-secondary mb-2 mt-2");
            $(button).attr("id", "sendCommentPost");
            $(button).attr("onclick", "postComment(" + response[x]['postid'] + ")")
            $(commentInput).attr("postid", "" + response[x]['postid']);
            $(button).text("Send");
            $(commentInput).attr("rows", "1");
            $(commentInput).attr("placeholder", "Ihr Kommentar...");
            $(commentInput).attr("id", "inputCommentInhalt" + response[x]['postid'])
            $(commentInput).attr("class", "form-control mb-2 mt-2");
            $(commentInput).attr("style", "resize:none;")
            $(group).append(commentInput);
            $(group).append(button);

            let headComment = document.createElement("small");
            let goToCommentSection = document.createElement("a");
            $(goToCommentSection).attr("href", "index.php?page=showPost&postID=" + response[x]['postid']);
            $(goToCommentSection).attr("class", "link-dark ms-1 mb-1")
            $(goToCommentSection).text("Kommentare zu diesem Beitrag anzeigen");

            $(postContainer).append(breakLine);
            $(postContainer).append(h2);
            $(postContainer).append(h6);
            $(postContainer).append(smallText);
            $(postContainer).append(horizontalLine);
            $(postContainer).append(breakLine);
            $(postContainer).append(p);
            $(postContainer).append(breakLine);
            $(postContainer).append(horizontalLine2);
            $(headComment).append(goToCommentSection);
            $(postContainer).append(headComment);
            $(postContainer).append(group);

            $(postsMainContainer).append(postContainer);
        }
    }
}

const getUserByID = async(id) => {
    $.ajax({
        async: false,
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "getUserByID", param: { id: id } },
        dataType: "json",
        success: function(response) {

        }
    });
}


function changePasswordCheck() {
    var email = $('#newPassEmail').val();
    var newPassword = $('#newPassPassword').val();
    var newPasswordVerification = $('#newPassVerification').val();


    if (email == '' || newPassword == '' || newPasswordVerification == '') {
        alert("Bitte füllen Sie alle Felder aus!");
        return;
    }

    if (newPassword === newPasswordVerification) {
        $.ajax({
            type: "POST",
            url: "./servicehandler.php",
            cache: false,
            data: { method: "emailCheck", param: email },
            dataType: "json",
            success: function(response) {
                // console.log(response);

                if (response == -1) {
                    alert("Bitte geben Sie eine gültige E-Mail-Adresse ein!");
                } else {
                    changePassword(email, newPassword);
                }
            }
        });
    } else {
        alert("Die Passwörter stimmen nicht überein!");

        return;
    }
}


function changePassword(email, password) {
    $.ajax({
        type: "POST",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "changePassword", param: { "email": "" + email + "", "password": "" + password + "" } },
        dataType: "json",
        success: function(response) {
            console.log(response)

            if (response == email) {
                window.location.replace("./index.php?page=login");
            } else {
                alert("Passwort ändern fehlgeschlagen! Bitte versuchen Sie es später erneut.");
            }
        }
    });
}


function isUserPartOfCompany(username) {
    $.ajax({
        type: "POST",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "isUserPartOfCompany", param: username },
        dataType: "json",
        success: function(response) {
            // console.log(response);

            if (response == -1) {
                var buttonFirma = document.getElementById("tab-button-firma");
                buttonFirma.disabled = true;

                $(buttonFirma).css("background-color", "darkgrey");
                $(buttonFirma).css("text-decoration", "line-through");
            }
        }
    });
}


function showProfileContent(id) {
    var detailsContent = document.getElementById("details-content");
    var kontaktContent = document.getElementById("kontakt-content");
    var firmaContent = document.getElementById("firma-content");

    if (id == "tab-button-details") {
        $(detailsContent).show();
        $(kontaktContent).hide();
        $(firmaContent).hide();
    } else if (id == "tab-button-kontakt") {
        $(detailsContent).hide();
        $(kontaktContent).show();
        $(firmaContent).hide();
    } else if (id == "tab-button-firma") {
        $(detailsContent).hide();
        $(kontaktContent).hide();
        $(firmaContent).show();
    }
}


function loadUserDetails(username) {
    $.ajax({
        type: "POST",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "loadUserDetails", param: username },
        dataType: "json",
        success: function(response) {
            // console.log(response);

            if (response != -1) {
                $('#details-userid').append(response['id']);
                $('#details-firstname').append(response['firstname']);
                $('#details-lastname').append(response['lastname']);
                $('#details-email').append(response['email']);
            }
        }
    });
}


function loadUserAddress(username) {
    $.ajax({
        type: "POST",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "loadUserAddress", param: username },
        dataType: "json",
        success: function(response) {
            // console.log(response);

            $('#kontakt-strasse').append(response['strasse']);
            $('#kontakt-ort').append(response['ort']);
            $('#kontakt-plz').append(response['plz']);
        }
    });
}


function loadUserCompany(username) {
    $.ajax({
        type: "POST",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "loadUserCompany", param: username },
        dataType: "json",
        success: function(response) {
            // console.log(response);

            $('#firma-strasse').append(response['strasse']);
            $('#firma-ort').append(response['ort']);
            $('#firma-plz').append(response['plz']);

            var firmaID = response['hausnummer'];
            loadCompanyName(firmaID);
        }
    });
}


function loadCompanyName(firmaID) {
    $.ajax({
        type: "POST",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "loadCompanyName", param: firmaID },
        dataType: "json",
        success: function(response) {
            // console.log(response);

            var firmenname = response;
            $('#firma-firmenname').append(firmenname);
        }
    });
}

function getAllPostsByUser(username) {
    $.ajax({
        async: false,
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "getAllPostsByUser", param: username },
        dataType: "json",
        success: function(response) {
            //console.log(response);
            printPostsForUser(response);
        }
    });
}

const printPostsForUser = async(response) => {
    if (response.length <= 0) {
        var postsMainContainer = document.getElementById("userposts-main-container");
        var postContainer = document.createElement("h2");
        $(postContainer).attr("class", "text-center");
        $(postContainer).text("Es existieren noch keine Beiträge!");

        postsMainContainer.appendChild(postContainer);
    } else {
        for (let x = 0; x < response.length; x++) {
            var titel = response[x]['titel'];
            var inhalt = response[x]['inhalt'];
            var datum = response[x]['datum'];
            var autorID = response[x]['autorID'];
            let private = response[x]['private'];

            if ((activeUser == null && private == 0) || activeUser != null) {

                var postsMainContainer = document.getElementById("userposts-main-container");
                var postContainer = document.createElement("div");
                $(postContainer).attr("id", "userpost" + response[x]['postid']);
                $(postContainer).attr("class", "container rounded post-container");


                //console.log(response[x]['private']);
                var autorName;
                $.ajax({
                    async: false,
                    type: "GET",
                    url: "./servicehandler.php",
                    cache: false,
                    data: { method: "getUserByID", param: { id: autorID } },
                    dataType: "json",
                    success: function(res) {
                        autorName = res.username;

                    }
                });

                var breakLine = document.createElement("br");
                var horizontalLine = document.createElement("hr");
                var horizontalLine2 = document.createElement("hr");

                var h2 = document.createElement("h2");
                $(h2).text("" + titel + "");

                var h6 = document.createElement("h6");
                $(h6).text("Autor: " + autorName + "");

                var smallText = document.createElement("small");
                $(smallText).text("Hochgeladen am: " + datum + "");

                var p = document.createElement("p");
                $(p).attr("class", "post-content");
                $(p).text("" + inhalt + "");

                let group = document.createElement("div");
                $(group).attr("class", "input-group");
                let commentInput = document.createElement("textarea");
                let button = document.createElement("button");
                $(button).attr("class", "btn btn-outline-secondary mb-2 mt-2");
                $(button).attr("id", "sendCommentPost");
                $(button).attr("onclick", "postComment(" + response[x]['postid'] + ")");
                $(commentInput).attr("postid", "" + response[x]['postid']);
                $(button).text("Send");
                $(commentInput).attr("rows", "1");
                $(commentInput).attr("placeholder", "Ihr Kommentar...");
                $(commentInput).attr("id", "inputCommentInhalt" + response[x]['postid']);
                $(commentInput).attr("class", "form-control mb-2 mt-2");
                $(commentInput).attr("style", "resize:none;")
                $(group).append(commentInput);
                $(group).append(button);

                let headComment = document.createElement("small");
                let goToCommentSection = document.createElement("a");
                $(goToCommentSection).attr("href", "index.php?page=showPost&postID=" + response[x]['postid']);
                $(goToCommentSection).attr("class", "link-dark ms-1 mb-1")
                $(goToCommentSection).text("Kommentare zu diesem Beitrag anzeigen");


                $(postContainer).append(breakLine);
                $(postContainer).append(h2);
                $(postContainer).append(h6);
                $(postContainer).append(smallText);
                $(postContainer).append(horizontalLine);
                $(postContainer).append(breakLine);
                $(postContainer).append(p);
                $(postContainer).append(breakLine);
                $(postContainer).append(horizontalLine2);
                $(headComment).append(goToCommentSection);
                $(postContainer).append(headComment);
                $(postContainer).append(group);

                $(postsMainContainer).append(postContainer);
            }
        }
    }

}

function getCommentsForPost(postID) {
    $.ajax({
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "getCommentsForPost", param: postID },
        dataType: "json",
        success: function(response) {
            console.log(response);
        }
    });
}


function deleteProfile(username) {
    console.log("skrraaa user got rekt");

    // $.ajax({
    //     async: false,
    //     type: "POST",
    //     url: "./servicehandler.php",
    //     cache: false,
    //     data: { method: "deleteProfile", param: username },
    //     dataType: "json",
    //     success: function(response) {
    //         console.log(response);
    //     }
    // });
}
const showSinglePost = async(postID) => {
    $.ajax({
        type: "GET",
        url: "./servicehandler.php",
        cache: false,
        data: { method: "getSinglePost", param: postID },
        dataType: "json",
        success: function(response) {
            //console.log(response);

            //var postsMainContainer = document.getElementById("userposts-main-container");
            let postsMainContainer = $("#mainContainerForSinglePost");
            var postContainer = document.createElement("div");
            $(postContainer).attr("id", "userpost" + response[1].postid);
            $(postContainer).attr("class", "container rounded post-container pb-2");

            let autorID = response[1].autorID;
            let titel = response[1].titel;
            let inhalt = response[1].inhalt;
            let datum = response[1].datum;

            //console.log(response[x]['private']);
            var autorName;
            $.ajax({
                async: false,
                type: "GET",
                url: "./servicehandler.php",
                cache: false,
                data: { method: "getUserByID", param: { id: autorID } },
                dataType: "json",
                success: function(res) {
                    autorName = res.username;
                }
            });

            var breakLine = document.createElement("br");
            var horizontalLine = document.createElement("hr");
            var horizontalLine2 = document.createElement("hr");

            var h2 = document.createElement("h2");
            $(h2).text("" + titel + "");

            var h6 = document.createElement("h6");
            $(h6).text("Autor: " + autorName + "");

            var smallText = document.createElement("small");
            $(smallText).text("Hochgeladen am: " + datum + "");

            var p = document.createElement("p");
            $(p).attr("class", "post-content");
            $(p).text("" + inhalt + "");

            let group = document.createElement("div");
            $(group).attr("class", "input-group");
            let commentInput = document.createElement("textarea");
            let button = document.createElement("button");
            $(button).attr("class", "btn btn-outline-secondary mb-2 mt-2");
            $(button).attr("id", "sendCommentPost");
            $(button).attr("onclick", "postComment(" + response[1].postid + ")");
            $(commentInput).attr("postid", "" + response[1].postid);
            $(button).text("Send");
            $(commentInput).attr("rows", "1");
            $(commentInput).attr("placeholder", "Ihr Kommentar...");
            $(commentInput).attr("id", "inputCommentInhalt" + response[1].postid);
            $(commentInput).attr("class", "form-control mb-2 mt-2");
            $(commentInput).attr("style", "resize:none;")
            $(group).append(commentInput);
            $(group).append(button);


            // let headComment = document.createElement("small");
            // let goToCommentSection = document.createElement("a");
            // $(goToCommentSection).attr("href", "index.php?page=showPost&postID=" + response[x]['postid']);
            // $(goToCommentSection).attr("class", "link-dark ms-1 mb-1")
            // $(goToCommentSection).text("Kommentare zu diesem Beitrag anzeigen");


            $(postContainer).append(breakLine);
            $(postContainer).append(h2);
            $(postContainer).append(h6);
            $(postContainer).append(smallText);
            $(postContainer).append(horizontalLine);
            $(postContainer).append(breakLine);
            $(postContainer).append(p);
            $(postContainer).append(breakLine);
            $(postContainer).append(horizontalLine2);
            //$(headComment).append(goToCommentSection);
            //$(postContainer).append(headComment);
            $(postContainer).append(group);

            if (response[0] != -1) {
                for (let i = 0; i < response[0].length; i++) {
                    // console.log(response[0][i].inhalt)
                    var authorName;
                    $.ajax({
                        async: false,
                        type: "GET",
                        url: "./servicehandler.php",
                        cache: false,
                        data: { method: "getUserByID", param: { id: response[0][i].autorID } },
                        dataType: "json",
                        success: function(res) {
                            authorName = res.username;

                        }
                    });
                    //console.log(authorName);
                    let commentbox = document.createElement("span");
                    let namebox = document.createElement("b");
                    let breaker = document.createElement("br");

                    //$(author).text("" + authorName);  
                    //$(commentbox).append(namebox);
                    $(namebox).text("" + authorName);
                    $(commentbox).text(": " + response[0][i].inhalt);

                    $(postContainer).append(namebox);
                    $(postContainer).append(commentbox);
                    $(postContainer).append(breaker);
                }
            }

            $(postsMainContainer).append(postContainer);
        }
    });
}

function postComment(postID) {
    var inhalt;
    // if (mode == 0) {
    //     inhalt = $("#inputCommentInhaltSingle").val();
    // } else if (mode == 1) {
    //     inhalt = $("#inputCommentInhaltUser").val();
    // } else {
    //     inhalt = $("#inputCommentInhaltBeitrag").val();
    // }
    //postID = $("#inputCommentInhalt").attr("postid");

    inhalt = $("#inputCommentInhalt" + postID).val();

    let data = {
        method: "postComment",
        param: {
            inhalt: inhalt,
            autorName: activeUser,
            postID: postID
        }
    }
    console.log(data);
    $.ajax({
        type: "POST",
        url: "./servicehandler.php",
        cache: false,
        data: data,
        dataType: "json",
        success: function(response) {
            window.location.replace("./index.php?page=showPost&postID=" + postID);
        }
    });
}