<?php error_reporting(0); include 'regsession.php'; ?>
<html lang="no">
    <head>
        <title>Digipost - Testmiljø</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/regcss.css">
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
                <p id="3" class="text-inactive">3) Bekreft med BankID</p>
                <div id="progressbar">
                    <span id="progress" style="width:66.6%;"></span>
                </div>
            </div>
            <div class="reg"><div class="inner">
                    
                    
                    <div class="box">
                        
                        <h2 class="heading">Samtykke til elektronisk kommunikasjon</h2>
                        <div class="illustration illustration-news"></div>
                        <p class="ingress">I Digipost kan du motta alle typer brev, i likhet med posten du mottar i din fysiske postkasse.</p>
                        <p>I henhold til norsk lov kreves det et uttrykkelig samtykke til bruk av elektronisk kommunikasjon for å kunne motta dokumenter elektronisk blant annet fra forsikrings- og finansieringsselskaper. Kommunikasjonen kan for eksempel være forsikringsbevis, varsel om endring av vilkår, varsel om utmelding, varsel om renteendring, erstatningsoppgjør og lignende viktige dokumenter.</p>
                        <p>Dette samtykket omfatter også alle forsikringsdokumenter og bankpapirer fra forsikrings- og finansieringsselskaper du til enhver tid har avtale med. I dag har følgende forsikrings- og finansieringsselskaper avtale som gir dem mulighet til å sende deg dokumenter gjennom Digipost: DNB, Gjensidige, If, KLP, Nordea Liv, Silver Pensjonsforsikring, SpareBank 1 Forsikring, og Storebrand.Tilsvarende gjelder for datterselskaper av de nevnte selskapene. Flere selskaper kan komme til i fremtiden. En uttømmende liste vil til enhver tid være tilgjengelig på digipost.no.</p>
                        
                        <div class="validation-error-skin validation-error-warning hide" id="feilTing">
                            <span class="img validation-error-icon img-exclamation-circle"></span>
                            <span id="samt">Samtykke er obligatorisk</span>
                            <div class="clear"></div>
                        </div>
                        <form action="" method="post">
                            <div class="green-checkbox-wrapper">
                                <input type="checkbox" id="insuranceterms"  name="samtykke" value="samtykke1" checked="">
                                <label for="insuranceterms" class="divided"><span></span>
                                    Jeg samtykker til elektronisk kommunikasjon 
                                </label>
                                <div id="samt"></div>
                            </div>
                            <div class="clear"></div>
                            
                            <p id="last">
                                <input type="submit" name="submitreg2" value="Jeg samtykker" class="buttonsubmit">
                            </p> </form>
                    </div>
                </div>
            </div>
        </section>
        
        <?php 
        if (isset($_POST["submitreg2"])){
            if(!$_POST["samtykke"]){
                die("<script> document.getElementById('feilTing').style.display='block'</script>");
           }
            else{                
                echo "<script> window.location = 'BankID.php' </script>";
             }
        }
        

        ?>
    </body>
</html>
