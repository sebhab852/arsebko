<section id="profilepage" class="sectionpadding">
    <div class="container border border-dark rounded p-4 profilepageContainer">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    <img src="res/img/maleavatar.png" alt="Avatar" class="mt-3" height="150px" width="150px">
                </div>
            </div>
            <div class="col-md-6">
                <div id="userdata-top" class="mt-4 p-2">
                    <p id="username-userpage" class="text-muted"></p>
                </div>
                <!-- dogg -->
                <div id="div-profile-tabs">
                    <ul id="profile-tabs" class="nav nav-tabs" role="tablist">
                        <li id="tab-details" class="nav-item me-2">
                            <button id="tab-button-details" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true" onclick=showProfileContent("tab-button-details")>Details</button>
                        </li>
                        
                        <li id="tab-kontakt" class="nav-item me-2">
                            <button id="tab-button-kontakt" class="nav-link" data-toggle="tab" role="tab" aria-selected="false" onclick=showProfileContent("tab-button-kontakt")>Kontakt</button>
                        </li>
                        
                        <li id="tab-firma" class="nav-item">
                            <button id="tab-button-firma" class="nav-link" data-toggle="tab" role="tab" aria-selected="false" onclick=showProfileContent("tab-button-firma")>Firma</button>
                        </li>
                    </ul>
                </div>

                <div id="div-tab-content" class="mt-5">
                    <span id="details-content">                        
                        <span id="tab-text">Benutzer ID:</span><span id="details-userid"> #</span>
                        <br>
                        <span id="tab-text">Vorname:</span><span id="details-firstname"> </span>
                        <br>
                        <span id="tab-text">Nachname:</span><span id="details-lastname"> </span>
                        <br>
                        <span id="tab-text">E-Mail-Adresse:</span><span id="details-email"> </span>
                        <br>
                    </span>


                    <span id="kontakt-content">                        
                        <span id="tab-text">Straße:</span> <span id="kontakt-strasse"> </span>
                        <br>
                        <span id="tab-text">Ort:</span><span id="kontakt-ort"> </span>
                        <br>
                        <span id="tab-text">PLZ:</span><span id="kontakt-plz"> </span>
                        <br>
                    </span>


                    <span id="firma-content">
                        <span id="tab-text">Name:</span><span id="firma-firmenname"> </span>
                        <br>
                        <span id="tab-text">Straße:</span><span id="firma-strasse"> </span>
                        <br>
                        <span id="tab-text">Ort:</span><span id="firma-ort"> </span>
                        <br>
                        <span id="tab-text">PLZ:</span><span id="firma-plz"> </span>
                    </span>
                </div>
            </div>
            <?php
                if(isset($_GET['user']) && !empty($_GET['user'])) {
                    $givenUsername = $_GET['user'];

                    if($givenUsername == @$_SESSION['username']) {
                        echo
                        '<div class="col-md-2 text-end">
                            <div class="mt-4 me-2 p-2">
                                <a href="index.php?page=editprofile" class="btn btn-secondary">Bearbeiten</a>
                            </div>
                        </div>';
                    }
                }
            ?>
        </div>
    </div>

    <!-- <div class="container border border-dark rounded mt-4 p-4 profilepageContainer" id="userPostsContainer"> -->
    <div id="userposts-main-container" class="d-flex flex-column mt-4 px-4">                
    </div>
</section>

<script>
    
    var username = <?php echo json_encode($_GET['user']); ?>;
    $("#username-userpage").text(username);
    getAllPostsByUser(username);
    getUserData(username);
    isUserPartOfCompany(username);
    
    loadUserDetails(username);
    loadUserAddress(username);
    loadUserCompany(username);
</script>