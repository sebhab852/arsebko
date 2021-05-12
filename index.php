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
        <section id="homepage">
            <?php
                if(isset($_SESSION['login']) && isset($_SESSION['username'])) {
                    if($_SESSION['login'] == true) {
                        include "inc/navbarUser.php";
                    }
                }
                else {
                    include "inc/navbar.html";
                }
            
        
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
                            include "inc/info.html";
                        break;

                        case 'yourdata':
                            include "inc/yourdata.html";
                        break;

                        case 'about':
                            include "inc/about.html";
                        break;

                        case 'newpassword':
                            include "inc/newpassword.php";
                        break;

                        case 'posts':
                            include "inc/posts.html";
                        break;

                        case 'profilepage':
                            include "inc/userpage.php";
                        break;

                        case 'logout':
                            include "inc/logout.php";
                        break;

                        case 'editprofile':
                            include "inc/editprofile.php";
                        break;
                    }
                }
                else {
                    include "inc/carousel.html";
                    include "inc/homepage.html";
                }
            ?>
        </section>

        





        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    </body>
    
    <footer>
        <?php
            include "inc/footer.html";
        ?>
    </footer>    
</html>