<?php error_reporting(0); include 'regsession.php';

?>
<html lang="no">
    
    <head>
        <title>DigiPost - Testside</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/bankIDcss.css">
        <script src="JS/JSvalidering.js"></script>
    </head>
    <body lang="no">
        <section>
        <header>
            <?php include 'headerDigi.html';?>
        </header>
            <div id="sprak">
                <a href="#" id="bok" class="button active">Bokmål</a>
                <a href="#" id="nn" class="button inactive">Nynorsk</a>
                <a href="#" id="eng" class="button inactive">Engelsk</a>
            </div>
            <div id="progressbox">
                <p id="1" class="text-active">1) Opprett brukerprofil</p>
                <p id="2" class="text-active">2) Samtykke</p>
                <p id="3" class="text-active">3) Bekreft med BankID</p>
                <div id="progressbar">
                    <span id="progress" style="width:100%;"></span>
                </div>
            </div>
            <div class="reg">
                <div class="inner">    
                    <div class="box">
                        <div id="bankid">
                            <form action="" name="skjema3" method="post">
                                <button id="button-bryt" class="buttonIcon" name="avbryt">Avbryt BankID</button>
                            </form>
                            <form novalidate  method="post" name="registrering">
                                <div id="innerbox">
                                    <div id="topbox">
                                        <p>Identifisering</p>

                                    </div>
                                    <div id="mainbox">
                                        <div id="fnummer-form">
                                            <label for="FnR" id="fnummer">Engangskode:</label>
                                            <p id="regg"> 
                                                <input autofocus="" id="FnR" onchange="valider_Ekode()" required="required" autocomplete="off" class="inputfield" name="engangskode" id="username" maxlength="6" placeholder="Engangskode" type="tel">
                                                <input type="image" name="EKknapp" id="pil" src="CSS/IMG/IDpil.PNG" alt="pil videre"/>
                                            </p>
                                        </div>
                                        <p id="FeilEKNR" class="feilinput feilmld"></p>
                                    </div>
                                    <div id="bottombox">
                                        <p>BankID brukersted:<br>digipost</p>
                                    </div>    
                                </div>
                            </form>
                        </div>               
                    </div>
                    <div>
                        <p id="number"><?php echo $_SESSION["ek"];?></p>
                        <img src="CSS/IMG/DPGo3_hires.png" alt="bilde av en iphone" id="mobbilde" class="bildeK"/>
                    </div>
                </div>
            </div>
        </section>   
        <?php 
        if (isset($_POST["avbryt"])){
            session_destroy();
            echo "<script> window.location = 'login.php' </script>";
        }
 
        if (isset($_POST["EKknapp_x"])){
            $engangskode = $_POST['engangskode'];
            if(empty($engangskode)){
                die("<script> document.getElementById('FeilEKNR').innerHTML = 'Husk å skrive inn engangskode'; </script>");
        }
        $kode = $_SESSION["ek"];      
        if($kode == $engangskode){  
            function Pkode(){
            $pf = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            return substr(str_shuffle($pf),7,7);
        }
            $_SESSION["pkode"] = Pkode();
            echo "<script> window.location = 'BankIdPersKode.php' </script>";
        }    
        
        else{
            die("<script> document.getElementById('FeilEKNR').innerHTML = 'Se på kodebrikken for å finne riktig engangskode'; </script>");

            }
        } 
        ?>
        
    </body>
</html>
