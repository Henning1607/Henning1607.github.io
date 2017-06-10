<!DOCTYPE html>
<html lang="no">
    <head>
        <title>Digipost - Admin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .buttons {
                background:none!important;
                border:none; 
                padding:0!important;
                font: inherit;
                color: #006FB7;
                border-bottom: 1px solid #dde1e6;
                border-bottom-width: 1px;
                border-bottom-style: solid;
                border-bottom-color: rgb(221, 225, 230);
                text-decoration: none;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <form action="" method="post">
            Brukernavn: <input type="text" name="userid">
            Passord: <input type="password" name="pass">
            <input type="submit" value="Log inn" name="login">
        </form>
        <a href="index.html">Tilbake til digipost - Testmiljø</a>
<form action="" method="post" name="sitebuttons">
    <div id="sitemap">
        <ul>
            <li><button name="Index" class="buttons">Index</button></li>
            <li><button name="Login" class="buttons">Login</button></li>
            <li>Login med BankID/Glemt passord:</li>
            <ul>
                <li><button name="Loginmetode" class="buttons">Login metode</button></li>
                <li><button name="Fodselsnummer" class="buttons">Fødselsnummer</button></li>
                <li><button name="Engangskode" class="buttons">Engangskode</button></li>
                <li><button name="Personligpassord" class="buttons">Personlig passord</button></li>
            </ul>
            <li>Registrering</li>
            <ul>
                <li><button name="Registrering" class="buttons">Registrering</button></li>
                <li><button name="Samtykke" class="buttons">Samtykke</button></li>
                <li><button name="Loginmetode2" class="buttons">Login metode</button></li>
                <li><button name="Fodselsnummer2" class="buttons">Fødselsnummer</button></li>
                <li><button name="Engangskode2" class="buttons">Engangskode</button></li>
                <li><button name="Personligpassord2" class="buttons">Personlig passord</button></li>
            </ul>
            <li>Etter login:</li>
            <ul>
                <li><button name="Mailside" class="buttons">Mailside</button></li>
                <li><button name="Glemtpassord" class="buttons">Glemt passord</button></li>
            </ul>
            <li>Generelt</li>
            <ul>
                <li><button name="Loggut" class="buttons">Loggut uten aktivitet</button></li>
                <li><button name="Avtalevilkar" class="buttons">Avtalevilkår</button></li>
                <li><button name="Personvern" class="buttons">Personvern</button></li>
            </ul>
        </ul>
    </div>
</form>
            </body>
</html>
<?php
    session_start();
    if(isset($_REQUEST["login"])){
        $db = mysql_connect("sql2.freemysqlhosting.net", "sql2106925","rT1!qV2%");
        $db .= mysql_select_db("sql2106925");
        if(!$db){
            die("Feil i DB tilkobling");
        }
        
        $foedselsnummer= mysql_real_escape_string($_POST['userid']);
        $passord = hash("sha512",mysql_real_escape_string($_POST['pass']));
        
        if($foedselsnummer != "00000000000"){
            die("Du kan bare logge inn med en admin bruker");
        } else {
            $checkuser = mysql_query("SELECT * FROM user WHERE foedselsnummer='$foedselsnummer'");
            $num = mysql_num_rows($checkuser);
            if ($num==1){
                $checkpassword = mysql_fetch_array($checkuser);
                $dbpassword = $checkpassword['passord'];
                if($passord==$dbpassword){
                    session_start();
                    $id="japp";
                    $_SESSION['admin'] = $id;
                    header("location:admin.php");
                    die();
                }        
                else{
                    die("Feil passord");
                }
            } else{
            die("Du kan bare logge inn med en admin brukerrrrrrrrrrr");
            }
        }
        
    }
    
    if(isset($_POST["Index"])){
        echo "<script> window.location = 'index.html' </script>";
    }
    if(isset($_POST["Login"])){
        echo "<script> window.location = 'login.php' </script>";
    }
    if(isset($_POST["Loginmetode"])){
        echo "<script> window.location = 'idPortenLogin.php' </script>";
    }
    if(isset($_POST["Fodselsnummer"])){
        $_SESSION['funker']=true;
        echo "<script> window.location = 'idPortenBankID.php' </script>";
    }
    if(isset($_POST["Engangskode"])){
        $_SESSION['funker']=true;
        $_SESSION['persnr'] = "11111111111";
        echo "<script> window.location = 'idPortenEngangskode.php' </script>";
    }
    if(isset($_POST["Personligpassord"])){
        $_SESSION['funker']=true;
        $_SESSION['persnr'] = "1111111111";
        echo "<script> window.location = 'idPortenPP.php' </script>";
    }
    if(isset($_POST["Registrering"])){
        echo "<script> window.location = 'registrering.php' </script>";
    }
    if(isset($_POST["Samtykke"])){
        $_SESSION['funker']=true;
        $_SESSION["passord"] = "testpassord123";
        echo "<script> window.location = 'samtykke.php' </script>";
    }
    if(isset($_POST["Loginmetode2"])){
        $_SESSION['funker']=true;
        $_SESSION["passord"] = "testpassord123";
        echo "<script> window.location = 'BankID.php' </script>";
    }
    if(isset($_POST["Fodselsnummer2"])){
        $_SESSION['funker']=true;
        $_SESSION["passord"] = "testpassord123";
        echo "<script> window.location = 'BankIdPersNr.php' </script>";
    }
    if(isset($_POST["Engangskode2"])){
        $_SESSION['funker']=true;
        $_SESSION["passord"] = "testpassord123";
        $_SESSION['persnr'] = "1111111111";
        $_SESSION["ek"] = rand(100000,999999);
        echo "<script> window.location = 'BankIdEngangskode.php' </script>";
    }
    if(isset($_POST["Personligpassord2"])){
        $_SESSION['funker']=true;
        $_SESSION["passord"] = "testpassord123";
        $_SESSION['persnr'] = "1111111111";
        $_SESSION["pkode"] = "84nd73f";
        echo "<script> window.location = 'BankIdPersKode.php' </script>";
    }
    if(isset($_POST["Mailside"])){
        echo "<script> window.location = 'mailside.php' </script>";
        $_SESSION['funker']=true;
        $_SESSION['id']=19;
        $_SESSION["niva2"] = true;
        $_SESSION['persnr'] = "11111111111";
    }
    if(isset($_POST["Glemtpassord"])){
        $_SESSION['funker']=true;
        $_SESSION['id']=19;
        $_SESSION["niva1"] = true;
        $_SESSION['persnr'] = "11111111111";
        echo "<script> window.location = 'glemtPassord.php' </script>";
    }
    if(isset($_POST["Loggut"])){
        echo "<script> window.location = 'idle.php' </script>";
    }
    if(isset($_POST["Avtalevilkar"])){
        echo "<script> window.location = 'avtalevilkar.php' </script>";
    }
    if(isset($_POST["Personvern"])){
        echo "<script> window.location = 'personvern.php' </script>";
    }
?>

