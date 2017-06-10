<?php session_start(); ?>
<html lang="no">
    <head>
        <title>DigiPost - Testside</title>       
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/maincss.css">
        <script type="text/javascript"> 
            function valider_navn(){ 
                regEx = new RegExp("^[0-9]{11}$"); 
                OK = regEx.test(document.skjema.foedselsnummer.value); 
                if(!OK){
                    document.getElementById('fnummerfelt').style.border="2px solid #ff0000";
                    return false; 
                } 
                document.getElementById('fnummerfelt').style.border="2px solid #dde1e6";
                return true;
            }
        </script>
    </head>
    <body>
        <header>
            <?php include 'headerDigi.html';?>
        </header>
        <section>
            <div id="login-form">
                <h2>Logg inn i Digipost</h2>
                    <div id="felter" class="felter" style="display:none;">
                        <div class="feil">
                            <div id="feilmld" class="feilmld"></div>
                        </div>
                    </div>
                <div id="main-form">
                    <form action="" method="post" name="skjema">
                        <div id="fnummer-form">
                            <label for="fnummerfelt" id="fnummer">Fødselsnummer (11 siffer):</label>
                            <input autofocus="" required="required" value="" id="fnummerfelt" autocomplete="off" class="inputfield" onchange="valider_navn()" pattern="\d*" name="foedselsnummer" id="username" maxlength="11" placeholder="Fødselsnummer (11 siffer)" type="text">
                        </div>
                        <div id="passord-form">
                            <label for="password" id="passord">Passord:</label>
                            <input required="required" class="inputfield" autocomplete="off" name="passord" id="password" placeholder="Passord" type="password">
                        </div>
                        <div id="submit-btn">
                            <input type="submit" name="videre" value="Logg Inn" class="submit-login">
                        </div>
                    </form>
                        
                    <form action="" name="skjema2" method="post">
                            <div id="login-link">
                            <button name="glemtpassord" id="glemt">Glemt passord</button>
                    </form>
                            <span>|</span>
                            <a href="registrering.php" class="link"> Ny bruker</a>
                        </div>
                        <div id="login-methode">
                            <a href="idPortenLogin.php" class="first">
                                <span class="img img-idporten">ID-porten</span>
                                <span>
                                    <span class="linked">Logg inn</span> med ID-porten <br>for å lese post med høyere sikkerhetsnivå.
                                </span>
                            </a>
                            <div class="clear"></div>
                        </div>
                </div>
            </div>
        </section>
        <?php
            if(isset($_POST["glemtpassord"])){
                $_SESSION["login"] = "glemt";
                echo "<script> window.location = 'idPortenLogin.php' </script>";
            }
        
            if(isset($_REQUEST["videre"])){
                $db = mysql_connect("sql2.freemysqlhosting.net", "sql2106925","rT1!qV2%");
                $db .= mysql_select_db("sql2106925");
                if(!$db){
                    echo "<script> document.getElementById('feilmld').innerHTML='Feil i databasekoblingen. Sjekk internettilgangen.'</script>";
                    echo "<script> document.getElementById('feilmld').style.display='block'</script>";
                    header("location:login.php");
                    die("");
                }
                $foedselsnummer= mysql_real_escape_string($_POST['foedselsnummer']);
                $passord = hash("sha512",mysql_real_escape_string($_POST['passord']));
                    
                $checkuser = mysql_query("SELECT * FROM user WHERE foedselsnummer='$foedselsnummer'");
                $num = mysql_num_rows($checkuser);
                if ($num==1){
                    $checkpassword = mysql_fetch_array($checkuser);
                    $dbpassword = $checkpassword['passord'];
                    if($passord==$dbpassword){
                        $id=$checkpassword['id'];
                        $_SESSION['id'] = $id;
                        $_SESSION["niva1"] = true;
                        $_SESSION['persnr'] = $foedselsnummer;
                        header("location:mailside.php");
                        die();
                    }        
                    else{
                        echo "<script> document.getElementById('fnummerfelt').value = '". $_POST['foedselsnummer'] ."'; </script>";
                        echo "<script> document.getElementById('feilmld').innerHTML='Oisann, her har det skjedd noe galt.<br> Prøv å skriv inn nytt passord'</script>";
                        echo "<script> document.getElementById('felter').style.display='block'</script>";
                    }
                        
                    }   
                else{
                    echo "<script> document.getElementById('fnummerfelt').value = '". $_POST['foedselsnummer'] ."'; </script>";
                    echo "<script> document.getElementById('feilmld').innerHTML='Oisann, noe er galt med fødselsnummeret.<br> Prøv å skriv inn på nytt.'</script>";
                    echo "<script> document.getElementById('felter').style.display='block'</script>";
                }
            }
            ?>
    </body>
</html>