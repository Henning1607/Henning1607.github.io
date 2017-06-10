<?php  error_reporting(0); include("required.php"); ?>
<html lang="no">
    <head>
        <title>DigiPost - Testside</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="JS/timeout.js"></script>
        <link rel="stylesheet" type="text/css" href="CSS/mailsidecss.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="JS/passordStyrke.js"></script>
    <?php
     include 'db.php';
     include 'navn.php';
    ?>
    </head>
    <body>
        <div id="page">
            <header>
                <?php include 'mailheader.html';?>
            </header>
            
            <div id="menu"><div><nav class="nav" role="navigation">
        <div class="">
        <ul>

        <li class="send ui-not-min left-menu-button skiplink-target" 
                    tabindex="-1">
            <a href="" class="button button-dark-flat button-small-font" 
               accesskey="1"> <i aria-hidden="true" class="fa fa-pencili"></i> Nytt brev</a>
        </li>

            <li class="postkassen droppable ui-droppable" data-id="INBOX">
                <a href="mailside.php" accesskey="2">
                    <i class="picture1">
                    </i>Postkassen
                    <div class="picture1">&nbsp;</div>
            </a>
            </li>


                <li class="kvitteringer">
                    <a href="" accesskey="3"><div class="picture2">&nbsp;</div> E-kvitteringer</a>
                    
                </li>


            <li class="utkast">
                <a href="" accesskey="4"><div class="picture3">&nbsp;</div><i aria-hidden="true" class="fa fa-file"></i> Usendte brev</a>
                
            </li>

            <li class="sendt">
                <a href="" accesskey="5"><div class="picture5">&nbsp;</div><i aria-hidden="true" class="fa fa-paper-plane"></i> Sendte brev</a>
                
            </li>

            </ul>
            
            <div id="folders" style="display: block;"><div>
                   <h3 class="folder-header"> Mine mapper</h3>

<div class="scrollable-folders sortable  folders ps-container">
<ul>

    <li class="folder droppable arkivet ui-droppable" data-id="68793086" draggable="true">
        <a href="" class="nokey" draggable="false">

            <div class="picture4">&nbsp;</div><i aria-hidden="true" class="fa fa-arrows-v movearrows"></i>
        <i aria-hidden="true" class="fa fa-archive"> </i>
        <span class="mappenavn tooltip" data-tooltip-delay="200" >Arkivet</span>
        </a>
            <span class="actions">

                 <i class="fa fa-pencil edit tooltip" aria-label="Rediger mappen" ></i>
            </span>
    </li>

</ul>
<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 210px; display: none;">
    <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div>
    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 32px; display: none;">
        <div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>

<ul>
    <li class="lagmappe">
        
        <a href="" class="nokey"><div class="picture6">&nbsp;</div><i class="fa fa-plus"></i> Opprett mappe</a>
    </li>
</ul>

</div></div>
        </div>
                    </nav>
                </div>
            </div>
<div id="main" role="main">
    <div class="main-inner main-menu" id="view-main" style="display: block;"><div>
            <div>
                <div class="plainpage plainpage-reverse">
                    <div class="inner text-wrapper">
                        <h1>Endre passord</h1>
                        <div class="body">
                            <p>Bruk <strong>minst 9 tegn</strong> bestående av store og små bokstaver. Bruk gjerne tall og spesialtegn.</p>
                            <form action="" method="post" name="skjema">
                                <ul class="change-pw">
                                    <li>
                                        <label for="password">Nytt passord</label>
                                    <div class="meter">
                                        <input autofocus="" type="password" required="required" onchange="valider_passord()" name="passord" id="password" class="inputfield password" autocomplete="off" size="26" value="">
                                        <div class="line">
                                            <div class="status" style="width:5px;"></div>
                                        </div>
                                    </div>
                                        <span class="pw-strength">
                                        </span>
                                    </li>
                                    <li>
                                        <label for="nyttpassword">Gjenta passordet</label>
                                        <input type="password" required="required" onchange="valider_passord()" name="gjentaPassord" id="nyttpassword" class="inputfield password" autocomplete="off" size="26" value="">
                                        <br>
                                        <span id="feilpassord">
                                        </span>
                                    </li>
                                    <li>
                                        <input type="submit" value="Lagre nytt passord" class="subbtn" name="nyttpw" id="nyttpw">
                                    </li>
                                </ul>
                            </form>
                            <h4>Hvordan velge et godt passord?</h4>
                            <ul class="pass-tips">
                                <li><img src="CSS/IMG/checked-green.png" alt="Green check" class="gree-checker">Velg et langt passord, gjerne en setning, som bare du husker</li>
                                <li><img src="CSS/IMG/checked-green.png" alt="Green check" class="gree-checker">Bruk norske bokstaver, tall, og spesialtegn</li>
                                <li><img src="CSS/IMG/x-red.png" alt="Red x" class="red-x">Ikke bruk vanlige enkeltord; bruk heller setninger</li>
                                <li><img src="CSS/IMG/x-red.png" alt="Red x" class="red-x">Ikke gjenta samme tegn mange ganger på rad</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
        <?php
            if(isset($_REQUEST["nyttpw"])){
                include "phpvalidering.php";
                $passord = mysql_real_escape_string($_POST['passord']);
                $bekreftpassord = mysql_real_escape_string($_POST['gjentaPassord']);
                if(empty($passord) || empty($bekreftpassord)){  
                    die("<script> document.getElementById('feilpassord').innerHTML = 'Du må huske å skrive inn passordene'; </script>");
                }
                if($passord != $bekreftpassord){    
                    die("<script> document.getElementById('feilpassord').innerHTML = 'Passordene stemmer ikke overens, prøv på nytt'; </script>");
                }
                else{
                    $passordOK = valider_passord($passord);
                    $bekreftpassordOK = valider_bekreftpassord($bekreftpassord,$passord);
                    $passord = hash("sha512",mysql_real_escape_string($_POST['passord']));
                    $bekreftpassord = hash("sha512",mysql_real_escape_string($_POST['gjentaPassord']));
                    
                    if(!$passordOK){
                        die("<script> document.getElementById('feilpassord').innerHTML = 'Her har det skjedd en feil, prøv å fylle inn passordet på nytt'; </script>");
                    }
                    elseif(!$bekreftpassordOK){
                        die("<script> document.getElementById('feilpassord').innerHTML = 'Her har det skjedd en feil, passordene stemmer ikke overens'; </script>");
                    }    
                    $sql = "Select passord from user where foedselsnummer = $persnr";        
                    $resultat = mysqli_query($db, $sql);
                    $rad = $resultat->fetch_object();
                    if($passord == $rad->passord){
                        die("<script> document.getElementById('feilpassord').innerHTML = 'Passordet er likt det gamle, velg et annet passord'; </script>");
                    }
                    $sql2="UPDATE user SET passord='$passord'";
                    $sql2.=" WHERE foedselsnummer ='$persnr'";
                    if(mysqli_query($db, $sql2)){
                        if(mysqli_affected_rows($db)>0){
                            echo "<script> alert('Passordet ditt er endret');</script>";
                            echo "<script> window.location = 'mailside.php';</script>";
                        } else {
                            echo "Feil i endringen";
                        }
                    } else {
                        echo mysqli_error($db);
                    }
                }
            }
        ?>
    </body>
</html>
