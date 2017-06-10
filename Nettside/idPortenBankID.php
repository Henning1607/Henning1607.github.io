<?php session_start(); error_reporting(0); ?>
<html lang="no">
    <head>
        <title>Digipost - Testside</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/idpLogin.css">
        <script src="JS/JSvalidering.js"></script>
    </head>
    <body>
        <div class="container steg-2">
            <div id="wrapper">
                <div class="top-panel">
                    <?php include 'IdPortenHeader.html'; ?>
                </div>
        </div>
        <div id="header">
            <strong class="logo">
                <a tabindex="150" href="index.html" title="Digipost">
                    <img alt="Tjenesteleverandørens logo kan for tiden ikke lastes." src="CSS/IMG/digipost-logo.png">
                </a>
            </strong>
                    <h1>Digipost</h1>
        </div>
        <div id="main">               
                <div id="content">
                    <div class="box with-bottom">
                        <div class="box-top noborder">
                            <h2 class="with-logo hidden-phone">Logg inn med BankID</h2>
                        </div>
                                <div id="iframewrapper" class="bidweb">
                                        <div class="full_width_height" data-collect_as="mainbody">
                                            <div class="layout">
                                                <header class="header">
                                                    <div class="viewport">
                                                        <div class="lm_view block_vertical_center lm_center">
                                                            <div class="logo_wrapper">
                                                                <div class="img_wrapper">
                                                                    <img src="CSS/IMG/BIikon.PNG" alt="BankID logo">
                                                                </div>
                                                                <div class="title_wrapper">
                                                                    <h1 class="block_vertical_center" tabindex="1010">
                                                                        <div>
                                                                            <span class="title">Identifisering</span>
                                                                        </div>
                                                                    </h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="" name="skjema3" method="post">
                                                        <button id="button-bryt" class="buttonIcon" name="avbryt">Avbryt BankID</button>
                                                    </form>
                                                </header>
                                                <section class="body">
                                                    <div class="viewport animate">
                                                        <div class="stop_class lm_view padding block_vertical_center lm_center">
                                                            <div class="lm_view_habla">
                                                                <form class="form_wrapper" method="post">
                                                                    <div class="row label">
                                                                        <label for="row_form">Fødselsnummer</label>
                                                                        <div id="FeilFNR" class="feilinput feilmld"></div>
                                                                    </div>
                                                                    <div class="row form">
                                                                        <div class="input_wrapper">
                                                                            <div class="label" for="row_form">
                                                                                <div class="icon">
                                                                                    <div>
                                                                                        <img src="CSS/IMG/ikonBI.PNG" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="input">
                                                                                    <div class="wrp">
                                                                                        <input autofocus="" id="row_from" name="foedselsnummer" onchange="valider_persnr()" id="fnummerfelt" maxlength="11" autocomplete="off" type="tel">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="button_icon_wrapper">
                                                                            <button value="Pil videre" name="idpknapp" class="buttonIcon disabled" type="submit">
                                                                                <img class="svg" src="CSS/IMG/pil_bankid.png" alt="Pil videre">
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row message">
                                                                        <span>11 siffer</span>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <footer class="footer">
                                                    <div class="viewport">
                                                        <div class="lm_view block_vertical_center lm_center">
                                                            <div class="container2">
                                                                <div class="button_icon_wrapper">
                                                                    <button value="" class="buttonIcon" type="button" title="Åpne sertifikater">
                                                                        <img class="svg" src="CSS/IMG/sertif.png" alt="Sertifikat logo">
                                                                    </button>
                                                                </div>
                                                                <div class="signature">
                                                                    <div class="title">
                                                                        BankID brukersted
                                                                    </div>
                                                                    <div class="text">ID-porten</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </footer>
                                            </div>
                                        </div>
                        <div class="box-bottom">
                            <ul class="menu">
                                <li><a target="_blank" href="https://www.bankid.no/Dette-er-BankID/Dette-er-BankID/">Slik skaffer du deg BankID</a></li>                     
                            </ul>                                                                        
                        </div>
                    </div>                
                </div>         
        </div>
    </div>
</div>
</body>
<?php
    if(isset($_POST["avbryt"])){
        session_destroy();
        echo "<script> window.location = 'idPortenLogin.php' </script>";
    }
    
    if (isset($_POST["idpknapp"])){
        include 'db.php';
        include "phpvalidering.php";
        $persnr = mysql_real_escape_string($_POST['foedselsnummer']);
        $persnrOK = valider_fnummer($persnr);
        if(empty($persnr)){
            die("<script> document.getElementById('FeilFNR').innerHTML = 'Husk at du må skrive inn fødselsnummer'; </script>");
        }
        $sql = "Select foedselsnummer from user where foedselsnummer ='$persnr'";   
        $resultat = mysqli_query($db, $sql); 
        if(!$resultat){
            $filref =  fopen("Feillogg.txt", "a");    
            fwrite($filref,"Feil i BankID PersNR: ".mysqli_error($db)." " .date("d/m/Y")."\r\n");
            fclose($filref);
            die("<script> document.getElementById('FeilFNR').innerHTML = 'Feil, kunne ikke skrive til database,Prøv på nytt<br>'; </script>");            
            }
        elseif(mysqli_affected_rows($db)==0){            
            $filref =  fopen("Feillogg.txt", "a");    
            fwrite($filref,"Feil i BankID PersNR: ".mysqli_error($db)." " .date("d/m/Y")."\r\n");
            fclose($filref);
            die("<script> document.getElementById('FeilFNR').innerHTML = 'Her skjedde det en feil, prøv å skriv inn fødselsnummer på nytt'; </script>");
            }
        else{
            $rad = $resultat->fetch_object();
            $_SESSION['persnr'] = $rad->foedselsnummer;
        }
        if($persnr != $_SESSION['persnr']){
            die("<script> document.getElementById('FeilFNR').innerHTML = 'Fødselsnummer var ikke korrekt, prøv igjen'; </script>");
        }
        else{
            $_SESSION['persnr'] = $persnr;
            $_SESSION['funker'] = true;
            $_SESSION["ek"] = rand(100000,999999);
            echo "<script> window.location = 'idPortenEngangskode.php' </script>";
        }
    }
?>
</html>
