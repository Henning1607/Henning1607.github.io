function valider_epost(){
    regEx = /^[a-zA-Z. \- 0-9._%+-]+@[a-zA-Z. \- 0-9.-]+\.[a-zA-Z]{2,4}$/;
    OK= regEx.test(document.registrering.epostadresse.value);
    if(!OK){
        document.getElementById("feilEpost").innerHTML = "Her må du fylle inn din E-post adresse";
        return false;
    }
    document.getElementById("feilEpost").innerHTML="";
    return true;
}
function valider_mobnummer(){
    regEx = /^[0-9]{8}$/;
    OK= regEx.test(document.registrering.mobilnummer.value);
    if(!OK){
        document.getElementById("feilMobNr").innerHTML = "Her må du fylle inn ditt mobilnummer";
        return false;
    }
    document.getElementById("feilMobNr").innerHTML="";
    return true;
}
function valider_passord(){
    regEx= /^[a-zøæåA-ZÆØÅ. 0-9\-]{9,30}$/;
    OK = regEx.test(document.registrering.passord.value);
    if(!OK){
        regEx= /^[a-zøæåA-ZÆØÅ. 0-9!@#\$%\^\&*\?\+\£\¤\|\§\]\[\)\(+=._-]{9,30}$/;
        NOK = regEx.test(document.registrering.passord.value);
        if(!NOK){
            document.getElementById("feilpassord").style.color="#009933";
            document.getElementById("feilpassord").innerHTML="Her må du velge et passord bestående av minst 9 tegn bestående av små og store bokstaver";
            return false;
        } else {
            document.getElementById("feilpassord").innerHTML="";
            return true ;
        }
    }
    document.getElementById("feilpassord").innerHTML="";
    return true ;
}
            
function valider_passord2(){
    if(document.registrering.gjentaPassord.value !== document.registrering.passord.value){
        document.getElementById("feilBekreftpassord").innerHTML="Her må du skrive inn det samme passordet du fylte inn ovenfor";
        return false;
    }
    document.getElementById("feilBekreftpassord").innerHTML="";
    return true ;
}
function valider_persnr(){
    regEx = /^[0-9]{11}$/;
    OK= regEx.test(document.registrering.foedselsnummer.value);
    if(!OK){
        document.getElementById("FeilFNR").innerHTML = "Husk å skrive inn fødselsnummer";
        return false;
    }
    document.getElementById("FeilFNR").innerHTML="";
    return true;
}
function valider_Ekode(){
    regEx = /^[0-9]{6}$/;
    OK= regEx.test(document.registrering.engangskode.value);
    if(!OK){
        document.getElementById("FeilEKNR").innerHTML = "Husk å skrive inn engangskode";
        return false;
    }
    document.getElementById("FeilEKNR").innerHTML="";
    return true;
}
            
function valider_Pkode(){
    regEx= /^[a-zøæåA-ZÆØÅ. 0-9\-]{8,30}$/;
    OK = regEx.test(document.registrering.PersKode.value);
    if(!OK){
        document.getElementById("FeilPK").innerHTML="Husk å skrive inn personlig kode";
        return false;
    }
    document.getElementById("FeilPK").innerHTML="";
    return true ;
}
            
//Hello world