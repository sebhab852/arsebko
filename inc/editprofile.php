<section id="editprofile" class="sectionpadding">
    <div class="container border border-dark rounded p-4 profilepageContainer">
        <div class="row mb-4">
            <h3 class="text-center">Ihre Daten</h3>
        </div>

        <div class="row">
            <div class="col-6">
                <label for="vorname" class="ms-1">Vorname</label>
                <input id="edituser-vorname" type="text" class="form-control" name="vorname" placeholder="Vorname">
                <br>
                <label for="nachname" class="ms-1">Nachname</label>
                <input id="edituser-nachname" type="text" class="form-control" name="nachname" placeholder="Nachname">
                <br>
                <label for="username" class="ms-1">Username</label>
                <input id="edituser-username" type="text" class="form-control" name="username" placeholder="Username">
                <br>
                <label for="email" class="ms-1">E-Mail-Adresse</label>
                <input id="edituser-email" type="text" class="form-control" name="email" placeholder="E-Mail-Adresse">
                <br>
                <a href="./index.php?page=newpassword" class="btn btn-secondary w-100">Passwort ändern</a>
            </div>

            <div class="col-6">
                <!-- <input id="edituser-firma" type="text" class="form-control" name="firma" placeholder="Firma (optional)"> -->
                <!-- <br> -->
                <label for="ort" class="ms-1">Ort</label>
                <input id="edituser-ort" type="text" class="form-control" name="ort" placeholder="Ort">
                <br>
                <label for="strasse" class="ms-1">Straße</label>
                <input id="edituser-adresse" type="text" class="form-control" name="strasse" placeholder="Straße und Hausnummer">
                <br>
                <label for="plz" class="ms-1">PLZ</label>
                <input id="edituser-plz" type="text" class="form-control" name="plz" placeholder="PLZ">
                <br>
                <a href="./index.php" class="btn btn-danger w-100">Profil löschen</a>
            </div>
        </div>

        <br><br>
        <input type="submit" name="submit" value="Änderungen speichern" onclick=checkAndApplyChanges(<?php echo json_encode($_SESSION['username']); ?>)  id="applyChangesBtn" class="btn btn-primary w-100">
    </div>
</section>

<script>
    var username = <?php echo json_encode($_SESSION['username']); ?>;
    fillUserData(username);
</script>