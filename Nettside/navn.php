<?php

$persnr = $_SESSION['persnr'];
$sql = "Select fornavn from user where foedselsnummer = $persnr";        
$resultat = mysqli_query($db, $sql);
$rad = $resultat->fetch_object();
