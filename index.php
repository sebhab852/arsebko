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
        
        <title>Arsebko - Business ideas and more</title>
    </head>

    
    <body>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active">
                </li>

                <li data-target="#myCarousel" data-slide-to="1">
                </li>

                <li data-target="#myCarousel" data-slide-to="2">
                </li>
            </ol> -->
        
            <div class="carousel-inner">
                <div id="crsl-img-1" class="carousel-item active">
                    <div id="crsl-container" class="container">
                        <h1>title 1</h1>
                        <p>paragraph 1</p>
                    </div>
                </div>

                <div id="crsl-img-2" class="carousel-item">
                    <div id="crsl-container" class="container">
                        <h1>title 2</h1>
                        <p>paragraph 2</p>
                    </div>
                </div>

                <div id="crsl-img-3" class="carousel-item">
                    <div id="crsl-container" class="container">
                        <h1>title 3</h1>
                        <p>paragraph 3</p>
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
        </div>
    
        <?php include "inc/registration_business.html"; ?>
        

        








        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    </body>

</html>