<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="res/css/style.css">
        <script src="client/controller.js"></script>
        
        <title>Arsebko | Business Ideas and more</title>
    </head>

    
    <body>
        <div class="navigationsleiste">
            <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
                <strong><a class="navbar-brand" href="index.php">Arsebko</a></strong>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menüleiste">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="menüleiste">
                    <ul class="navbar-nav mr-auto">
                        <!-- <li class="nav-item active"> -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=login">Login</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Registrieren</a>
                        
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="index.php?page=registeruser">Neues Benutzerkonto anlegen</a>
                                <a class="dropdown-item" href="index.php?page=registercorp">Neues Firmenkonto anlegen</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=help">Hilfe</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=yourdata">Datenschutzinformationen</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=about">Impressum</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
        <section id="homepage">
            <?php
                if(isset($_GET['page'])) {
                    switch($_GET['page']) {
                        case 'login':
                            include "inc/login.html";
                        break;

                        case 'registeruser':
                            include "inc/registration_singleUser.html";
                        break;

                        case 'registercorp':
                            include "inc/registration_business.html";
                        break;

                        case 'help':
                            include "inc/help.php";
                        break;

                        case 'yourdata':
                            include "inc/yourdata.php";
                        break;

                        case 'about':
                            include "inc/about.html";
                        break;

                    }
                }
                else {
                    echo
                    '<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">        
                        <div class="carousel-inner">
                            <div id="crsl-img-1" class="carousel-item active">
                                <div id="crsl-container" class="container">
                                    <h1 class="crsl-title">Kommunikation</h1>
                                    <p class="crsl-text">Seien Sie Kontakt mit Unternehmen auf der ganzen Welt auf.</p>
                                </div>
                            </div>
            
                            <div id="crsl-img-2" class="carousel-item">
                                <div id="crsl-container" class="container">
                                    <h1 class="crsl-title">Zusammenarbeit</h1>
                                    <p class="crsl-text">Arbeiten Sie gemeinsam an Projekten.</p>
                                </div>
                            </div>
            
                            <div id="crsl-img-3" class="carousel-item">
                                <div id="crsl-container" class="container">
                                    <h1 class="crsl-title">Kreativität</h1>
                                    <p class="crsl-text">Lassen Sie sich inspirieren.</p>
                                </div>
                            </div>
                        </div>
            
                        <a href="#myCarousel" class="carousel-control-prev" role="button" data-slide="prev">
                            <span class="sr-only"></span>
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
            
                        <a href="#myCarousel" class="carousel-control-next" role="button" data-slide="next">
                            <span class="sr-only"></span>
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>';
                }
            ?>
        </section>

        








        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    </body>
</html>