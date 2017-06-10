<?php session_start(); error_reporting(0); ?>
<html lang="no">
    <head>
        <title>DigiPost - Testside</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/regcss.css">
        <script src="JS/JSvalidering.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="JS/passordStyrkeReg.js"></script>
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
                <p id="2" class="text-inactive">2) Samtykke</p>
                <p id="3" class="text-inactive">3) Bekreft med BankID</p>
                <div id="progressbar">
                    <span id="progress" style="width:33.3%;"></span>
                </div>
            </div>
            <form novalidate action="" method="post" name="registrering" id="registrering">
                <div id="poster">
                    <ul id="checks">
                        <li><i class="checkmark" aria-hidden="true"></i>Få brev digitalt, i stedet for sendt til postkassen.</li>
                        <li><i class="checkmark" aria-hidden="true"></i>Gi alle som sender deg post muligheten til å nå deg digitalt.</li>
                        <li><i class="checkmark" aria-hidden="true"></i>Motta, oppbevar og arkiver viktige dokumenter.</li>
                    </ul>
                </div>
                <div class="mobfeil">
                    <p id="mobfeilEpost"></p>
                    <p id="mobfeilMobNr"></p>
                    <p id="mobfeilpassord"></p>
                    <p id="mobfeilBekreftpassord"></p>
                </div>
                <div id="bruker-box" class="box">
                    <p id="desk">
                        <strong>Opprett brukerprofil</strong>
                        <br>
                        Kontaktinformasjonen brukes blant annet til å gi deg beskjed om nye brev.
                    </p>
                    <table>
                        <p>
                            <tr>
                                <td>
                                    <label for="epostfelt" class="tags">E-post</label>
                                </td>
                                <td>
                                    <input id='epostfelt' type="text" name="epostadresse" value="" onchange="valider_epost()" id="epostadresse" class="inputfield epost" required="" aria-required="true" data-validation-required="true" data-validation-type="email">
                                </td>
                                <td>
                                    <p class="feilmld" id="feilEpost"></p>
                                </td>
                            </tr>
                        </p>
                        <p>
                        <tr><td><label for="mobfelt" class="tags">Mobilnummer</label></td>
                            <td><input id='mobfelt' type="tel" name="mobilnummer" value="" onchange="valider_mobnummer()" id="mobilnummer" class="inputfield phone" maxlength="8" required="required" data-validation-required="true" data-validation-type="phoneNumber"></td>
                            <td><p class="feilmld" id="feilMobNr"></p></td></tr>
                        
                    </table>
                </div>
                <div id="passord-box" class="box">
                    <p id="desc">
                        <strong>Lag et passord for innlogging</strong>
                        <br>
                        Bruk minst 9 tegn bestående av små og store bokstaver. Bruk gjerne tall og spesialtegn.
                    </p>
                    <p>
                    <table>
                        <tr>
                            <td>
                                <label for="password" class="tags">Lag passord</label></td>
                            <td>
                                <div class="meter">
                                    <input type="password" required="required" onchange="valider_passord()" name="passord" id="password" class="inputfield password" autocomplete="off" size="26" value="">
                                    <div class="line">
                                        <div class="status" ></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="feilmld" id="feilpassord">
                                </p>
                            </td>
                        </tr>
                        </p>
                        <p>
                        <tr><td><label for="password_repeat" class="tags">Gjenta passordet</label></td>
                            <td><input type="password" required="required" onchange="valider_passord2()" name="gjentaPassord" id="password_repeat" class="inputfield" autocomplete="off" size="26" value=""></td>
                            <td><p class="feilmld" id="feilBekreftpassord"></p></td></tr>
                    </table>
                    <br>
                    <a href="godePassord.php" title="Les om gode passord(Ny side)" class="link last" target="_blank">Les mer om hvordan man lager gode passord</a>
                </div>
                <div id="checkbox-box" class="box">
                    <p>Posten lanserer jevnlig nye produkter og tjenester og kan sende deg informasjon om dette.</p>
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="acceptInformation" name="acceptInformation" checked="checked">
                        <label for="acceptInformation"><span></span>Hold meg oppdatert</label>
                        <div class="clear"></div>
                    </div>
                </div>
                <div id="vilkar-box" class="box">
                    <div id="wrapper">
                        <table>
                            <tr><td><input type="checkbox" name="terms" id="terms" required="required" value="false">
                                    <label for="terms" name="terms"><span></span>Jeg godtar vilkårene for Digipost</label></td>
                                <td><p class="feilmld" id="vilk"></p></td></tr>
                            <div class="clear"></div>
                        </table>
                    </div>
                    <span class="vilk-link">
                        <br>
                        <a href="avtalevilkar.php" class="link" target="_blank">Les vilkårene for Digipost</a><br>
                        <a href="personvern.php" class="link" target="_blank">Les personvernerklæringen for Digipost</a>
                    </span>
                    <div class="clear"></div>
                </div>
                <p id="last">
                    <input type="submit" name="submitreg" value="Registrer meg i Digipost" class="buttonsubmit">
                </p>
            </form>
            <?php
if (isset($_POST["submitreg"])){    
              include "phpvalidering.php";
               $epost= mysql_real_escape_string($_POST['epostadresse']);
               $mobnr = mysql_real_escape_string($_POST['mobilnummer']);
               $passord = mysql_real_escape_string($_POST['passord']);
               $bekreftpassord = mysql_real_escape_string($_POST['gjentaPassord']);
               
               $_SESSION["epost"] = $epost;
               $_SESSION["mobnr"] = $mobnr;
               
         if(empty($epost)){
            echo "<script> document.getElementById('epostfelt').value = '". $_POST['epostadresse'] ."'; </script>";
            echo "<script> document.getElementById('mobfelt').value = '". $_POST['mobilnummer'] ."'; </script>";
            echo"<script> document.getElementById('mobfeilEpost').innerHTML = 'Epostfeltet må ikke stå tomt'; </script>";
            die("<script> document.getElementById('feilEpost').innerHTML = 'Epostfeltet må ikke stå tomt'; </script>");   
         }         
         if(empty($mobnr)){
          echo "<script> document.getElementById('epostfelt').value = '". $_POST['epostadresse'] ."'; </script>";
          echo"<script> document.getElementById('mobfeilMobNr').innerHTML = 'Mobilnummerfeltet må ikke stå tomt'; </script>";
          die("<script> document.getElementById('feilMobNr').innerHTML = 'Mobilnummerfeltet må ikke stå tomt'; </script>");   
         }    
               
         if(empty($passord)){
         echo "<script> document.getElementById('epostfelt').value = '". $_POST['epostadresse'] ."'; </script>";
         echo "<script> document.getElementById('mobfelt').value = '". $_POST['mobilnummer'] ."'; </script>";
         echo"<script> document.getElementById('mobfeilpassord').innerHTML = 'Passordfeltet må ikke stå tomt'; </script>";
        die("<script> document.getElementById('feilpassord').innerHTML = 'Passordfeltet må ikke stå tomt'; </script>");
    }
    if(empty($bekreftpassord)){
         echo "<script> document.getElementById('epostfelt').value = '". $_POST['epostadresse'] ."'; </script>";
         echo "<script> document.getElementById('mobfelt').value = '". $_POST['mobilnummer'] ."'; </script>";
         echo"<script> document.getElementById('mobfeilBekreftpassord').innerHTML = 'Du må huske å gjenta passordet'; </script>";
        die("<script> document.getElementById('feilBekreftpassord').innerHTML = 'Du må huske å gjenta passordet'; </script>");
    }
    elseif ($passord != $bekreftpassord){
         echo "<script> document.getElementById('epostfelt').value = '". $_POST['epostadresse'] ."'; </script>";
         echo "<script> document.getElementById('mobfelt').value = '". $_POST['mobilnummer'] ."'; </script>";
         echo"<script> document.getElementById('mobfeilpassord').innerHTML = 'Passordene stemmer ikke overens, prøv på nytt'; </script>";
        die("<script> document.getElementById('feilpassord').innerHTML = 'Passordene stemmer ikke overens, prøv på nytt'; </script>");    
}
    else{
                $epostOK = valider_epost($epost);
                $mobOK = valider_telefonnr($mobnr);
                $passordOK = valider_passord($passord);
                $bekreftpassordOK = valider_bekreftpassord($bekreftpassord,$passord);
                $passord = hash("sha512",mysql_real_escape_string($_POST['passord']));
                $bekreftpassord = hash("sha512",mysql_real_escape_string($_POST['gjentaPassord']));
       }
         
    if(!$_POST["terms"]){
                echo "<script> document.getElementById('epostfelt').value = '". $_POST['epostadresse'] ."'; </script>";
                echo "<script> document.getElementById('mobfelt').value = '". $_POST['mobilnummer'] ."'; </script>";
                die("<script> document.getElementById('vilk').innerHTML = 'Her må du huske å huke av'; </script>");
    }
    
    if ($epostOK && $mobOK && $passordOK && $bekreftpassordOK){
        $_SESSION["passord"] = $passord;
        $id="funker";
        $_SESSION['funker'] = $id;
        echo "<script> window.location = 'samtykke.php' </script>";                    
    }
    elseif(!$epostOK){
        echo "<script> document.getElementById('epostfelt').value = '". $_POST['epostadresse'] ."'; </script>";
        echo "<script> document.getElementById('mobfelt').value = '". $_POST['mobilnummer'] ."'; </script>";
        echo"<script> document.getElementById('mobfeilEpost').innerHTML = 'Her har det skjedd en feil, prøv å fylle inn din E-post adresse'; </script>";
        die("<script> document.getElementById('feilEpost').innerHTML = 'Her har det skjedd en feil, prøv å fylle inn din E-post adresse'; </script>");
    }
    elseif(!$mobOK){
        echo "<script> document.getElementById('epostfelt').value = '". $_POST['epostadresse'] ."'; </script>";
        echo "<script> document.getElementById('mobfelt').value = '". $_POST['mobilnummer'] ."'; </script>";
        echo "<script> document.getElementById('mobfeilMobnr').innerHTML = 'Her har det skjedd en feil, prøv å fylle inn ditt mobilnummer på nytt'; </script>";
        die("<script> document.getElementById('feilMobnr').innerHTML = 'Her har det skjedd en feil, prøv å fylle inn ditt mobilnummer på nytt'; </script>");
    }
    elseif(!$passordOK){
        echo "<script> document.getElementById('epostfelt').value = '". $_POST['epostadresse'] ."'; </script>";
        echo "<script> document.getElementById('mobfelt').value = '". $_POST['mobilnummer'] ."'; </script>";
        echo "<script> document.getElementById('mobfeilpassord').innerHTML = 'Her har det skjedd en feil, prøv å fylle inn passordet på nytt'; </script>";
        die("<script> document.getElementById('feilpassord').innerHTML = 'Her har det skjedd en feil, prøv å fylle inn passordet på nytt'; </script>");
    }
    elseif(!$bekreftpassordOK){
        echo "<script> document.getElementById('epostfelt').value = '". $_POST['epostadresse'] ."'; </script>";
        echo "<script> document.getElementById('mobfelt').value = '". $_POST['mobilnummer'] ."'; </script>";
        echo "<script> document.getElementById('mobfeilBekreftpassord').innerHTML = 'Her har det skjedd en feil, passordene stemmer ikke overens'; </script>";
        die("<script> document.getElementById('feilBekreftpassord').innerHTML = 'Her har det skjedd en feil, passordene stemmer ikke overens'; </script>");
    }    
}
                
        ?>
        </section>
    </body>
</html>
