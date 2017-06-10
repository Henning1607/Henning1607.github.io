<?php
function valider_epost($epost){   
    if(!preg_match("/^[a-zA-Z. \- 0-9._%+-]+@[a-zA-Z. \- 0-9.-]+\.[a-zA-Z]{2,5}$/",$epost)){
       echo "<script> document.getElementById('feilEpost').innerHTML = 'Her må du fylle inn din E-post adresse'; </script>";
       echo"<script> document.getElementById('mobfeilEpost').innerHTML = 'Her har det skjedd en feil, prøv å fylle inn din E-post adresse'; </script>";
       return false;
    }
    return true;
}

function valider_telefonnr($tlfnr){   
    if(!preg_match("/^[0-9]{8}$/",$tlfnr)){
        echo "<script> document.getElementById('feilMobNr').innerHTML = 'Husk at du må fylle inn ditt mobilnummer'; </script>";
        echo"<script> document.getElementById('mobfeilMobNr').innerHTML = 'Husk at du må fylle inn ditt mobilnummer'; </script>";
        return false;
    }
    return true;
}
function valider_passord($passord){
    if(!preg_match("/^[a-zøæåA-ZÆØÅ. 0-9!@#\$%\^\&*\?\+\£\¤\|\§\]\[\)\(+=._-]{9,30}$/",$passord)){
        echo "<script> document.getElementById('feilpassord').innerHTML = 'Her må du velge et passord bestående av minst  9 tegn bestående av små og store bokstaver'; </script>";
        echo "<script> document.getElementById('mobfeilpassord').innerHTML = 'Her må du velge et passord bestående av minst  9 tegn bestående av små og store bokstaver'; </script>";
        return false;
    }
    return true;
}

function valider_bekreftpassord($passord2,$passord){
    if($passord != $passord2){
        echo "<script> document.getElementById('feilBekreftpassord').innerHTML = 'Her må du skrive inn det samme passordet du fylte inn ovenfor'; </script>";
        echo "<script> document.getElementById('mobfeilBekreftpassord').innerHTML = 'Her må du skrive inn det samme passordet du fylte inn ovenfor'; </script>";
        return false;
    }
    return true;
}

function valider_fnummer($fnummer){
    if(preg_match("/^[0-9]{11}$/",$fnummer)){
    $arr2 = str_split($fnummer, 2);
    if($arr2[0] >= 01 && $arr2[0] <= 31){
        return true;
    } else {
        die ("<script> document.getElementById('FeilFNR').innerHTML = 'Oisann. Sjekk at du skrev inn riktig fødselsnummer'; </script>");
        return false;
    }
    if($arr2[1] >= 01 && $arr2[1] <= 12){
        return true;
    } else {
        die ("<script> document.getElementById('FeilFNR').innerHTML = 'Oisann. Sjekk at du skrev inn riktig fødselsnummer'; </script>");
        return false;
    }
    if($arr2[2] >= 00 && $arr2[2] <= 99){
        return true;
    } else {
        die("<script> document.getElementById('FeilFNR').innerHTML = 'Oisann. Sjekk at du skrev inn riktig fødselsnummer'; </script>");
        return false;
    }
}
}
function valider_engangskode($EK){   
    if(!preg_match("/^[0-9]{6}$/",$EK)){
        echo "<script> document.getElementById('feilEKNR').innerHTML = 'Koden du skrev inn var ikke korrekt, prøv igjen'; </script>";
        return false;
    }
    return true;
}
function valider_pkode($pkode){
    if(!preg_match("/^[a-zøæåA-ZÆØÅ. 0-9\-]{7}$/",$pkode)){
        echo "<script> document.getElementById('FeilPK').innerHTML = 'Koden du skrev inn var ikke korrekt, prøv igjen'; </script>";
        return false;
    }
    return true;
}

?>
