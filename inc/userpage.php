<section id="profilepage" class="sectionpadding">
    <div class="container border border-dark rounded p-4 profilepageContainer">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    <img src="res/img/CvRkG5qUMAAJ6rz.jpg" alt="Avatar" class="profile-picture" height="220px" width="220px">
                </div>
            </div>
            <div class="col-md-6">
                <div id="userdata-top" class="mt-4 p-2">
                    <p id="username-userpage" class="text-muted"></p>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item me-2">
                        <button class="nav-link active" id="konakt-tab" data-toggle="tab" role="tab" aria-selected="true">Kontakt</button>
                    </li>
                    <li class="nav-item me-2">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" role="tab" aria-selected="false">Test</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-toggle="tab" role="tab" aria-selected="false">Test2</button>
                    </li>
                </ul>
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
</section>

<script>
    var username = <?php echo json_encode($_GET['user']); ?>;
    $("#username-userpage").text(username);

    getUserData(username);
</script>