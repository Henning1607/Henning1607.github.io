<?php
$db = mysqli_connect("sql2.freemysqlhosting.net", "sql2106925","rT1!qV2%","sql2106925");
     if(!$db){            
            $feil = "Feil i databasetilkobling";
            header("location:login.php");
            die("");
        }

?>