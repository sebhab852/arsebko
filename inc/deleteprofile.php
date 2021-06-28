<section id="editprofile" class="sectionpadding">
    <div class="container border border-dark rounded p-4 profilepageContainer">
        <div class="row mb-4">
            <h3 class="text-center">Profil löschen</h3>
        </div>

        <div class="row">
            <p class="text-center mt-4">Sind Sie sich sicher, dass Sie Ihr Konto löschen möchten?</p>
            <p class="text-center">Wenn Sie auf "Ja" klicken, kann der Vorgang nicht mehr rückgängig gemacht werden.</p>
        </div>

        <br><br>        
        <div class="row mt-4 text-center">
            <div class="col text-center">
                <input type="submit" name="submit" value="Ja" onclick=deleteProfile(<?php echo json_encode($_SESSION['username']); ?>) class="btn btn-success w-25">
                <a href="./index.php?page=editprofile" class="btn btn-danger w-25">Abbrechen</a>
            </div>
        </div>
    </div>
</section>

<script>
    var username = <?php echo json_encode($_SESSION['username']); ?>;
    fillUserData(username);
</script>