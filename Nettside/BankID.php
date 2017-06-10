<?php error_reporting(0); include 'regsession.php';?>
<html lang="no">
    
    <head>
        <title>DigiPost - Testside</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/bankIDcssbtn.css">
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
                        
                        
                        <p id="intro">Vennligst logg inn med BankID eller Buypass for å bekrefte din identitet.<br> 
                            Når din konto er opprettet kan du logge inn med fødselsnummer og passord.</p>
                        <div class="img-arrow">
                            <img src="CSS/IMG/arrow-grey.png" id="imgarrow">
                        </div>
                        <div id="bankid">
                            <a href="BankIdPersNr.php">
                                <img alt="BankID logo" id="bankid-bilde" src="CSS/IMG/img-bankid.png"/>
                                <span id="tekst">
                                    <span id="banktitle"><strong>Logg inn med BankID</strong></span>
                                    <span id="EK">Med koder fra banken din.</span>
                                </span>
                            </a>    
                        </div>
                        <ul class="linkt">
                            <li><a target="_blank" href="https://www.bankid.no/Dette-er-BankID/Dette-er-BankID/" class="linktekst">Om BankID</a></li>
                            
                        </ul>
                    </div>              
                    
                    
                    </section>
                    </body>
                    </html>
