<?php  error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html lang=no>
    <head>
        <title>Bli med!</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet"
         title="Original"
         href="style.css">
        <link rel="alternate stylesheet"
         title="Nystil"
         href="helesiden.css">
        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="lesmer.js"></script>
        <script type="text/javascript" src="alien.js"></script>

    </head>
    <body>
        <div id="center">
            <header>
                <img id="logo" src="bilder/LOGO.jpg" alt="logo">
                <a href="https://www.facebook.com/BliMed.student"><img src="bilder/Facebooklogo.gif" id="faceimg" alt="facelogo"></a>
            </header>
            <nav>
                <ul>
                    <li><a href="index.php">FORSIDE</a></li>
                    <li><a href="index.php?page=1">STYRKETRENING</a></li>
                    <li><a href="index.php?page=2">KOSTHOLD</a></li>
                    <li><a href="index.php?page=3">KART</a></li>
                    <li><a href="index.php?page=4">OM OSS</a></li>
                </ul>
            </nav>
                <?php
                    if(isset($_GET['page'])){ 
                        if($_GET['page'] == 1){
                            include 'trening.html';
                        }
                        elseif($_GET['page'] == 2){
                            include 'kosthold.html';
                        }
                        elseif($_GET['page'] == 3){
                            include 'kart.html';
                        }
                        elseif($_GET['page'] == 4){
                            include 'omoss.html';
                        }
                        else{
                            include 'forside.html';
                        }
                    }
                    else {
                        include 'forside.html';
                    }
                ?>
            <footer id="footer">
                    <p>Laget av: Mea Alvsaker, Ksenia Iablokova, Kristian Grande, Henning Corneliussen</p>
            </footer>
        </div>
        <img id="alien" src="bilder/alien.gif" alt="alien">
        <img id="alien2" src="bilder/flyingalien.gif" alt="alien2">
        <img id="venus" src="bilder/venus.gif" alt="venus">
    </body>
</html>