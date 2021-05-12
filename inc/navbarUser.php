<section id="navbarID">
    <div class="container-fluid overflow-hidden">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container-fluid">
        <strong><a id="navbar-title" class="navbar-brand" href="index.php">Arsebko</a></strong>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menüleiste">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menüleiste">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item px-sm-2 px-lg-0 px-xl-0">
                <?php
                    echo '<a class="nav-link" href="index.php?page=profilepage&user='.$_SESSION['username'].'">Mein Profil</a>';
                ?>
                </li>

                <li class="nav-item dropdown px-sm-2 px-lg-0 px-xl-0">
                    <a class="nav-link" href="index.php?page=posts">Beiträge</a>
                </li>

                <li class="nav-item px-sm-2 px-lg-0 px-xl-0">
                    <a class="nav-link" href="index.php?page=help">Hilfe</a>
                </li>

                <li class="nav-item px-sm-2 px-lg-0 px-xl-0">
                    <a class="nav-link" href="index.php?page=yourdata">Datenschutzinformationen</a>
                </li>

                <li class="nav-item px-sm-2 px-lg-0 px-xl-0">
                    <a class="nav-link" href="index.php?page=about">Impressum</a>
                </li>
            </ul>

            <a id="logout-button" class="ms-auto me-4" href="index.php?page=logout"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="grey" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg></a>
        </div>
    </div>
    </nav>
</div>
</section>