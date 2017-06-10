<?php error_reporting(0); include 'regsession.php'; 

?>
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
            <strong class="logo"><a tabindex="150" href="index.html" title="Digipost"><img alt="Tjenesteleverandørens logo kan for tiden ikke lastes." src="CSS/IMG/digipost-logo.png"></a></strong>
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
                                                                <form method="post" class="form_wrapper">
                                                                    <div class="row label">
                                                                        <label for="row_form">Engangskode</label>
                                                                        <div id="FeilEKNR" class="feilinput feilmld"></div>
                                                                    </div>
                                                                    <div class="row form">
                                                                        <div class="input_wrapper">
                                                                            <div class="label" for="row_form">
                                                                                <div class="icon">
                                                                                    <div>
                                                                                        <img src="CSS/IMG/lockit.gif" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="input">
                                                                                    <div class="wrp">
                                                                                        <input autofocus="" onchange="valider_Ekode()" required="required" autocomplete="off" class="inputfield" name="engangskode" id="row_from FnR" maxlength="6" autocomplete="off" type="tel">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="button_icon_wrapper">
                                                                            <button value="Pil videre" name="idpknapp" class="buttonIcon disabled" type="submit" title="Gå videre">
                                                                                <img class="svg" src="CSS/IMG/pil_bankid.png" alt="Pil videre">
                                                                            </button>
                                                                        </div>
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
                                                                    <button value="sertifikat" class="buttonIcon" type="button">
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
        <div>
            <p id="number"><?php echo $_SESSION["ek"];?></p>
            <img src="CSS/IMG/DPGo3_hires.png" alt="bilde av en iphone" id="mobbilde" class="bildeK"/>
        </div>
    </div>
<?php
    if(isset($_POST["avbryt"])){
        session_destroy();
        echo "<script> window.location = 'idPortenLogin.php' </script>";
    }
    if (isset($_POST["idpknapp"])){
        include "phpvalidering.php";
        $engangskode = $_POST['engangskode'];
        $engangskodeOK = valider_engangskode($engangskode);
            if(empty($engangskode)){
                die("<script> document.getElementById('FeilEKNR').innerHTML = 'Husk å skrive inn engangskode'; </script>");
        }
        $kode = $_SESSION["ek"];
        if($kode == $engangskode){
            echo "<script> window.location = 'idPortenPP.php' </script>";
        }
        else{
            die("<script> document.getElementById('FeilEKNR').innerHTML = 'Se på kodebrikken for å finne riktig engangskode'; </script>");

            }
        }
?>
        </body>
</html>
 
        
        