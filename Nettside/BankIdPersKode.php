<?php error_reporting(0); include 'regsession.php';?>
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
        <script>
                    function regOK() {
                        var txt;
                        alert('Gratulerer, du er nå registrert!');
                        document.getElementById("PKknapp").innerHTML = txt;
                    }
                </script>                
            </header>
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
                            <form novalidate method="post" name="registrering">
                                <div id="innerbox">
                                    <div id="topbox">
                                        <p>Identifisering</p>
                                    </div>
                                    <div id="mainbox">
                                        <div id="fnummer-form">
                                            <label for="FnR" id="fnummer" class="kode">Personlig kode:</label>
                                            <p id="regg"> 
                                                <input autofocus="" id="FnR" onchange="valider_Pkode()" required="required" autocomplete="off" class="inputfield" name="PersKode"  maxlength="7" placeholder="Personlig kode" type="password">
                                                <input type="image" name="PKknapp" id="pil" src="CSS/IMG/IDpil.PNG" alt="pil videre"/>
                                            </p>
                                        </div>
                                    <p id="FeilPK" class="feilinput feilmld"></p>
                                    </div>
                                    <div id="bottombox">
                                        <p>BankID brukersted:<br>digipost</p>
                                    </div>    
                                </div>
                            </form>
                        </div>               
                    </div>
                    <div>
                        <p id="number2"><?php echo $_SESSION["pkode"];?></p>
                        <img src="CSS/IMG/tankebobble.png" alt="bilde av en tankeboble" id="tankebilde" class="bildeK"/>
                    </div>
                </div>
            </div>
        </section>
        <?php
        if (isset($_POST["avbryt"])){
            session_destroy();
            echo "<script> window.location = 'login.php' </script>";
        }
        include 'db.php';
        $fantfrafor = false;

        if (isset($_POST["PKknapp_x"])){
            $perskode = ($_POST["PersKode"]);
            if(empty($perskode)){
                die("<script> document.getElementById('FeilPK').innerHTML = 'Husk å skrive inn personlig kode'; </script>");
            }   
            $Pkode = $_SESSION["pkode"];
            if($Pkode == $perskode){
                $passord=$_SESSION["passord"];
                $persnr=$_SESSION["persnr"];
                $sqlpers = "SELECT * FROM user WHERE foedselsnummer ='$persnr'";
                $resultatpers = mysqli_query($db, $sqlpers);
                $radpers = $resultatpers->fetch_object();
                if($persnr == $radpers->foedselsnummer){
                    echo "hello";
                    $sqldel = "DELETE FROM user WHERE foedselsnummer = $persnr";
                    if(mysqli_query($db,$sqldel)){
                        if(mysqli_affected_rows($db)){
                            $fantfrafor = true;
                        } else {
                            $fantfrafor = false;
                        }
                    } else {
                        $fantfrafor = false;
                    }
                } else {
                    $fantfrafor = false;
                }
                
                $rekke = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14); //fiks dette senere
                shuffle($rekke);
                $id1=($rekke[0]);
                $id2=($rekke[1]);         
                $sql2 = "Select fornavn from navn where id ='$id1'";        
                $sql3 = "Select etternavn from navn where id ='$id2'";
                $resultat2 = mysqli_query($db, $sql2);
                $resultat3 = mysqli_query($db, $sql3);
                $rad = $resultat2->fetch_object();        
                $rad2 = $resultat3->fetch_object();

                $sql = "insert into user(foedselsnummer,fornavn,etternavn,perskode,passord)";
                $sql .= "values ('$persnr','$rad->fornavn','$rad2->etternavn','$perskode','$passord')";   
                $resultat = mysqli_query($db, $sql);

                if(!$resultat){
                    $filref =  fopen("Feillogg.txt", "a");    
                    fwrite($filref,"Feil i BankID PersNR: ".mysqli_error($db)." " .date("d/m/Y")."\r\n");
                    fclose($filref);
                    die("<script> document.getElementById('FeilPK').innerHTML = 'Feil, kunne ikke skrive til database,Prøv på nytt<br>'; </script>");            
                }
                elseif(mysqli_affected_rows($db)==0){            
                    $filref =  fopen("Feillogg.txt", "a");    
                    fwrite($filref,"Feil i BankID PersNR: ".mysqli_error($db)." " .date("d/m/Y")."\r\n");
                    fclose($filref);
                    die("<script> document.getElementById('FeilPK').innerHTML = 'Prøv å skriv inn personlig kode på nytt'; </script>");
                }
                    if($fantfrafor == true){
                        echo "<script> alert('Gratulerer, du er nå registrert!(Brukeren er overskrevet)');</script>";            
                        echo "<script> window.location = 'login.php' </script>";
                        session_destroy();
                    } else {
                        echo "<script> alert('Gratulerer, du er nå registrert!');</script>";            
                        echo "<script> window.location = 'login.php' </script>";
                        session_destroy();
                    }
                }
                else{
                    die("<script> document.getElementById('FeilPK').innerHTML = 'Din personlig kode stemte ikke overens'; </script>");
                }
            }
        ?>
    </body>
</html>
