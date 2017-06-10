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
            <div class="reg"><div class="inner">
                    <div class="box">
                        <div id="bankid">
                            <form action="" name="skjema3" method="post">
                                <button id="button-bryt" class="buttonIcon" name="avbryt">Avbryt BankID</button>
                            </form>                            
                            <div id="innerbox">
                                <div id="innerinner">
                                <div id="topbox">
                                    <p>Identifisering</p>
                                </div>
                                <form novalidate action="" method="post" name="registrering">
                                    <div id="mainbox">
                                        <div id="fnummer-form">
                                            <label for="FnR" id="fnummer">Fødselsnummer:</label>
                                            <p id="regg"> 
                                                <input autofocus="" id="FnR" required="required" onchange="valider_persnr()" id="fnummerfelt" autocomplete="off" class="inputfield" name="foedselsnummer" id="username" maxlength="11" placeholder="Fødselsnummer (11 siffer)" type="tel">
                                                <input alt="Pil videre" type="image" name="Persknapp" id="pil" src="CSS/IMG/IDpil.PNG"/>
                                            </p>
                                        </div>
                                    <p id="FeilFNR" class="feilinput feilmld"></p>
                                    </div>
                                    <div id="bottombox"><p>BankID brukersted:<br>digipost</p></div>    
                                </form>
                                </div>
                            </div>
                                
                        </div>               
                    </div>
                    </section>
        <?php
        if (isset($_POST["avbryt"])){
            session_destroy();
            echo "<script> window.location = 'login.php' </script>";
        }
        include 'phpvalidering.php';
               
if (isset($_POST["Persknapp_x"])){ 
            $persnr = mysql_real_escape_string($_POST['foedselsnummer']);
            
   if($persnr == NULL){
      die("<script> document.getElementById('FeilFNR').innerHTML = 'Husk å skrive inn fødselsnummer'; </script>");
                       }
       $fnummerOK = valider_fnummer($persnr);
   if($fnummerOK){
        $_SESSION['persnr'] = $persnr;
        $_SESSION["ek"] = rand(100000,999999);
        echo "<script> window.location = 'BankIdEngangskode.php' </script>";
                  }       
   else{
        die ("<script> document.getElementById('FeilFNR').innerHTML = 'Pass på at du skriver inn korrekt fødselsnummer'; </script>");
       }
   }
        
        
        
        ?>
                    
                    </body>
                    </html>
